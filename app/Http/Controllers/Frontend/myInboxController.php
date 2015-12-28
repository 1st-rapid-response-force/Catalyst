<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class myInboxController extends Controller
{
    /**
     * Show all of the message threads to the user
     *
     * @return mixed
     */
    public function index()
    {
        $user = Auth::user();
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->paginate(15);
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->paginate(15);;
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('frontend.my-inbox.index', compact('threads', 'currentUserId'))
            ->with('user',$user);
    }
    /**
     * Shows a message thread
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = Auth::user();


        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('/my-inbox');
        }
        if($thread->hasParticipant(Auth::id())){
            $thread->markAsRead($user->id);

            // show current user in list if not a current participant
            // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
            // don't show the current user in list
            $users = User::whereNotIn('id', $thread->participantsUserIds($user->id))->get();
            $thread->markAsRead($user->id);
            return view('frontend.my-inbox.show')
                ->with('user',$user)
                ->with('thread',$thread)
                ->with('users',$users);
        }else{
            Session::flash('error_message', 'Conversation not found');

            return redirect('/my-inbox');
        }

    }
    /**
     * Creates a new message thread
     *
     * @return mixed
     */
    public function create()
    {
        $user = \Auth::user();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('frontend.my-inbox.create')->with('user',$user);
    }
    /**
     * Edit Message
     *
     * @return mixed
     */
    public function editMessage($id)
    {
        $user = \Auth::user();

        try {
            $message = Message::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The message was not found.');
            return redirect('/my-inbox');
        }

        if(!($user->id == $message->user->id))
        {
            Session::flash('error_message', 'You cannot edit a message that is not yours.');
            return redirect('/my-inbox');
        }

        return view('frontend.my-inbox.edit-message')
            ->with('user',$user)
            ->with('message',$message)
            ->with('thread',$message->thread);
    }
    /**
     * Edit Message
     *
     * @return mixed
     */
    public function editMessageSave(Request $request,$id)
    {
        $user = \Auth::user();
        try {
            $message = Message::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The message was not found.');
            return redirect('/my-inbox');
        }
        $message->body = $request->body;
        $message->save();
        return redirect('/my-inbox/'.$message->thread->id);
    }
    /**
     * Stores a new message thread
     *
     * @return mixed
     */
    public function store(Request $request)
    {

        $recipients = explode(',',$request->recipents);
        $thread = Thread::create(
            [
                'subject' => $request->subject,
            ]
        );

        // Message
        $message = Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $request->message,
            ]
        );



        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon
            ]
        );

        $data = [
            'title' => $request->subject,
            'content' => $request->message,
            'creator' => Auth::user()->vpf,
            'id' => $thread->id
        ];


        // Recipients
        if (\Request::has('recipents')) {
            $thread->addParticipants($recipients);
            $this->emailUsersNewMessage($recipients,$data);
        }



        return redirect('/my-inbox/'.$thread->id);
    }
    /**
     * Adds a new message to a current thread / Add Participants
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('my-inbox');
        }


        //Participant add or reply?
        if($request->action == 'addUsers')
        {
            $recipients = explode(',',$request->recipents);
            $dataNewParticipant = [
                'title' => $thread->subject,
                'id' => $thread->id
            ];
            // Recipients
            if (\Request::has('recipents')) {
                $thread->addParticipants($recipients);
                $this->emailUsersNewParticipant($recipients,$dataNewParticipant);
            }
        } else {
            $thread->activateAllParticipants();
            // Message
            Message::create(
                [
                    'thread_id' => $thread->id,
                    'user_id'   => Auth::id(),
                    'body'      => Input::get('message'),
                ]
            );

            $data = [
                'title' => $thread->subject,
                'content' => $request->message,
                'creator' => Auth::user()->vpf,
                'id' => $thread->id
            ];

            // Add replier as a participant
            $participant = Participant::firstOrCreate(
                [
                    'thread_id' => $thread->id,
                    'user_id'   => Auth::user()->id
                ]
            );
            $participant->last_read = new Carbon;
            $participant->save();
            $this->emailUsersNewMessage($thread->participantsUserIds(),$data);

        }
        return redirect('my-inbox/' . $id);
    }

    /**
     * Deals with deletion of threads
     *
     * @param $id
     * @return mixed
     */
    public function deleteInboxThreads(Request $request)
    {
        $user = \Auth::user();

        if(is_Null($request->delete))
        {
            \Notification::warning('No Conversations selected');
        } else {
            $user->threads()->detach($request->delete);
            \Notification::success('You have left these conversations');

        }
        return redirect('/my-inbox');
    }

    /**
     * Sends emails to all recipients
     * @param $users
     * @param $data
     */
    private function emailUsersNewMessage($users,$data)
    {
        foreach($users as $userID)
        {
            $user = User::find($userID);
            Mail::send('emails.newMessage', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
                $m->to($user->email, $user->vpf);
                $m->subject('1st RRF - New Message - '.$data['title']);
                $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
                $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
            });
        }
    }

    /**
     * Sends emails to all recipients
     * @param $users
     * @param $data
     */
    private function emailUsersNewParticipant($users,$data)
    {
        foreach($users as $userID)
        {
            $user = User::find($userID);
            Mail::send('emails.newParticipant', ['user' => $user,'data' =>$data], function ($m) use ($user,$data) {
                $m->to($user->email, $user->vpf);
                $m->subject('1st RRF - You have been added to a Conversation');
                $m->from('no-reply@1st-rrf.com','1st Rapid Response Force');
                $m->sender('no-reply@1st-rrf.com','1st Rapid Response Force');
            });
        }
    }
}
