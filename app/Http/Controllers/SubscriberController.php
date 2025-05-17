<?php

namespace App\Http\Controllers;

use \App\Mail\ProjectDownloadLink;
use App\Mail\NewsletterSubscriptionMail;
use App\Models\Project;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    //
     public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('pages.admin.subscribers.index', compact('subscribers'));
    }
    public function store(Request $request){
        // dd($request);
        $validated=$request->validate([
            
            'email'=>'required|email|max:100',
        ]);
        $email=Subscriber::query()->where('email',$validated['email'])->first();
        // dd($email); 

        if(!isset($email['email'])){
            $user=Subscriber::create($validated);
            Mail::to($user->email)->send(new NewsletterSubscriptionMail($user->email));
            return back()->with('success','you are subscribed with successfly');
            
        }else{
            return back()->with('error',value: 'you are already subscribed ');

        }

    }
     public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'project_id' => 'required|exists:projects,id',
        ]);

            $user=Subscriber::create([
                'email'=>$request->email,
                'from'=>'download'
        ]);
        $project = Project::findOrFail($request->project_id);

        Mail::to($request->email)->send(new NewsletterSubscriptionMail($request->email));

        return redirect()->back()->with('success', 'Download link has been sent to your email.');
    }
}
