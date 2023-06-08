<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('settings.index', ['users' => $users]);
    }

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
        $request->validate([
            'nombre' => 'required',
            'email2' => 'required|email|unique:users,email|string|max:255',
            'password_user' => 'required',
            'password_confirm' => 'required|same:password_user',
            'rol' => 'required'
        ]);
        $user = new User();
        // $user = User::user(); //alternativa
        // $user->create();
        // $user = Auth::user();

        $user->name = $request->nombre;
        $user->email = $request->email2;
        $user->password = Hash::make($request->password_user);
        $user->rol = $request->rol;
        // UPLOAD IMAGES
        $file = $request->file('photo2');
        // dd($file);
        if (!empty($file)) {
            $nombre =  time() . "_" . $file->getClientOriginalName();
            $imagenes = $file->storeAs('public/uploads', $nombre);
            $url = Storage::url($imagenes);
            File::create(['url' => $url]);
            $user->photo = $url;
        }
        $user->save();
        return back()->with('message', 'User Created');
    }
    // public function store(StoreContact $request)
    // {
    //     $correo = new ContactanosMailable($request->all());
    //     Mail::to("jose.jdgo97@gmail.com")->send($correo);
    //     return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado');
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->img_user = $request->img_user;

        $user->save();
        return redirect()->route('settings.index');
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
