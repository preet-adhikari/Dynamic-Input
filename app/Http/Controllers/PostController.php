<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.posts.view');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('post_create');
        $category = Category::all();
        $blogger = Blogger::where('is_editor','=',1)->get();
        return view('admin.posts.add',compact('category','blogger'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|max:191',
            'body' => 'required'
        ]);
//        Save Post
        $post = new Post();
        $post->title = $request->title;
        $post->blogger_id = $request->bloggerID;
        $post->category_id = $request->categoryID;
//        Condition for slug and excerpt
        if(!($request->slug)){
            $post->slug = Str::slug($request->title,'-');
        }
        else{
            $post->slug = $request->slug;
        }
        if (!($request->excerpt)){
            $post->excerpt = $this->excerpt($request->body);
        }
        else{
            $post->excerpt = $request->excerpt;
        }
        $post->body = $request->body;
        if($request->tags){
//            foreach($request->tags as $tag){
//                $post->tag = $tag;
//            }
            $post->tags = json_encode($request->tags);
        }
        $post->save();
        return redirect('admin/view-posts')->with('success','Post has been added successfully');
    }

//    Generate excerpt
    public function excerpt($content): string
    {
        $content = html_entity_decode(strip_tags($content));
        $pos = strpos($content,'.');

        if($pos){
            return Str::lower(substr($content,0,$pos));
        }
        else{
            return Str::lower($content);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($slug)
    {
        $this->authorize('post_edit');
        $post = Post::where('slug','=',$slug)->first()->toArray();
        $blogger = Blogger::where('is_editor','=',1)->get();
        $category = Category::all();
        return view('admin.posts.edit',compact('post','blogger','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'body' => 'required'
        ]);
        $post = Post::where('id','=',$id)->first();
        $post->title = $request->title;
        $post->blogger_id = $request->bloggerID;
        $post->category_id = $request->categoryID;
//        Condition for slug and excerpt
        if(!($request->slug)){
            $post->slug = Str::slug($request->title,'-');
        }
        else{
            $post->slug = $request->slug;
        }
        if (!($request->excerpt)){
            $post->excerpt = $this->excerpt($request->body);
        }
        else{
            $post->excerpt = $request->excerpt;
        }
        $post->body = $request->body;
        if($request->tags){
            $post->tags = $request->tags;
        }
        $post->save();
        return redirect('admin/view-posts')->with('success','Post has been updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function destroy($slug)
    {
        $this->authorize('post_delete');
        $post = Post::where('slug','=',$slug)->first();
        $post->delete();
        return redirect('admin/view-posts')->with('danger','Post has been deleted successfully');
    }


}
