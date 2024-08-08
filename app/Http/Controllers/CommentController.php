<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function comentariosConCalificacion($min, $max)
    {
        $comments = Comment::whereBetween('calificacion', [$min, $max])->get();
        return view('comments.index', compact('comments', 'min', 'max'));
    }
}
