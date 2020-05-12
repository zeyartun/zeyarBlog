<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\postCategory;
use App\User;
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
        $posts = post::withTrashed()->paginate(12);
        $categorys = postCategory::all();
        return view('admin/home')->with(['posts'=>$posts, 'categorys'=> $categorys]);
    }

    public function welcome()
    {
        $categorys = postCategory::all();
        return view('admin/welcome')->with(['categorys'=> $categorys]);
    }

    public function PostShow($postID)
    {
        $posts = post::withTrashed()->where('id',$postID)->get();
        $categorys = postCategory::all();
        return view('admin/postView')->with(['posts'=>$posts, 'categorys'=> $categorys]);
    }

     public function show($catID)
    {
        $categorys = postCategory::all();
        $categoryView = post::withTrashed()->where('cat_ID',$catID)->get();
        return view('admin/catView')->with(['categoryView'=>$categoryView , 'categorys'=>$categorys]);
    }

    public function destory($postID)
    {
        $posts = post::find($postID);
        $posts->delete();
        return redirect('admin/home')->with('success', 'A post deleted successfully.');
    }

    public function newPost()
    {
        $categorys = postCategory::all();
        return view('admin/postNew')->with(['categorys'=>$categorys]);
    }

    public function editPost($postID)
    {
        $categorys = postCategory::all();
        $posts = post::withTrashed()->find($postID);
        return view('admin/postEdit')->with(['posts'=>$posts , 'categorys'=>$categorys]);
    }

    public function editCategory()
    {
        $categorys = postCategory::all();
        return view('admin/catEdit')->with(['categorys'=>$categorys]);
    }

    public function Restore($postID)
    {
        $posts = post::withTrashed()->where('id', $postID)->restore();
        return redirect('admin/home')->with('success', 'A post restore successfully.');
    }

    public function PostNew(Request $req)
    {
        $req->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $posts = new post();
            $DBimages=[];
            if($req->hasFile('images')){
                foreach($req->file('images') as $image){
                    $image_name = time()."_". $image->getClientOriginalName();
                    $image->move(public_path('image'),$image_name);

                    array_push($DBimages,$image_name);
                }
            }
                
                // return back();
                

        $posts->cat_ID = $req->input('category');
        $posts->postTitle = $req->title;
        $posts->postContent = $req->content;
        $posts->images = encrypt($DBimages);
        $posts->user_ID = auth()->id();
        
        $posts->save();
        return redirect('admin/home')->with('success', 'A post created successfully.');
    }

     public function PostEdit(Request $req, $postID)
    {
        $req->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $posts = post::withTrashed()->find($postID);
        $DBimgs = [];
        if($req->hasFile('images')){

            $old_images = $posts->images;
            if($old_images != null){
                $de_old_image = decrypt($old_images);
                foreach($de_old_image as $old_imgs){
                    unlink(public_path('image/'.$old_imgs));
                }
            }               

            foreach($req->file('images') as $image){
                
                $image_name =time().'_'.$image->getClientOriginalName();
                $image->move(public_path('image'),$image_name);
                array_push($DBimgs,$image_name);
            }
            $posts->images = encrypt($DBimgs);
        }

        $posts->cat_ID = $req->input('category');
        $posts->postTitle = $req->title;
        $posts->postContent = $req->content;        
        $posts->user_ID = auth()->id();

        $posts->update();
        return redirect('admin/home')->with('success', 'A post Update successfully.');
    }

    public function categoryAdd(Request $request)
    {
        $cat = new postCategory();

        $cat->catName = $request->New_Category;
        $cat->user_ID = auth()->id();

        $cat->save();
        return redirect('admin/category/categoryEdit')->with('success', 'A Category Add successfully.');
    }

    public function categoryDelete(Request $request)
    {
        $catID = $request->input('category');
        $cat = postCategory::find($catID);
        $cat->delete();
        return redirect('admin/category/categoryEdit')->with('success', 'A Category Delete successfully.');
    }

    public function categoryEdit(Request $request)
    {
        $catID = $request->input('category');
        $cat = postCategory::find($catID);
        $cat->catName = $request->Edit_Category;
        $cat->user_ID = auth()->id();
        $cat->save();
        return redirect('admin/category/categoryEdit')->with('success', 'A Category Update successfully.');
    }

    public function UserNew()
    {
        $categorys = postCategory::all(); 
        return view('admin/user')->with(['categorys'=>$categorys]);
    }

    public function RegisterUser(Request $request)
    {
        $categorys = postCategory::all(); 
        $user = new User();
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->password = $request->password;
        return view('admin/user')->with(['categorys'=>$categorys]);
    }


}
