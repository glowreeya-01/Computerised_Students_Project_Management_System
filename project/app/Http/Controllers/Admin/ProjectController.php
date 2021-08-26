<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use League\Flysystem\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
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
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        $projects = Project::all();
        return view('admin.projects', compact('user','profileImage','projects','notifications'));
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
        return view('admin.project-create', compact('user','profileImage','notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $user = auth()->user();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        $project = Project::find($id);
        return view('admin.project-edit', compact('user','profileImage','project','notifications'));
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
        $project = Project::find($id);
        
        $request->validate([
            'filename' => ['required', 'string', 'max:255'],
            'recipient' => ['required', 'string', 'max:255'],
            'label' => ['string', 'max:255'],
            // 'comment' => ['string', 'max:255'],
            
            ]);
            
            
            
            
        $user = User::where('id',$project->user_id)->first();
            // dd($user);
         
        $project->filename = $request->filename;
        $project->recipient = $request->recipient;
        $project->created_at = $request->created_at;
        $project->label = $request->label;
        $project->status = $request->status;
        $project->comment = $request->comment;
        $project->save();
        Session::flash('message', 'Project Update Was Successful!');

        $admins = User::where('isAdmin', '1')->get();
        Notification::send($admins,new UpdatedProjectNotification($project) );
        $user->notify(new UpdatedProjectNotification($project));
        return redirect('admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = auth()->user();
        $project = Project::find($id);


        // dd($project);
        
        $project->delete();
        Session::flash('message', 'Project Deleted Successfully!');

        $user = User::where('id',$project->user_id)->first();
        $admins = User::where('isAdmin', '1')->get();
        $user->notify(new DeletedProjectNotification($project));
        if($user->isAdmin == 0){
            Notification::send($admins,new DeletedProjectNotification($project) );

        }


        return 'Project Deleted Successfully!' ;
        
    }
}
