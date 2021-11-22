@extends('layouts.app')

@include('partials.menu')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-2">Create a new post</h1>
                <form  method="POST" action="{{route('post.store')}}">
                    @csrf
                        <div class="form-floating mb-4 w-50">
                            <input type="text" class="form-control" id="title" placeholder="Enter the title" name="title">
                            <label for="title">Title</label>
                            @if($errors->has('title'))
                                <div class="alert-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-floating  mb-4 w-50">
                            <input type="text" class="form-control" id="slug" placeholder="slug" name="slug">
                            <label for="slug">Create a custom slug (optional)</label>
                            @if($errors->has('slug'))
                                <div class="alert-danger">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-4 w-50">
                            <input type="text" class="form-control" id="excerpt" placeholder="excerpt" name="excerpt">
                            <label for="excerpt">Customize your excerpt (optional)</label>
                            @if($errors->has('excerpt'))
                                <div class="alert-danger">{{ $errors->first('excerpt') }}</div>
                            @endif
                        </div>
{{--                        Select editor--}}
                        @if($blogger)
                            <select class="form-floating form-select mb-4 w-50" name="bloggerID">
                                <option selected>Select an Editor</option>
                                @foreach($blogger as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('bloggerID'))
                                <div class="alert-danger">{{ $errors->first('bloggerID') }}</div>
                            @endif
                        @endif
                        <select class="form-floating form-select mb-4 w-50" name="categoryID">
                            <option selected>Select a category</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach
                        </select>
                            @if($errors->has('categoryID'))
                                <div class="alert-danger">{{ $errors->first('categoryID') }}</div>
                            @endif
                        <div class="form-floating mb-4 w-50">
                            <textarea name="body" id="postBody" cols="30" rows="20" class="form-control" placeholder="body"></textarea>
                            <label for="postBody">Start writing here</label>
                            @if($errors->has('body'))
                                <div class="alert-danger">{{ $errors->first('body') }}</div>
                            @endif
                        </div>
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Tags</button>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('javascripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready( function() {
            $("#addRow").click(function () {
                let html = '';
                html += '<div id="inputFormRow">';
                html += '<div class="form-floating mb-4 w-50">';
                html += '<label for="tags">Enter the tags</label>';
                html += '<input type="text" name="tags[]" class="form-control" placeholder="Enter title">';
                html += '<div class="input-group-append">';
                html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                html += '</div>';
                html += '</div>';

                //add new row
                $('#newRow').append(html);
            });

            $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
            });
        });
    </script>
@endsection
