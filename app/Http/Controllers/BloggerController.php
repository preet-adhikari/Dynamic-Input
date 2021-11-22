<?php

namespace App\Http\Controllers;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class BloggerController extends Controller
{
    public function BloggerLogin(){
        return view('mainSite.auth.BloggerLogin');
    }

    public function BloggerRegister(){
        return view('mainSite.auth.BloggerRegister');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
           'name' => 'required|unique:bloggers|max:120',
            'email' => 'required|unique:bloggers',
            'password' => 'required|max:20'
        ]);
        $blogger = Blogger::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|max:20'
        ]);

        $blogger =Blogger::where('email','=',$request->email)->first();
        if($blogger){
            if(Hash::check($request->password,$blogger->password)){
                $request->session()->put('logged_user_now',$blogger->email);
                return redirect('/blog');
            }else{
                return back();
            }
        }else{
            return back();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogger $blogger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogger $blogger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogger  $blogger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogger $blogger)
    {
        //
    }
}
