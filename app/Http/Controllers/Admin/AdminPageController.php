<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;


class AdminPageController extends Controller
{
    protected $directory = 'admin.pages.';
    //dashboard
    public function dashboard(){
        $data = [
            'total_users' =>  User::all()->count(),
            'visitor_tracker' =>  Tracker::orderBy('date', 'DESC')->limit(5)->get(),
            'visitor_tracker_date' =>  Tracker::where('date', date('Y-m-d'))->count(),
        ];
        return view("{$this->directory}.dashboard", $data);
    }

    // Users menu
    public function users()
    {
        $data['users'] = User::Orderby('id', 'DESC')->paginate(15);
        return view("{$this->directory}users", $data);
    }
    // Block user
    public function userBlock($id){
        $user = User::findOrFail($id);
        $user->delete();
        Toastr::success('User Block Completed', 'Success');
        return redirect()->back();
    }

    // Block user
    public function blockUsers(){
        $data['users'] = User::onlyTrashed()->paginate(15);
        return view("{$this->directory}block-user", $data);
    }

    // Unblock user
    public function userUnblock($id){
        $user = User::Where('id', $id)->restore();
        Toastr::success('Unblocked completed', 'Success');
        return redirect()->back();
    }

    // Login page
    public function login(){
        return view("auth.admin-login");
    }

    // Register page
    public function register(){
        return view("auth.admin-register");
    }

}
