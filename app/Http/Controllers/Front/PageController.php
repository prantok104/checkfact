<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class PageController extends Controller
{
    protected $directory = 'front.pages.';

    //Home page
    public function index(){
        return view("{$this->directory}index");
    }

    //Login page
    public function login(){
        return view("{$this->directory}signin");
    }

    //Register page
    public function register(){
        return view("{$this->directory}signup");
    }

    //Register page
    public function user(){
        return view("{$this->directory}user");
    }
    //Logout page
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
