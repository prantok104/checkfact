<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    // Login
    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
           'email'      => 'required|email',
           'password'   => 'required|min:5'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended(route('admin.dashboard'));
        }
        Session::flash('error', 'আপনার প্রদানকৃত ডাটা আমাদের রেকর্ডে ম্যাচ করছে না, অনুগ্রহপূর্বক আবার চেষ্টা করুন');
        return redirect()->back();
    }

    // Logout
    public function logout(){
        Auth::guard('admin')->logout();
        Session::flash('status', 'অ্যাডমিন লগআউট সম্পন্ন হয়েছে');
        return redirect()->route('admin.login');
    }
}
