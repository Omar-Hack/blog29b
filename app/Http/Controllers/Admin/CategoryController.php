<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::select('id', 'status', 'title')
            ->orderBy('id', 'DESC')
            ->paginate(40);

        return view('Admin.Category.Home', compact('categories'));
    }

    public function create()
    {
        return view('Admin.Category.Create');
    }

    public function store(Request $request)
    {
        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => 'required|min:3|max:50|unique:categories,title',
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
            $category              = new Category();
            $category->status      = $request->input('status');
            $category->title       = $request->input('title');
            $category->slug        = Str::slug($category->name . "-" . Date::now());
            $category->icon        = $request->input('icon', null);
            $category->description = $request->input('description',null);
            $category->save();

        endif;
        return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Categoría creada con éxito');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('Admin.Category.Edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => "required|min:3|max:50|unique:categories,title,$id",
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
            return back()->withErrors($validator)->withInput()->with('error','Error al actualizar los datos');
        else:
            $category              = Category::find($id);
            $category->status      = $request->input('status');
            $category->title       = $request->input('title');
            $category->slug        = Str::slug($category->title . "-" . Date::now());
            $category->icon        = $request->input('icon', null);
            $category->description = $request->input('description',null);
            $category->save();

        endif;
        return back()->with('success', 'Categoría actualizada con exito');
    }

    public function destroy($id)
    {
        $category = Category::find($id, ['id']);
        $category->delete();

        return back()->with('error', 'Esta categoría ya no existe');
    }
}
