<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id = 0)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        $cate = DB::table('categories')->get();

        $chiTiet = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select(
                'posts.id',
                'posts.category_id',
                'posts.summary',
                'posts.content',
                'posts.type_id',
                'posts.image',
                'posts.title',
                'posts.views',
                'posts.created_at',
                'categories.name as category_name'
            )
            ->where('posts.id', $id)
            ->first();

        // Lấy ra các bài viết tương tự trong cùng danh mục
        $tuongtu = DB::table('posts as p')
            ->join('categories', 'p.category_id', '=', 'categories.id')
            ->select('p.id', 'p.category_id', 'p.created_at', 'p.title',  'p.image', 'categories.name as category_name')
            ->where('p.category_id', '=', $chiTiet->category_id)
            ->where('p.id', '!=', $id)
            ->limit(3)
            ->get();

        // dd($tuongtu);
        //tag
        $postWithTags = DB::table('posts')
            ->select('posts.id', 'posts.title as post_title', 'tags.name as tag_name', 'tags.id AS tags_id')
            ->join('post_tags', 'posts.id', '=', 'post_tags.post_id')
            ->join('tags', 'post_tags.tag_id', '=', 'tags.id')
            ->where('posts.id', $id)
            ->get();
        // dd($postWithTags);

        $bl = DB::table('comments')
            ->leftJoin('reply_comments', 'comments.id', '=', 'reply_comments.comment_id')
            ->join('users as comment_user', 'comments.user_id', '=', 'comment_user.id')
            ->leftJoin('users as reply_user', 'reply_comments.user_id', '=', 'reply_user.id')
            ->where('comments.post_id', '=', $id)
            ->select(
                'comment_user.username as comment_user',
                'comments.id as comment_id',
                'comments.content as comment_content',
                'comments.created_at as comment_date',
                'reply_comments.id as reply_id',
                'reply_user.username as reply_user',
                'reply_comments.content as reply_content',
                'reply_comments.created_at as reply_date'
            )
            ->orderBy('comments.created_at', 'desc')
            ->get();

        // dd($bl->toArray());   
       
        return view(
            'client.chiTiet',compact('cate','chiTiet','tuongtu','postWithTags','bl'));
            
    }
    public function store(Request $request)
{
    // dd($request->all());
    // Validate the request
    $data = $request->validate([
        'post_id' => 'required|integer',
        'user_id' => 'required|integer', 
        'content' => 'required|string',
    ]);
// dd($data);
    Comment::query()->create($data);
    return back();
}
}
