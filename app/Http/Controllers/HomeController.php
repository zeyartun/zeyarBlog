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

    public function PostShow($catID,$postID)
    {
        $posts = post::find($catID)->where('id',$postID)->get();
        $categorys = postCategory::all();
        return view('websiteView.postView')->with(['posts'=>$posts, 'categorys'=> $categorys]);
    }

     public function show($catID)
    {
        $categorys = postCategory::all();
        $categoryView = post::where('cat_ID',$catID)->get();
        return view('admin/catView')->with(['categoryView'=>$categoryView , 'categorys'=>$categorys]);


    }

    public function destory($postID)
    {
        $posts = post::find($postID);
        $posts->delete();
        return redirect('admin')->with('success', 'A post deleted successfully.');
    }


}
