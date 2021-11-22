@extends('layouts.mainSiteLayout')

@section('content')
    <div class="background-photo2">
        <div class="blur">
            <div class="container w-50">
                <section class="my-4">
                    <h2 class="my-lg-4">{{$post['title']}}</h2> by {{$post['blogger']['name']}} in {{$post['category']['category_name']}}
                    <p class="mt-lg-4">{{$post['body']}}</p>
                </section>
                <a href="{{route('blog.edit-Post',$post['slug'])}}" class="btn btn-outline-info">Edit this post</a>
                <br>
                <a href="{{route('blog.postDelete',$post['slug'])}}" class="btn btn-outline-danger">Delete this post</a>
            </div>
        </div>
    </div>

@endsection
