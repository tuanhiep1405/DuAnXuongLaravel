<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TTLController extends Controller
{
   public function index($id)
   {
    $cate = DB::table('categories')->get();

    $chiTiet = DB::table('categories')
            ->select(
                'categories.name'
            )
            ->where('categories.id', $id)
            ->first();

    $posts = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select('posts.id', 'posts.content', 'posts.image', 'posts.title', 'posts.views', 'posts.created_at', 'categories.name as category_name')
                ->where('posts.category_id', $id)
                ->orderBy('posts.created_at', 'desc')
                ->get();
                //  dd($posts);
                return view(
                    'client.tinTrongLoai',
                    [
                        'posts' => $posts,
                        'cate' => $cate,
                        'chiTiet' => $chiTiet,
                    ]
                );
               
   }
}
