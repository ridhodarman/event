<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agen;
use Auth;
use App\Event;
use App\Tiket;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agen_index()
    {
        if (Auth::check()) { $user = Auth::user()->id; }
        $agen = Agen::select('no_whatsapp')
                ->where('user_id', $user)->get();

        $tgl = date('Y-m-d');
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->where('tanggal_mulai', '>=', $tgl)->orderBy('tanggal_mulai')->get();

        return view ('agen.index',['agen' => $agen, 'event' => $event]);
    }

    public function penjualan()
    {
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->orderBy('tanggal_mulai')->get();
        return view ('agen.tiket.penjualan',['event' => $event]);
    }

    public function kode_tiket()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
