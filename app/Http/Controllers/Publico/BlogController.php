<?php

namespace App\Http\Controllers\Publico;

use App\Models\{Category, Post, Tag, Image};
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function welcome_index(){
        $posts = Post::select('id', 'title', 'slug','description', 'image')
            ->where('status', '1')
            ->orderBy('id', 'DESC')
            ->paginate(7);
        return view('Public.Post', compact('posts'));
    }

    public function post_index(){
        $posts = Post::select('id', 'title', 'slug','description', 'image')
            ->where('status', '1')
            ->orderBy('id', 'DESC')
            ->paginate(7);

        return view('Public.Post', compact('posts'));
    }

    //Start View Blog
    public function blog_show(Post $post){

        $post_rights = Post::select('image', 'title','slug')
            ->where ([
                ['status', '1'],
                ['category', $post->category],
                ['id', '!=', $post->id],
            ])
            ->latest('id')
            ->take('3')
            ->get();

        $category = Category::select('title', 'slug', 'icon')
            ->where('id', $post->category)
            ->first();

        $tags = $post->tags()
            ->select('title', 'slug', 'icon')
            ->where('status', '1')
            ->get();

        $images = Image::select('id', 'url')
            ->where([
                ['status', '1'],
                ['post_id', $post->id],
            ])
            ->latest('id')
            ->get();

        $comments = $post->comments()
            ->where('status', '1')
            ->latest('id')
            ->get();

        //return ($comments);
        return view('Public.Blog', compact('post', 'post_rights', 'category', 'tags', 'images', 'comments'));
    }

    //Start Topics/Tags
    public function topic_index() {

        $tags = Tag::select('title', 'slug', 'icon')
            ->where('status', '1')
            ->latest('id')
            ->paginate(24);

        //return $topics;
        return view('Public.Topic', compact('tags'));
    }
    //Start View Topics/Tags
    public function topic_show(Tag $tag){

        $posts = $tag->posts()
            ->select('title', 'slug')
            ->where('status', '1')
            ->latest('id')
            ->paginate(7);

        //return ($posts);
        return view('Public.Post', compact('posts'));
    }
    //Start Category
    public function category_index() {
        $categories = Category::select('title', 'slug', 'icon')
            ->where('status', '1')
            ->latest('id')
            ->paginate(24);

        //return ($categories);
        return view('Public.Category', compact('categories'));
    }
    //Start View Category
    public function category_show(Category $category) {

        $posts = Post::where('category', $category->id)
            ->select('title', 'slug','description', 'image')
            ->where('status', '1')
            ->latest('id')
            ->paginate(24);

        //return ($posts);
        return view('Public.Post', compact('posts'));
    }
}
