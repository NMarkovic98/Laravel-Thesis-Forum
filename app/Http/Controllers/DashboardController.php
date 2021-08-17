<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Forum;
use App\Models\Setting;

class DashboardController extends Controller

{
    public function home()
    {
        $categories = Category::latest()->paginate(15);
        $topics = Topic::latest()->paginate(15);
        $forums = Forum::latest()->paginate(15);
        $users = User::latest()->paginate(15);

        return view('admin.pages.home', \compact('categories','topics','forums','users'));
    }
    public function show($id){
        $latest_user_post = Topic::where('user_id',$id)->latest()->first();
        $latest = Topic::latest()->first();
        $user = User::find($id);
        return view('admin.pages.user', \compact('latest_user_post','latest','user'));
    }
        public function profile(){
            $latest_user_post = Topic::where('user_id',auth()->id())->latest()->first();
            $latest = Topic::latest()->first();
            $user = auth()->user();
          
       return view('admin.pages.user', \compact('user','latest_user_post','latest')); 

    }
    public function notifications(){
        $notifications = auth()->user()->notifications()->where('read_at', NULL)->get();
        
        return view('admin.pages.notifications', \compact('notifications'));


    }
    public function  markAsRead($id){

        $notification = auth()->user()->notifications()->where('id',$id)->first();
        $notification->markAsRead();
        toastr()->info('Notification marked as read!');
        return back();
    }
    public function notificationDestroy($id){
        $notification = auth()->user()->notifications()->where('id',$id)->first();
        $notification->delete();
        toastr()->success('Notification successfully deleted!');
        return back();

    }
    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        toastr()->success('User deleted successfuly');
        return back();
    }
    public function users(){

        $users = User::latest()->paginate(15);
        return view('admin/pages/users', \compact('users'));
    }
    public function settingsForm(){

        return view('admin/pages/setting');
    }
    public function newSetting(Request $request){

        $set = new Setting;
        $set->forum_name = $request->forum_name;
        $set->save();
        toastr()->success('Name changed successfuly!');
        return back();
    }

}
