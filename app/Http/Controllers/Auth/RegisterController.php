<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm(){
        return view('front.pages.signup');
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'uname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string',  'max:30', 'unique:users'],
            'gender' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'uname.required'    => 'আপনার নাম লিখুন',
            'email.required'    => 'আপনার ই-মেইল লিখুন',
            'email.unique'      => 'ই-মেইল ​​টি আগে থেকেই সংরক্ষিত আছে',
            'phone.required'    => 'আপনার ফোন নম্বর লিখুন',
            'phone.unique'      => 'ফোন নম্বর ​​টি আগে থেকেই সংরক্ষিত আছে',
            'gender.required'   => 'লিঙ্গ বাছাই করুন',
            'password.required' => 'পাসওয়ার্ড টাইপ করুন',
            'password.min'      => 'অন্তত 8 সংখ্যা বিশিষ্ট পাসওয়ার্ড টাইপ করুন',
            'password.confirmed'=> 'পাসওয়ার্ড মেলেনি',
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['uname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->password = Hash::make($data['password']);
        $user->save();
        Toastr::success('সফলভাবে অ্যাকাউন্ট তৈরি সম্পন্ন হয়েছে', 'Success');
        return $user;
    }
}
