<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
           'image'   =>  'required|image|mimes:png,jpg,jpeg',
        ], [
            'uname.required'            => 'আপনার নাম লিখুন',
            'email.required'            => 'আপনার ইমেইল লিখুন',
            'phone.required'            => 'আপনার মোবাইল নম্বর লিখুন',
            'rumor_title.required'      => 'গুজবের শিরোনাম লিখুন',
            'image.required'            => 'গুজবের ফটো',
            'image.image'               => 'গুজবের ফটো',
            'image.mimes'               => 'গুজবের ফটো',
        ]);



        return redirect()->back();
    }
}
