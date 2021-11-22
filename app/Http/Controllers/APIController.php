<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
//    protected $user;
//
//    public function __construct($request, $next)
//    {
//        $this->middleware(function ($request,$next){
//           $this->user = Auth::user();
//           return $next($request);
//        });
//    }

    public static function getPosts()
    {
//        dd(\auth());
        $query = Post::select('title', 'slug', 'excerpt', 'body', 'created_at','tags');

        return datatables($query)->addColumn('action', function ($row) {
            $html = '<a href="javascript:void(0)" data-id="' . $row->slug . '"  class="edit btn btn-xs btn-secondary btn-edit " ><span><i class="bi bi-pencil-square"></i></span></a>';
            $html .= '<button data-id="' . $row->slug . '" class="delete btn btn-xs btn-danger btn-delete"><i class="bi bi-trash-fill"></i></span></button>';
            return $html;
        })->make(true);
    }

}
