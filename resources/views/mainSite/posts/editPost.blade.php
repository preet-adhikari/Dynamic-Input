@extends('layouts.mainSiteLayout')

@section('content')
    <div class="background-photo">
        <div class="blur">
            <div class="container w-50">
                <div class="row justify-content-center">
                    <form  class="mt-5" method="POST" action="{{route('blog.updatePost',$post['id'])}}">
                        @csrf
                        <div class="form-floating mb-4 w-50">
                            <input type="text" class="form-control" id="title" placeholder="Enter the title" name="title" value="{{$post['title']}}">
                            <label for="title">Title</label>
                        </div>
                        @if($errors->has('title'))
                            <div class="alert-danger">{{ $errors->first('title') }}</div>
                        @endif
                        <select class="form-floating form-select mb-4 w-50" name="categoryID">
                            @foreach($category as $item)
                                @if($item->id == $post['category_id'])
                                    <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                    @continue
                                @endif
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
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
    </div>

@endsection
