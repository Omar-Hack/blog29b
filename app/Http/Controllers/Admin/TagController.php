<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    public function index()
    {
        $tags = Tag::select('id', 'status', 'title')
            ->orderBy('id', 'DESC')
            ->paginate(40);

        return view('Admin.Tag.Home', compact('tags'));
    }
    public function create()
    {
        return view('Admin.Tag.Create');
    }

    public function store(Request $request)
    {
        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => 'required|min:3|max:50|unique:tags,title',
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'title.required'        => 'Ingrese un titulo',
            'title.min'             => '3 caracteres como minimo',
            'title.max'             => '50 caracteres como maximo',
            'title.unique'          => 'Este campo ya existe',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al guardar los datos');
        else:
            $tag              = new Tag();
            $tag->status      = $request->input('status');
            $tag->title       = $request->input('title');
            $tag->slug        = Str::slug($tag->title . "-" . Date::now());
            $tag->icon        = $request->input('icon', null);
            $tag->description = $request->input('description',null);
            $tag->save();

        endif;
        return redirect()->route('admin.tags.edit', $tag->id)->with('success', 'Etiqueta creada con éxito');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('Admin.Tag.Edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => "required|min:3|max:50|unique:tags,title,$id",
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'title.required'         => 'Ingrese un titulo',
            'title.min'              => '3 caracteres como minimo',
            'title.max'              => '50 caracteres como maximo',
            'title.unique'           => 'Este campo ya existe',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al actualizar los datos');
        else:
            $tag              = Tag::find($id);
            $tag->status      = $request->input('status');
            $tag->title       = $request->input('title');
            $tag->slug        = Str::slug($tag->title . "-" . Date::now());
            $tag->icon        = $request->input('icon', null);
            $tag->description= $request->input('description',null);
            $tag->save();

        endif;
        return back()->with('success', 'Etiqueta actuaizada con éxito');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id, ['id']);
        $tag->delete();

        return back()->with('error', 'Esta etiqueta ya no existe');
    }
}
