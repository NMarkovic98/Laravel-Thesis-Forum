<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Topic;
use App\Models\TopicReply;
use App\Notifications\NewTopic;
use App\Notifications\NewReply;
use App\Models\User;
use App\Models\ReplyLike;
use App\Models\ReplyDislike;




class TopicController extends Controller
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
    public function create($id)
    {
        $forums = Forum::latest()->get();
        $forum = Forum::find($id);
        return view('client.new-topic', \compact('forums','forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
       $user->increment('rank',50);
        $notify = 0;
        if($request->notify && $request->notify == "on"){
            $notify=1;
        }
        $topic = new Topic;
        $topic->title = $request->title;
        $topic->desc = $request->desc;
        $topic->forum_id = $request->forum_id;
        $topic->user_id = auth()->id();
        $topic->notify = $notify;
        $topic->save();
        
        
        $latestTopic = Topic::latest()->first();
        $admins = User::where('is_admin',1)->get();
        
        
            foreach($admins as $admin){
            $admin->notify(new NewTopic($latestTopic));
            toastr()->success('Discussion started successfully!');
        
        
        
    }
    return back();
    
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        if($topic){
            $topic->increment('views',1);
        }
        return view('client.topic',\compact('topic'));
    }
     /**
     * Show reply from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply( Request $request, $id)
    {
       $reply = new TopicReply;
       $reply->desc = $request->desc;
       $reply->user_id = auth()->id();
       $reply->topic_id = $id;
       $reply->forum_id =$reply->topic->forum_id;
       
       $reply->save();
       $user = auth()->user();
       $user->increment('rank',10);
       $latestReply = TopicReply::latest()->first();
       $admins = User::where('is_admin',1)->get();
       
       
           foreach($admins as $admin){
           $admin->notify(new NewReply($latestReply));
       
       
    }
    toastr()->success('Reply saved successfully!');
    return back();
}
    public function remove($id){

        $topic = Topic::find($id);
        $topic-> delete();
        toastr()->success('Topic deleted successfully!');
        return back();

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
       $reply = TopicReply::find($id);
       $reply->delete();
       toastr()->success('Reply deleted successfully!');
       return back();

    }
    public function like($id){

        $reply = TopicReply::find($id);
        
        $liked = ReplyLike::where('user_id', '=',auth()->id())->where('reply_id','=',$id)->get();

        if(count($liked) > 0){

            toastr()->error('You already liked this reply');
            return back();
        }
        $reply_like = new ReplyLike;
        $reply_like->user_id = auth()->id();
        $reply_like->reply_id = $id;
        $reply_like->save();
        $user_id = $reply->id;
        $owner = User::find($user_id);
        $reply->increment('like',1);
        $owner->increment('rank',10);
       toastr()->success('Like saved successfully');
       return back();


    }
    public function dislike($id){

        $reply = TopicReply::find($id);
        $user_id = $reply->id;
        $owner = User::find($user_id);
       
        $disliked = ReplyDislike::where('user_id', '=',auth()->id())->where('reply_id','=',$id)->get();

        if(count($disliked) > 0){
            
           
            toastr()->error('You already disliked this reply');
            return back();
        }
        $reply_dislike = new ReplyDislike;
        $reply_dislike->user_id = auth()->id();
        $reply_dislike->reply_id = $id;
        $reply_dislike->save();
        
        $owner = User::find($user_id);
        $reply->increment('dislike',1);
        $owner->decrement('rank',10);
       toastr()->success('Dislike saved successfully');
       return back();


    }
}
