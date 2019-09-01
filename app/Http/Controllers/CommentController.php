<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request){

        $request->validate([
            'model' => 'required',
            'id' => 'required',
            'comment' => 'required',
            'g-recaptcha-response' => ['required' , 'captcha']
        ]);

        $comment = new Comment();
        $comment->model_type = $request->model;
        $comment->model_id = $request->id;
        $comment->author = $request->name ?? 'Аноним';
        $comment->text = $request->comment;
        $comment->save();

        return back();

    }
}
