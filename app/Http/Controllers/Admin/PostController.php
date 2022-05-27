<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Post, Category, Tag, Image};
use Illuminate\Support\Facades\{Validator, Storage};
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        $posts = Post::select('id', 'status', 'title')
        ->orderBy('id', 'DESC')
        ->paginate(40);

        return view('Admin.Blog.Home', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest('id')
            ->pluck('title', 'id');
        $tags = Tag::select('id', 'title')
            ->orderBy('id', 'DESC')
            ->get();

        return view('Admin.Blog.Create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => 'required|min:3|unique:posts,title',
            'image'         => 'required|image|mimes:jpeg,jpg,jpe,png,webp|max:5120',
            'category'      => 'required',
            'tags'          => 'required',
            'images.*'      => 'image|mimes:jpeg,jpg,jpe,png,webp|max:5120',
            'content'       => 'required|min:3',
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'title.required'        => 'Ingrese un titulo',
            'title.min'             => '3 caracteres como minimo',
            'title.unique'          => 'Este campo ya existe',

            'image.required'        => 'Seleccione una imagen',
            'image.image'           => 'No es una imagen',
            'image.mimes'           => 'Formatos permitidos JPG JPEG PNG WEBP',
            'image.max'             => '5mb como maximo',

            'category.required'     => 'Selecione una categoría',

            'tags.required'         => 'Selecione una etiqueta',

            'images.image'          => 'No es una image',
            'images.mimes'          => 'Formatos permitidos JPG JPEG PNG WEBP',
            'images.max'            => '5mb como maximo',

            'content.required'      => 'Ingrese el contenido',
            'content.min'           => '3 caracteres como minimo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error al guardar los datos');
        else:
            $post              = new Post();
            $post->status      = $request->input('status');
            $post->title       = $request->input('title');
            $post->slug        = Str::slug($post->title . "-" . Date::now());

            if($request->hasFile('image')){

                $image = $request->file('image');
                $image_new = Str::random(20) . $image->getClientOriginalName();
                $ruta = storage_path() . '/app/public/post/';
                $request->image->move($ruta, $image_new);
                $post->image    = '/storage/post/' . $image_new;
            }

            $post->category    = $request->input('category');
            $post->description = $request->input('description', null);
            $post->content     = $request->input('content');
            $post->save();
            $last_id           = $post->id;

            if ($request->tags){
                $post->tags()->attach($request->tags);
            }

            if ($request->hasFile('images')){
                $images = $request->file('images');
                foreach ($images as $image){

                    $image_new    = Str::random(20) . $image->getClientOriginalName();
                    $ruta         = storage_path() . '/app/public/post/';
                    $image->move($ruta, $image_new);

                    $image = Image::create([
                        'status'  => $post->status,
                        'post_id' => $last_id,
                        'title'   => $post->title,
                        'url'     => '/storage/post/' . $image_new,
                    ]);
                }
            }
        endif;
        return redirect()->route('admin.posts.edit', $post->id)->with('success', 'Publicacón creada con éxito');
    }

    public function edit($id)
    {
        $categories = Category::latest('id')
            ->pluck('title', 'id');
        $tags = Tag::select('id', 'title')
            ->orderBy('id', 'DESC')
            ->get();

        $post = Post::find($id);

        $images = Image::select('id', 'url')
            ->where('post_id', $id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('Admin.Blog.Edit', compact('categories', 'tags', 'post', 'images'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'status'        => 'required|in:1,2',
            'title'         => "required|min:3|unique:posts,title,$id",
            'image'         => 'image|mimes:jpeg,jpg,jpe,png,webp|max:5120',
            'category'      => 'required',
            'tags'          => 'required',
            'images.*'      => 'image|mimes:jpeg,jpg,jpe,png,webp|max:5120',
            'content'       => 'required|min:3',
        ];
        $messages = [
            'status.required'       => 'Marque el estado',
            'status.in'             => 'Campo invalido',

            'name.required'         => 'Ingrese un titulo',
            'name.min'              => '3 caracteres como minimo',
            'name.unique'           => 'Este campo ya existe',

            'image.image'           => 'No es una imagen',
            'image.mimes'           => 'Formatos permitidos JPG JPEG PNG WEBP',
            'image.max'             => '5mb como maximo',

            'category.required'     => 'Selecione una categoría',

            'tags.required'         => 'Selecione una etiqueta',

            'images.image'          => 'No es una image',
            'images.mimes'          => 'Formatos permitidos JPG JPEG PNG WEBP',
            'images.max'            => '5mb como maximo',

            'content.required'      => 'Ingrese el contenido',
            'content.min'           => '3 caracteres como minimo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('error','Error, al actualizar los campos');
        else:
            $post              = Post::find($id, ['id']);
            $post->status      = $request->input('status');
            $post->title       = $request->input('title');
            $post->slug        = Str::slug($post->title . "-" . Date::now());
            $post->category    = $request->input('category');
            $post->description = $request->input('description', null);
            $post->content     = $request->input('content');
            $post->save();
            $last_id           = $post->id;

            if($request->hasFile('image')){

                $post = Post::find($id, ['id', 'image']);
                $image = str_replace('storage', 'public', $post->image);
                Storage::delete($image);

                $image = $request->file('image');
                $image_new = Str::random(20) . $image->getClientOriginalName();
                $ruta = storage_path() . '/app/public/post/';
                $request->image->move($ruta, $image_new);
                $post->image    = '/storage/post/' . $image_new;
                $post->save();
            }

            if ($request->tags){
                $post->tags()->sync($request->tags);
            }


            if ($request->hasFile('images')){
                $post_images = $request->file('images');

                $images = Image::select('id', 'url')
                    ->where('post_id', $id)->get();

                foreach ($images as $image){
                    $images_images = str_replace('storage', 'public', $image->url);
                    Storage::delete($images_images);
                    $image->delete();
                }

                foreach ($post_images as $post_image){
                    $image_new       = Str::random(20) . $post_image->getClientOriginalName();
                    $ruta            = storage_path() . '/app/public/post/';
                    $post_image->move($ruta, $image_new);

                    $image = Image::create([
                        'status'  => $request->status,
                        'post_id' => $last_id,
                        'title'    => $request->title,
                        'url'     => '/storage/post/' . $image_new,
                    ]);
                }
            }

        endif;
        return back()->with('success', 'Publicación actuaizada con éxito');
    }

    public function destroy($id)
    {
        $post = Post::find($id, ['id', 'image']);
        $images = $post->imagenes()
            ->select('id', 'url')
            ->get();

        $post_image = str_replace('storage', 'public', $post->image);
        Storage::delete($post_image);
        $post->delete();

        foreach ($images as $image){
            $images_images = str_replace('storage', 'public', $image->url);
            Storage::delete($images_images);
            $image->delete();
        }

        return back()->with('success', 'Publicación eliminada con éxito');
    }
}
