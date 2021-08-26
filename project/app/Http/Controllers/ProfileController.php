<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Notifications\UpdatedUserNotification;

class ProfileController extends Controller
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
        return view('profile',compact('user','profileImage','notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
        // dd($request);
        $user = auth()->user();
        // return view('dash.change-password' , compact('user'));

        $request->validate([
            'old_password' => ['required', 'string', 'password', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        

        $userpassword = Auth::user()->password;

        if (!(Hash::check($request->get('old_password'), $userpassword))) {

            Session::flash('error', 'Your current password does not match');
            return redirect('/profile')->with('error', 'Your current password does not match');


        }
        if (Strcmp($request->get('old_password'), $request->get('password')) == 0) {

            Session::flash('error', 'New password cannot be the with old password');
                return redirect('/profile')->with('error', 'New password cannot be the with old password');
            }
        if (!(Strcmp($request->get('password'), $request->get('password_confirmation')) == 0)) {

            Session::flash('error', 'Password Confirmation do not Match');
                return redirect('/profile')->with('error', 'Password Confirmation do not Match');
            }



        if (Hash::check($request->get('old_password'), $userpassword) && !(Strcmp($request->get('old_password'), $request->get('password')) == 0) && Strcmp($request->get('password'), $request->get('password_confirmation')) == 0) {
           
            $user->password = Hash::make($request->password);
            $user->save();



            Session::flash('message', 'Password changed Successfully!');

            $user->notify(new UpdatedUserNotification($user));
                return redirect('/profile');

        }
    }


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
    public function edit($id)
    {
        // return view('student.edit');
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
        //
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
