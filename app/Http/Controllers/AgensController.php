<?php

namespace App\Http\Controllers;

use App\Agen;
use Illuminate\Http\Request;
use App\User;

class AgensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::select('agens.id','name', 'email', 'no_whatsapp')
                    ->Join('users', 'users.id', '=', 'agens.user_id')
                    ->orderBy('name')->get();
        
        $user = User::select('id','name', 'email')->orderBy('name')->get();

        return view ('admin.agen.index',['agen' => $agen, 'user' => $user]);
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
        $this->validate($request, [
			'user_id' => 'unique:agens,user_id'
        ]);
        
        Agen::create($request->all());
        $pesan = "agen berhasil ditambahkan";
        return redirect('/agen')->with('status', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Agen $agen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(Agen $agen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agen $agen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agen $agen)
    {
        $agen = Agen::find($agen->id);
        $agen->delete();

        $pesan = $agen->nama_agen.' was removed';
        return redirect('/agen')->with('hapus', $pesan);
    }
}
