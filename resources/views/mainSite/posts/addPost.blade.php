@extends('layouts.mainSiteLayout')

@section('content')
<div class="background-photo">
    <div class="blur">
        <div class="container w-50">
            <div class="row justify-content-center">
                    <form  class="mt-5" method="POST" action="{{route('blog.addPost')}}">
                    @csrf
                        <div class="form-floating mb-4 w-50">
                            <input type="text" class="form-control" id="title" placeholder="Enter the title" name="title">
                            <label for="title">Title</label>
                        </div>
                        <select class="form-floating form-select mb-4 w-50" name="categoryID">
                            <option selected>Select a category</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                        <div class="form-floating mb-4">
                            <textarea name="body" id="postBody" cols="70" rows="70" class="form-control" placeholder="body"></textarea>
                            <label for="postBody">Start writing here</label>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary px-3">Create</button>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
