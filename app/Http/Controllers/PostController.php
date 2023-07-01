<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $cant_post = 3;
        $image = Image::select('*')->where('imageable_type', '=', 'App\Models\Post')->latest('id')->paginate(3);
        // // NO FUNCIONA, PERO DEBERIA
        // $sql = $image->toSql();
        // echo $sql;
        // $posts = Post::all()->latest('id')->paginate(3);
        // return view('welcome', compact('image', 'posts'));
    }
    // public function index(){$categories = Category::all();return view('news.index', ['categories' => $categories]);}
    public function show(Post $post)
    {
        dd($post);
        // $this->authorize('published', $post);
        // $similares = Post::where('category_id', $post->category_id)
        //                         ->where('status', 2)
        //                         ->where('id', '!=',$post->id)
        //                         ->latest('id')
        //                         ->take(4)
        //                         ->get();
        // return view('posts.show', compact('post', 'similares'));
        return $post;
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

        $news = new Post();
        $file = $request->file('foto');
        $nombre =  time() . "_" . $file->getClientOriginalName();
        $news->title = $request->txtTitulo;
        $news->description = $request->txtDescripcion;
        $news->category_id = $request->category_id;
        $imagenes = $request->file('foto')->storeAs('public/uploads', $nombre);
        $url = Storage::url($imagenes);
        File::create(['url' => $url]);
        $news->image_new = $url;

        $news->save();

        return redirect()->route('news')->with('success', 'New Created succesfully');
    }
}
