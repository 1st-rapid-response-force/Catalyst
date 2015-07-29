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
        $threads = Thread::getAllLatest()->paginate(30);
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->paginate(30);;
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
        Message::create(
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

        // Recipients
        if (\Request::has('recipents')) {
            $thread->addParticipants($recipients);
        }

        return redirect('my-inbox');
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
            // Recipients
            if (\Request::has('recipents')) {
                $thread->addParticipants($recipients);
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
            // Add replier as a participant
            $participant = Participant::firstOrCreate(
                [
                    'thread_id' => $thread->id,
                    'user_id'   => Auth::user()->id
                ]
            );
            $participant->last_read = new Carbon;
            $participant->save();
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

        $user->threads()->detach($request->delete);

        \Notification::success('You have left these conversations');
        return redirect('/my-inbox');

    }

}
