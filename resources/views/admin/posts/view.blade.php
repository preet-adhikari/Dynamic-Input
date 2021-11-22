@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
@endsection

@include('partials.menu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <h1>View Posts</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @else
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif

                </div>

                <div class="panel-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Excerpt</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Tags</th>
                                @can('post_edit')
                                <th width="70">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('javascripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
        jQuery(document).ready( function ($){

            var table = $('#datatable').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax": "{{ route('api.view-posts') }}",
                "columns" : [
                    { "data" : "title" },
                    { "data" : "slug" },
                    { "data" : "excerpt" },
                    { "data" : "body" },
                    {"data" : "created_at"},
                    {"data" : "tags"},
                    @can('post_edit')
                    {"data" : "action"}
                    @endcan

                ],
                "search": {
                    "regex": true
                }

            });
            $(".alert").delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
            $('#datatable').on('click','.edit',function (){
                let slug = $(this).attr('data-id');
                location.href = '/admin/edit-post/'+slug;
            });
            $('#datatable').on('click','.delete',function (){
                let slug = $(this).attr('data-id');
                location.href = '/admin/delete-post/'+slug;
            });

        });
    </script>



@endsection
