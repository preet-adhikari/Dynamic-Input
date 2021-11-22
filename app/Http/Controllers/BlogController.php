<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('mainSite.index',compact('posts'));
    }
    //View Single Post
    public function viewSinglePost($slug){
        $post = Post::where('slug','=',$slug)->first()->toArray();
        return view('mainSite.posts.singlePost',compact('post'));
    }

    //Create blog Post
    public function createPost(){
        $category = Category::all();
        return view('mainSite.posts.addPost',compact('category'));
    }


    //Add post
    public function addPost(Request $request){
        $request->validate([
            'title' => 'required|max:191',
            'body' => 'required'
        ]);
//        Save Post
        $post = new Post();
        $post->title = $request->title;
        $blogger_id = Blogger::where('email','=',$request->session()->get('logged_user_now'))->first('id');
        $post->blogger_id = $blogger_id->id;
        $post->category_id = $request->categoryID;
//        Condition for slug and excerpt
        if(!($request->slug)){
            $post->slug = Str::slug($request->title,'-');
        }
        else{
            $post->slug = $request->slug;
        }
        if (!($request->excerpt)){
            $post->excerpt = (new PostController)->excerpt($request->body);
        }
        else{
            $post->excerpt = $request->excerpt;
        }
        $post->body = $request->body;
        $post->save();
        return redirect('/blog')->with('success','Post has been created successfully');
    }

    public function editPost($slug){
        $post = Post::where('slug','=',$slug)->first()->toArray();
        $category = Category::all();
        return view('mainSite.posts.editPost',compact('post','category'));
    }

    public function updatePost($id,Request $request){
            $request->validate([
                'title' => 'required|max:191',
                'body' => 'required'
            ]);
            $post = Post::where('id','=',$id)->first();
            $post->title = $request->title;
            $blogger_id = Blogger::where('email','=',$request->session()->get('logged_user_now'))->first('id');
            $post->blogger_id = $blogger_id->id;
            $post->category_id = $request->categoryID;
//        Condition for slug and excerpt
            if(!($request->slug)){
                $post->slug = Str::slug($request->title,'-');
            }
            else{
                $post->slug = $request->slug;
            }
            if (!($request->excerpt)){
                $post->excerpt = (new PostController)->excerpt($request->body);
            }
            else{
                $post->excerpt = $request->excerpt;
            }
            $post->body = $request->body;
            $post->save();
            return redirect('/blog')->with('success','Post has been edited successfully');
    }

    public function deletePost($slug){
        $post = Post::where('slug','=',$slug)->first();
        $post->delete();
        return redirect('/blog')->with('danger','Post has been deleted successfully');
    }

}
