<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
           'posts' => Post::paginate(50),
        ]);
    }


    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
//        ddd(request()->all());
//        request()->file('thumbnail');
        $path = request()->file('thumbnail')->store('thumbnails');
//        dd($path);

        $attributes = request()->validate([
            'title' => 'required',
//            Str::slug
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')] // wymagane, i spradza czy istnieje w tabeli categories i w kolumnie ID
        ]);

////        Post::create($attributes);
//        Post::create([
//            'title' => $attributes['title'],
//            //etc/
//        ]);

        $attributes['user_id'] = auth()->id();
//        $attributes['slug'] = str_replace(' ', '-', $attributes['title']);
//        $attributes['slug'] = $attributes['title'];


        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

//        session()->flash('success', 'Stworzono post');
        return redirect("/")->with('success', 'Stworzono post');
//        return redirect("/");

    }


        public function edit(Post $post){  // this one post associated with URI
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }


    public function update(Post $post){
        $attributes = request()->validate([
            'title' => 'required',
//            Str::slug
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')], // wymagane, i spradza czy istnieje w tabeli categories i w kolumnie ID
            'published_at' => 'required',
        ]);


//        var_dump($attributes['thumbnail']);
//        exit();
//        exit();
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return redirect("/")->with('success', 'upgraded well');

    }

    public function destroy(Post $post){ // to co przekuazyjemy w uri
        $post->delete();
    }


}
