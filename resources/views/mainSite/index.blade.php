@extends('layouts.mainSiteLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @else
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        @foreach($posts as $item)
            <section class="my-2 p-4 text-center">
                <h3><h1 class="m-3"><a href="{{ route('blog.viewPost',$item->slug) }}" class="btn-outline-primary">{{$item->title}}</a></h1>by {{$item->blogger->name}}</h3>
                <p>{{$item->excerpt}}.</p>
            </section>
        @endforeach
    </div>
</div>

@endsection

@section('javascripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready( function ($) {
            $(".alert").delay(4000).slideUp(200, function () {
                $(this).alert('close');
            });
        });
    </script>

@endsection
