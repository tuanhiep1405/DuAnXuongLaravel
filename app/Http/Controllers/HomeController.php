<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
  {
    $cate = DB::table('categories')->get();
    // dd($cate);
    $posts = DB::table('posts')
      ->join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.id','posts.content', 'posts.type_id', 'posts.image', 'posts.title', 'posts.views', 'posts.created_at', 'categories.name as category_name')
      ->where('type_id', '=', 1)
      ->orderBy('posts.views', 'desc')
      ->limit(3)
      ->get();
    // dd($posts);
    $top3 = DB::table('posts')
      ->join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.id','posts.image', 'posts.title', 'posts.views', 'posts.created_at', 'categories.name as category_name')
      ->where('type_id', '=', 2)
      ->orderBy('posts.created_at', 'desc')
      ->limit(3)
      ->get();
    // dd($post);
    $normal = DB::table('posts')
      ->join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.id','posts.content', 'posts.image', 'posts.title', 'posts.views', 'posts.created_at', 'categories.name as category_name')
      ->where('type_id', '=', 3)
      ->orderBy('posts.created_at', 'desc')
      ->limit(1)
      ->get();

    $top4 = DB::table('posts')
      ->join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.id','posts.content','posts.image', 'posts.title', 'posts.views', 'posts.created_at', 'categories.name as category_name')
      ->orderBy('posts.created_at', 'desc')
      ->limit(4)
      ->get();
     
    return view(
      'client.index',compact('cate','posts','top3','normal','top4')
      
        
    );
  }
  public function search(Request $request)
{
  $cate = DB::table('categories')->get();

    $query = $request->input('query');

    $posts = DB::table('posts')
        ->select(
            'posts.id',
            'posts.created_at',
            'posts.title',
            'posts.content',
            'posts.image',
            'posts.views',
            'categories.name as category_name',
            DB::raw('GROUP_CONCAT(tags.name SEPARATOR ", ") as tag_names')
        )
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->leftJoin('post_tags', 'posts.id', '=', 'post_tags.post_id')
        ->leftJoin('tags', 'post_tags.tag_id', '=', 'tags.id')
        ->where(function ($q) use ($query) {
            $q->where('posts.title', 'like', '%' . $query . '%')
              ->orWhere('posts.content', 'like', '%' . $query . '%')
              ->orWhere('tags.name', 'like', '%' . $query . '%');
        })
        ->groupBy('posts.id', 'posts.title', 'posts.content', 'posts.image', 'posts.views', 'categories.name')
        ->get();

    return view('client.search_results', compact('posts', 'query','cate'));
}
}
