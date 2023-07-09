<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\Builderl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function template()
    {
        // $cant_post = 3;
        $posts = Post::select('*')
            ->join('images', 'posts.id', '=', 'images.imageable_id')
            ->where('imageable_type', '=', Post::class)
            ->orderBy('posts.id', 'desc') // comienza desde el ultimo post
            ->get();
        // dd($posts);

        return view('welcome', compact('posts'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('posts.index', compact('categories'));
    }
    // public function index(){$categories = Category::all();return view('news.index', ['categories' => $categories]);}
    public function show(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
        // dd($similares);
        return view('posts.show', compact('post', 'similares'));
        // return view('posts.show');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(['foto' => 'required|image|max:2048', 'category_id' => 'required']);

        $post = new Post();
        $file = $request->file('foto');
        $nombre =  time() . "_" . $file->getClientOriginalName();
        $post->title = $request->txtTitulo;
        $post->slug = Str::slug($request->txtTitulo);
        $post->body = $request->txtDescripcion;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $imagenes = $request->file('foto')->storeAs('public/uploads', $nombre);
        $url = Storage::url($imagenes);
        
        $post->save();

        $imagen_id = $post->getKey(); // Obtener el ID del modelo "Post" después de guardarlo en la base de datos

        Image::create(['url' => $url,'imageable_id' => $imagen_id,'imageable_type' => Post::class]);

        return redirect()->route('post')->with('success', 'New Created succesfully');
    }
}
