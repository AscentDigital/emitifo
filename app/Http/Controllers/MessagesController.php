<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\MessagesRequest;
use App\Jobs\ChunkifySubscribers;
use App\Company;

class MessagesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function smslist(Message $message){
        if(null !== request('s')){
            $logs = $message->logs()->search('"'.request('s').'"', ['number', 'message.campaign.title'])->paginate(10);
        }else{
            $logs = $message->logs()->orderBy('created_at', 'DESC')->paginate(10);
        }
    	return view('messages.list', ['title' => 'Logs', 'logs' => $logs, 'message' => $message]);
    }

    public function show(){
        if(null !== request('s')){
            $messages =auth()->user()->company->messages()->search('"'.request('s').'"', ['number', 'message', 'campaign.title']);
        }else{
            $messages = auth()->user()->company->messages()->orderBy('created_at', 'DESC');
        }

        if(null !== request('filter')){
            $messages = $messages->where('type', request('filter'))->paginate(10);
        }else{
            $messages = $messages->paginate(10);
        }
    	return view('messages.show', ['title' => 'Messages', 'messages' => $messages]);
    }

    public function create(){
        $company = auth()->user()->company;
        $campaigns = $company->campaigns()->orderBy('title')->get();
    	return view('messages.create', ['title' => 'Create Message', 'campaigns' => $campaigns, 'company' => $company]);
    }

    public function store(MessagesRequest $request){
        $message = Message::create([
            'message' => $request->input('message'),
            'type' => 'outgoing',
            'origin' =>'broadcast',
            'campaign_id' => $request->input('campaign_id'),
            'company_id' => auth()->user()->company->id,
            'status' => 'sending'
        ]);

        $job = (new ChunkifySubscribers($message, $request->input('recipients'), auth()->user()->company));

        dispatch($job);
        
        session()->flash('success', 'The message has been added.');
        return redirect('/messages/create');
    }

}
