<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewUserNotification;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewProjectNotification;
use App\Notifications\DeletedProjectNotification;
use App\Notifications\UpdatedProjectNotification;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $fullname = $user->firstname.' '.$user->lastname;
        $projects = Project::where('user_id', $user->id)->orWhere('recipient','LIKE','%'.$fullname . '%')->get();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('project.index', compact('user','projects','profileImage','notifications'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function repo()
    {
        $user = auth()->user();
        $projects = Project::get();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('repo', compact('user','projects','profileImage','notifications'));
    }
    /**
     * request a  resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request($filename)
    {
        $user = auth()->user();
        $project = Project::where('filename', $filename)->first();

        $admins = User::where('isAdmin', '1')->get();
        
        
        Notification::send($admins,new RequestNotification($project,$user) );
        
        Session::flash('message', ' Your Request has been Recieved!');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;


        return view('project.create', compact('user','profileImage','notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'filename' => ['required', 'string', 'max:255'],
            'recipient' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file'],
            'label' => ['string', 'max:255'],
            // 'comment' => ['string', 'max:255'],
            
            ]);
            
            
            $user = auth()->user();

           
         

        $project = new Project ;
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName() ;
            $filename = $user->firstname . '_'. $name ;
             $request->file->move(public_path('files'),$filename);
             $project->file = $filename;
        }

         $project->user_id = $user->id;
        $project->filename = $request->filename;
        $project->recipient = $request->recipient;
        $project->topic = $request->topic;
        $project->created_at = $request->created_at;
        $project->label = $request->label;
        $project->comment = $request->comment;
        $project->created_at = now();
        $project->save();
        Session::flash('message', ' New Project Was Created Successfully!');

        $admins = User::where('isAdmin', '1')->get();
        
        
        $user->notify(new NewProjectNotification($project));
        if ($user->isAdmin == 1) {
            return redirect('admin/projects');
        } else {
            if ($user->role == 1) {
                $teacher = $user->teacher;
                $teacher->notify(new NewProjectNotification($project));
            } else {
                $student = $user->teacher;
                $student->notify(new NewProjectNotification($project));
            }
            
            Notification::send($admins,new NewProjectNotification($project) );
            return redirect('/project');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $project = Project::find($id);
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('project.edit', compact('user','project','profileImage','notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $user = auth()->user();
        $project = Project::find($id);
        // dd($request);

        $request->validate([
            'filename' => ['required', 'string', 'max:255'],
            'recipient' => ['required', 'string', 'max:255'],
            'file' => [ 'file'],
            'label' => ['string', 'max:255'],
            // 'comment' => ['string', 'max:255'],
            
         ]);

        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName() ;
            $filename = $user->firstname . '_'. $name ;
            
            $request->file->move(public_path('files'),$filename);
            $project->file = $filename;
        }
        
        
         
        // $project->user_id = $user->id;
        $project->filename = $request->filename;
        $project->recipient = $request->recipient;
        $project->created_at = $request->created_at;
        $project->label = $request->label;
        $project->comment = $request->comment;
        if ($user->role == 2) {
            $project->status = $request->status;
        }
        $project->save();
        Session::flash('message', 'Project Update Was Successful!');

        $admins = User::where('isAdmin', '1')->get();
        Notification::send($admins,new UpdatedProjectNotification($project) );
        $user->notify(new UpdatedProjectNotification($project));

        if ($user->role == 1) {
            $teacher = $user->teacher;
            $teacher->notify(new UpdatedProjectNotification($project));
        } else {
            $student = $user->teacher;
            $student->notify(new UpdatedProjectNotification($project));
        }

        return redirect('/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $project = Project::find($id);
        // dd($project);
        if($user->id == $project->user_id){
            $project->delete();
            Session::flash('message', 'Project Deleted Successfully!');

            $admins = User::where('isAdmin', '1')->get();
            Notification::send($admins,new DeletedProjectNotification($project) );
            $user->notify(new DeletedProjectNotification($project));
            if ($user->role == 1) {
                $teacher = $user->teacher;
                $teacher->notify(new DeletedProjectNotification($project));
            } else {
                $student = $user->teacher;
                $student->notify(new DeletedProjectNotification($project));
            }
        }
      
            // Session::flash('message', 'Project Deleted Successfully!');
            return 'Project Deleted Successfully!' ;
       
          
    }
}
