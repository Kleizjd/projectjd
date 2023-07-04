<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Query\Builderl;

class PostController extends Controller
{
    public function template()
    {
        // $posts = Image::select('*')->where('imageable_type', '=', 'App\Models\Post')->latest('id')->paginate(3);
        $cant_post = 3;
        $posts = Post::select('*')
            ->join('images', 'posts.id', '=', 'images.imageable_id')
            ->where('imageable_type', '=', 'App\Models\Post')->get(); //selecciona imagenes

        return view('welcome', compact('posts'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('posts.index', ['categories' => $categories]);
    }
    // public function index(){$categories = Category::all();return view('news.index', ['categories' => $categories]);}
    public function show(Post $post)
    {
        // dd($post);
        // $this->authorize('published', $post);
        $similares = Post::where('category_id', $post->category_id)
                                ->where('status', 2)
                                ->where('id', '!=',$post->id)
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
