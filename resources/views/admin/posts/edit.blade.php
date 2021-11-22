@extends('layouts.app')

@include('partials.menu')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit Post</h1>
                <form  method="POST" action="{{route('post.update',$post['id'])}}">
                    @csrf
                    <div class="form-floating mb-4 w-50">
                        <input type="text" class="form-control" id="title" placeholder="Enter the title" name="title" value="{{$post['title']}}">
                        <label for="title">Title</label>
                    </div>
                    @if($errors->has('title'))
                        <div class="alert-danger">{{ $errors->first('title') }}</div>
                    @endif
                    <div class="form-floating  mb-4 w-50">
                        <input type="text" class="form-control" id="slug" placeholder="slug" name="slug" value="{{$post['slug']}}">
                        <label for="slug">Slug</label>
                    </div>
                    @if($errors->has('slug'))
                        <div class="alert-danger">{{ $errors->first('slug') }}</div>
                    @endif
                    <div class="form-floating mb-4 w-50">
                        <input type="text" class="form-control" id="excerpt" placeholder="excerpt" name="excerpt" value="{{$post['excerpt']}}">
                        <label for="excerpt">Excerpt</label>
                    </div>
                    @if($errors->has('excerpt'))
                        <div class="alert-danger">{{ $errors->first('excerpt') }}</div>
                    @endif
                    {{--                        Edit editor if editor is there--}}
                    @if($blogger)
                        <select class="form-floating form-select mb-4 w-50" name="bloggerID">
                            @foreach($blogger as $item)
                                @if($item->id == $post['blogger_id'])
                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                    @continue
                                @endif
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('bloggerID'))
                            <div class="alert-danger">{{ $errors->first('bloggerID') }}</div>
                        @endif
                    @endif
{{--                    Edit category--}}
                    <select class="form-floating form-select mb-4 w-50" name="categoryID">
                        @foreach($category as $item)
                            @if($item->id == $post['category_id'])
                                <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                @continue
                            @endif
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                    </select>
                        @if($errors->has('categoryID'))
                            <div class="alert-danger">{{ $errors->first('categoryID') }}</div>
                        @endif
                    <div class="form-floating mb-4 w-50">
                        <textarea name="body" id="postBody" cols="30" rows="20" class="form-control" placeholder="body">{{$post['body']}}</textarea>
                        <label for="postBody">Post</label>
                    </div>
                        @if($errors->has('body'))
                            <div class="alert-danger">{{ $errors->first('body') }}</div>
                        @endif
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
