<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\postCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = post::paginate(12);
        $categorys = postCategory::all();
        return view('admin/home')->with(['posts'=>$posts, 'categorys'=> $categorys]);
    }

    public function welcome()
    {
        $categorys = postCategory::all();
        return view('admin/welcome')->with(['categorys'=> $categorys]);
    }
}
