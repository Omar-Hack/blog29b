<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\{Validator, Auth};

class CommentController extends Controller
{

    public function store(Request $request)
    {

        //return $request;
        $rules = [
            'content' => 'required|min:3'
        ];

        $messages = [
            'content.required' => 'Ingresa un comentario',
            'content.min'      => '3 caracteres como minimo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error, al guardar los siguientes campos');
        else:
            $comment              = new Comment();
            $comment->user_id     = Auth::user()->id;
            $comment->status      = "1";
            $comment->post_id     = $request->post;
            $comment->parent_id   = $request->parent_id;
            $comment->content     = e($request->input('content'));

            $comment->save();
            //return $comment;
        endif;

        return back()->with('success', 'comentario creado con éxito');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'content' => 'required|min:3'
        ];

        $messages = [
            'content.required'   => 'Ingrese un comentario',
            'content.min'        => '3 caracteres como minimo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al guardar los campos');
        else:
            $comment              = Comment::find($id,['id']);
            $comment->user_id     = Auth::user()->id;
            $comment->status      = "1";
            $comment->content     = e($request->input('content'));

            $comment->save();
            //return $comment;
        endif;

        return back()->with('success', 'comentario actualizado con éxito');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id, ['id']);
        $comment->delete();

        return back()->with('success', 'Comentario eliminado con éxito');
    }
}
