<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RumorMailer;
use App\Models\Rumor;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use Intervention\Image\Facades\Image;

class AdminRumorController extends Controller
{
    protected $directory = 'front.rumor.';

    //Index Page
    public function index(){
        return view("{$this->directory}index");
    }

    // rumorSend Send
    public function rumorSend(Request $request)
    {
        $request->validate([
           'uname'   =>  'required|string',
           'email'   =>  'required|email|string',
           'phone'   =>  'required|string',
           'rumor_title'   =>  'required|string',
           'rumor_link_1'   =>  'required|string',
           'images.*'   =>  'image|mimes:jpeg,png,jpg|max:600',
        ], [
            'uname.required'            => 'আপনার নাম লিখুন',
            'email.required'            => 'আপনার ইমেইল লিখুন',
            'email.email'               => 'আপনার ব্যবহৃত ইমেইল বৈধ নয়',
            'phone.required'            => 'আপনার মোবাইল নম্বর লিখুন',
            'rumor_title.required'      => 'গুজবের শিরোনাম লিখুন',
            'rumor_link_1.required'      => 'গুজবের লিংক',
            'images.image'               => 'শুধুমাত্র ইমেজ ব্যবহার করুন',
            'images.mimes'               => 'PNG, JPG or JPEG ফাইল ফরমেট ব্যবহার করুন',
        ]);

        $rumor = new Rumor();
        $rumor->sender_name = $request->uname;
        $rumor->sender_email = $request->email;
        $rumor->sender_phone = $request->phone;
        $rumor->rumor_title = $request->rumor_title;
        $rumor->rumor_link_one = $request->rumor_link_1;
        $rumor->rumor_link_two = $request->rumor_link_2;

        if ($request->hasFile('images')){
            $rumor->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('rumors') ;
            });
        }
        $rumor->save();
        Toastr::success('ধন্যবাদ আমরা শীঘ্রই ফোন/ ইমেইলের মাধ্যমে আপনার সাথে যোগাযোগ করব','Success');
        return redirect()->back();
    }

    // Rumor List Show
    public function rumorListsShow(){
        $data['rumors'] = Rumor::latest()->paginate(15);
        return view("admin.rumor.show", $data);
    }

    // Rumor single view
    public function rumorView(Request $request){
        $rumor = Rumor::findOrFail($request->id)->get();
        foreach($rumor as $value){
            foreach($value->getMedia('rumors') as $media){
                $url[]= [
                    'file' => $media->getUrl(),
                ];
            }
        }
        $data['files']  =$url;
        $data['rumor']  =$rumor;
        $url = [];

        return view("admin.rumor.view", $data);
    }

    // Rumor single view
    public function rumorSendMail(Request $request){
        $rumor = Rumor::findOrFail($request->id);
        $type = $request->type;
        Mail::to($rumor->sender_email)->send(new RumorMailer($type));
        if ($request->type == "received"){
            $rumor->status = 1;
            $rumor->update();
        }
        if ($request->type == "processed"){
            $rumor->status = 2;
            $rumor->update();
        }
        if ($request->type == "done"){
            $rumor->status = 3;
            $rumor->update();
        }
        return redirect()->back();
    }
}
