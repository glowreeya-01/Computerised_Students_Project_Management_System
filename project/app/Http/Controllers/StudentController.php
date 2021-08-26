<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        //
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
        

        return view('student.create', compact('user','profileImage','notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;

                    
        
        return view('student.show', compact('user','profileImage','notifications'));
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
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        $notifications =$user->unreadNotifications;
        return view('student.edit', compact('user','profileImage','notifications'));
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
        $user = auth()->user();

        
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
            // $path = $request->file('image')->storeAs('public/images/',$imagenameToStore);
            $request->image->move(public_path('images'),$imagenameToStore);
            // dd($path);
            $user->profile->image = $imagenameToStore;
        }
        
        
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
        return redirect("/profile");
        
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
