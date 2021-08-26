<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
      

        if ($user->isAdmin) {
            return redirect('admin/dash');
        } else {
            return view('dash', compact('user','profileImage','students','teachers','projects','notifications','activities'));
        }
        
    }
    public function search(Request $request)
    {
        $user = auth()->user();
        $userImage = $user->profile->image;
        $profileImage = (!$userImage == null )? asset('images/'.$userImage)  : asset('images/user.png');
        // $projects = Project::all();
        $notifications =$user->unreadNotifications;


        
        if ($request->query) {

        $search_text = $_GET['query'];
        $projects = Project::where('topic','LIKE','%'.$search_text . '%')->orWhere('filename','LIKE','%'.$search_text . '%')->get();
       
        return view('search', compact('user','profileImage','projects','notifications'));
            
        }else{
            return redirect()->back();
        }







        
        
        
    }
    public function markasread(Request $request)
    {
        $user = auth()->user();
 
        $user->unreadNotifications->markAsRead();



            return redirect()->back();
        

        
        
        
    }


    

     
}
