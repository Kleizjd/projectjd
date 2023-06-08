<?php

namespace App\Http\Controllers;

use App\Models\BreakingNew;
use App\Models\Category;
use App\Models\File;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Post::all();
        // dd($news);
        return view('welcome', compact('news'));
        // $categories = Category::all();
        // return view('news.index', ['categories' => $categories]);
    }
    // public function index()
    // {
    //     $categories = Category::all();
    //     return view('news.index', ['categories' => $categories]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['foto' => 'required|image|max:2048', 'category_id'=>'required']);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        $news = DB::table('breaking_news')
            ->join('categories', 'categories.id', '=', 'breaking_news.category_id')
            ->select(DB::raw('*'))
            ->get();
        return view('main', ['news' => $news]);
    }
    public function show($id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
