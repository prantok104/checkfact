<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Post;
use App\Models\admin\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class PageController extends Controller
{
    protected $directory = 'front.pages.';

    //Home page
    public function index(){
        $data = [
            'hero_posts' => Post::where(['draft'=> 1, 'fixed_hero' => NULL])->latest()->limit(4)->get(),
            'fixed_hero' => Post::where(['draft'=> 1, 'fixed_hero' => 1])->latest()->limit(1)->get(),
            'video_posts' => Video::where('status', 1)->latest()->limit(5)->get(),
            'maximum_reading' => Post::where('draft', 1)->orderBy('status', 'DESC')->limit(14)->get(),
            'category' => Category::all(),
        ];
        return view("{$this->directory}index", $data);
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

    // Archive Search
    public function archiveSearch(Request $request){
        $request->validate([
            'year'  => 'required',
            'month' => 'required'
        ],[
           'year.required'   => 'বছর নির্বাচন করুন',
           'month.required'   => 'মাস নির্বাচন করুন',
        ]);


        $post['archive'] = Post::whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->where('draft', 1)->paginate(20);
        $post['search'] = [
            'month' => $request->month,
            'year'  => $request->year,
        ];

        return view("{$this->directory}archive-search", $post);
    }

    // Single Page
    public function singlePage(Request $request){
        Post::where('slug_en', $request->slug)->increment('status');
        $post['post'] = Post::where('slug_en', $request->slug)->where('draft', 1)->with('categories')->get();
        $post['related'] = Post::where('category_id', $post['post'][0]->category_id)
            ->where('id', '!=', $post['post'][0]->id)
            ->where('draft', 1)
            ->latest()
            ->limit(8)
            ->get();
        return view("{$this->directory}single", $post);
    }

    // Global Search
    public function globalSearch(Request $request){
        $data['search_result'] = Post::where('title_en', 'like', '%'.$request->s.'%')
            ->orWhere('title_bn', 'like', '%'.$request->s.'%')
            ->where('draft', 1)
            ->latest()->paginate(20);
        $data['search'] = $request->s;
        return view("{$this->directory}search", $data);
    }

    // News route
    public function news(){
        $data['posts_first'] = Post::offset(0)->limit(1)->latest()->where('draft', 1)->get();
        $data['posts_second'] = Post::offset(1)->limit(1)->latest()->where('draft', 1)->get();
        $without = Post::latest()->take(2)->pluck('id');
        $data['posts_third'] = Post::where('draft', 1)->latest()->whereNotIn('id', $without)->paginate(20);
        return view("{$this->directory}news", $data);
    }

    // Category page
    public function categoryPage(Request $request){
        $data['posts'] = Category::with('posts')->where('categories.slug_en', $request->slug)->paginate(12);
        $data['title'] = $request->slug;
//
//        dd($data['posts'][0]['posts']);
        return view("{$this->directory}category", $data);
    }
}
