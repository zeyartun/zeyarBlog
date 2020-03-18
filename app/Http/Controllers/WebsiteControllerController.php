<?php

namespace App\Http\Controllers;

use App\websiteController;
use Illuminate\Http\Request;
use App\post;
use App\postCategory;


class WebsiteControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::paginate(12);
        $categorys = postCategory::all();
        return view('websiteView/webhome')->with(['categorys'=>$categorys ,'posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\websiteController  $websiteController
     * @return \Illuminate\Http\Response
     */
    public function show($websiteController)
    {
        $categorys = postCategory::all();
        $categoryView = post::where('cat_ID',$websiteController)->get();
        return view('websiteView/catView')->with(['categoryView'=>$categoryView , 'categorys'=>$categorys]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\websiteController  $websiteController
     * @return \Illuminate\Http\Response
     */
    public function edit(websiteController $websiteController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\websiteController  $websiteController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, websiteController $websiteController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\websiteController  $websiteController
     * @return \Illuminate\Http\Response
     */
    public function destroy(websiteController $websiteController)
    {
        //
    }

     public function PostShow($postID)
    {
        $posts = post::where('id',$postID)->get();
        $categorys = postCategory::all();
        return view('websiteView/postView')->with(['posts'=>$posts, 'categorys'=> $categorys]);
    }
}
