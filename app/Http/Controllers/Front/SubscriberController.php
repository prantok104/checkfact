<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    protected $directory = 'admin.subscriber.';
    public function index(){
        $data = [
            'subscriber'    => Subscriber::get(),
        ];
        return view("{$this->directory}lists", $data);
    }

    public function subscriber(Request $request){

       $validator = Validator::make($request->all(), [
           'email'  => 'required|email|unique:subscribers'
            ],
           [
               'email.required' => 'আপনার ই-মেইল লিখুন',
               'email.email'    => 'বৈধ ইমেইল ব্যবহার করুন',
               'email.unique'   => 'ই-মেইল ​​টি আগে থেকেই সংরক্ষিত আছে',
           ]);

       if (!$validator->passes()){
           return response()->json(['status'=> 0, 'error' => $validator->errors()->toArray()]);
       }else{
           $subscriber  = new Subscriber();
           $subscriber->email = $request->email;
           $subscriber->save();
           return response()->json(['status'=> 1, 'success' => 'সাবস্ক্রাইব সফল হয়েছে | ধন্যবাদ আমাদের সাথে থাকার জন্য']);
       }
    }
}
