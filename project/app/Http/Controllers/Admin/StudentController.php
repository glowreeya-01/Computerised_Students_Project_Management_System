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

class StudentController extends Controller
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
        $students = User::where('role','=', 1)->get();
        $notifications =$user->unreadNotifications;
        return view('admin.students.index', compact('user','profileImage','students','notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $teachers = User::where('role', 2)->get();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('admin.students.create', compact('user','profileImage','teachers','notifications'));
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
            // 'department' => [ 'string'],
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
        $user->profile->topic = $request->topic;
        $user->profile->bio = $request->bio;
        $user->profile->address = $request->address;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->zipcode = $request->zipcode;
        $user->profile->country = $request->country;
        $user->profile->save();
        // $user->profile->image = $request->image;

        Session::flash('message', 'Student Created Successfully!');
        return redirect("admin/students");
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
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $student = User::find($id);
        
        $notifications =$user->unreadNotifications;
        return view('admin.students.show', compact('student','user','profileImage','notifications'));
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
        $student = User::find($id);
        $userImage = $user->profile->image;
        $notifications =$user->unreadNotifications;
        $teachers = User::where('role', 2)->get();
        // dd($student->teacher);
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        return view('admin.students.edit', compact('student','user','profileImage','teachers','notifications'));
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
            $username = $user->firstname . '_'. $user->reg_no ;
            $imagenameToStore = $username . '.'. $exetension ;
            // $path = $request->file('image')->storeAs('public/images/',$imagenameToStore);
            $request->image->move(public_path('images'),$imagenameToStore);
            // dd($path);
            $user->profile->image = $imagenameToStore;
        }
        
        $user->user_id = $request->user_id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->reg_no = $request->reg_no;
        $user->email = $request->email;
        $user->created_at = $request->created_at;
        $user->save();

        $user->profile->department = $request->department;
        $user->profile->gender = $request->gender;
        $user->profile->DoB = $request->DoB;
        $user->profile->phone = $request->phone;
        $user->profile->topic = $request->topic;
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
        // dd($user);
        Project::destroy($projects);
        $user->delete();
        Session::flash('message', ' Student Deleted Successfully!');
        $admins = User::where('isAdmin', '1')->get();
        Notification::send($admins,new DeletedUserNotification($user) );
        return ;
    }
}
