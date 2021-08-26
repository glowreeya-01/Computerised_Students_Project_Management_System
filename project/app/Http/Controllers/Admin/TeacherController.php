<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DeletedUserNotification;
use App\Notifications\UpdatedUserNotification;

class TeacherController extends Controller
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
        $teachers = User::where('role','=', 2)->get();
        $students = User::where('role','=', '1')->get();
        $notifications =$user->unreadNotifications;
        // dd($users->profile);
        return view('admin.teachers.index', compact('user','profileImage','teachers','students','notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $students = User::where('role', 1)->get();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('admin.teachers.create', compact('user','profileImage','students','notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        // dd($request);

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'reg_no' => ['required', 'unique:users'],
            'role' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8'],
            // 'department' => [ 'string','max:255'],
         ]);
        
         $user->user_id = $request->user_id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->reg_no = $request->reg_no;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password =  Hash::make($request->password);
        $user->save();

        $user->profile->department = $request->department;
        $user->profile->gender = $request->gender;
        $user->profile->DoB = $request->DoB;
        $user->profile->phone = $request->phone;
        $user->profile->qualification = $request->qualification;
        $user->profile->experience = $request->experience;
        $user->profile->bio = $request->bio;
        $user->profile->address = $request->address;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->zipcode = $request->zipcode;
        $user->profile->country = $request->country;
        $user->profile->save();
        // $user->profile->image = $request->image;

        Session::flash('message', 'Teacher Created Successfully!');
        return redirect("admin/teachers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
       $teacher = User::find($id);
    //    dd($user->profile);
       $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('admin.teachers.show', compact('teacher','user','profileImage','notifications'));
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
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        $teacher = User::find($id);
        $students = User::where('role', 1)->get();
        // dd($students);
        return view('admin.teachers.edit', compact('user','profileImage','teacher','students','notifications'));
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
        $user = User::find($id);
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'reg_no' => ['required'],
            'image' => ['image','mimes:jpg,png,jpeg','max:1999'],
            
         ]);


         if ($request->hasFile('image')) {
            // $imagename = $request->file('image')->getClientOriginalName() ;
            $exetension = $request->file('image')->getClientOriginalExtension() ;
            $username = $user->firstname . '_' ;
            $imagenameToStore = $username . '.'. $exetension ;
             $request->image->move(public_path('images'),$imagenameToStore);
             $user->profile->image = $imagenameToStore;
        }




        
        $user->user_id = $request->user_id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->reg_no = $request->reg_no;
        $user->email = $request->email;
        // $user->created_at = $request->created_at;
        $user->save();

       

        $user->profile->qualification = $request->qualification;
        $user->profile->department = $request->department;
        $user->profile->gender = $request->gender;
        $user->profile->DoB = $request->DoB;
        $user->profile->phone = $request->phone;
        $user->profile->experience = $request->experience;
        $user->profile->bio = $request->bio;
        $user->profile->address = $request->address;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->zipcode = $request->zipcode;
        $user->profile->country = $request->country;
        $user->profile->save();



        Session::flash('message', ' Update Was Successful!');
        $user->notify(new UpdatedUserNotification($user));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $projects =Project::where('user_id',$id)->pluck('id');
        Project::destroy($projects);
        $user->delete();
        Session::flash('message', ' Teacher Deleted Successfully!');
        $admins = User::where('isAdmin', '1')->get();
        Notification::send($admins,new DeletedUserNotification($user) );
        return 'Teacher Deleted Successfully!';
    }
}
