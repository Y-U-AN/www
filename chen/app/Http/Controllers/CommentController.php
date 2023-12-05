<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function showCommentsPage()
    {

        $index = Post::latest()->get();


        return view('comments.show', ['index' => $index]);
    }


    public function showPostWithComments($postId)
    {
        // 根据文章 ID 获取相应的文章
        $post = Post::find($postId); // 假设您有一个名为 Post 的模型来表示文章，根据您的实际情况进行调整

        // 获取与该文章相关联的评论数据
        $comments = Comment::where('post_id', $postId)->get(); // 假设评论表中有一个字段用于存储文章 ID，并命名为 post_id

        // 将文章和评论数据一起传递给视图
        return view('post', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

       

}




