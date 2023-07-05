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
    public function index()
    {
        $users = User::all();
        return view('settings.index', ['users' => $users]);
    }

    public function create()
    {
        //
    }

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
    public function show($id)
    {
    }

    public function edit($id)
    {
        //
    }

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

    public function destroy($id)
    {
        //
    }
}
