<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Notifications\UpdatedUserNotification;

class AdminController extends Controller
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
        $teachers = User::where('role','=', 2)->get();
        $projects = Project::all();


        $notifications =$user->unreadNotifications;
        $activities =$user->notifications;

        // dd($notifications->first()->data['start']);
        return view('admin.dash', compact('user','profileImage','students','teachers','projects','notifications','activities'));
    }


    public function profile()
    {
        $user = auth()->user();
        $userImage = $user->profile->image;
        $notifications =$user->unreadNotifications;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        return view('admin.profile', compact('user','profileImage','notifications'));
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit()
    {
        $user = auth()->user();
        $userImage = $user->profile->image;
        $notifications =$user->unreadNotifications;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        return view('admin.edit', compact('user','profileImage','notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'reg_no' => ['required'],
            'image' => ['image','mimes:jpg,png,jpeg','max:1999'],
            
         ]);

         $user = auth()->user();

         if ($request->hasFile('image')) {
            // $imagename = $request->file('image')->getClientOriginalName() ;
            $exetension = $request->file('image')->getClientOriginalExtension() ;
            $username = $user->firstname . '_'. $user->reg_no ;
            $imagenameToStore = $username . '.'. $exetension ;
             $request->image->move(public_path('images'),$imagenameToStore);
             $user->profile->image = $imagenameToStore;
        }




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
        return redirect("admin/profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
