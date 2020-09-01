<?php

namespace App\Http\Controllers;

use App\Tiket;
use Illuminate\Http\Request;
use App\Event;
use App\Jenis_tiket;
use Auth;
use App\Agen;

class TiketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event)
    {
        $jenis_tiket = Jenis_tiket::select('id','nama_tiket', 'harga', 'keterangan', 'foto_tiket')
                                    ->where('event_id', '=', $event)
                                    ->orderBy('nama_tiket')
                                    ->get();

        $event = Event::select('id', 'nama_event')->where('id', '=', $event)->first();
        
        return view( 'agen.tiket.tambah',['jenis_tiket' => $jenis_tiket, 'event' => $event] );
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
            'nama_peserta' => 'required|not_regex:/`/i',
            'jenis_tiket' => 'required'
        ]);
        if (Auth::check()) { $user = Auth::user()->id; }
        $agen = Agen::select('id')->where('user_id', $user)->first();
        $jt = Jenis_tiket::select('event_id')->where('id', $request->jenis_tiket)->first();
        
        $ketemu = false;
        while ($ketemu == false) {
            $permitted_chars = '0123456789';

            $j = $request->jenis_tiket;
            while ($j > 25){
                $j = ceil($j/2);
            }
            $alphabet = range('A', 'Z');
            $alpha = $alphabet[$j];
            $kode = $alpha."-".substr(str_shuffle($permitted_chars), 0, 3);
            $t = Tiket::select('id')->where('kode_tiket', $kode)->get();
            if ( count($t) ==0 ){
                $ketemu = true;
            }
        }
        
        $request->merge([
            'agen_id' => $agen->id,
            'kode_tiket' => $kode,
        ]);
        //return $request;

        Tiket::create($request->all());
        $pesan = "tiket berhasil ditambahkan";
        
        return redirect('/agen/tiket/event/'.$jt->event_id)->with('status', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show($tiket)
    {

        $tiket = Tiket::select('tikets.*', 'jenis_tikets.nama_tiket', 'events.nama_event', 
                                'jenis_tikets.event_id', 'jenis_tikets.foto_tiket')
                    ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                    ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                    ->where('tikets.id', '=', $tiket)
                    ->first();

        return view( 'agen.tiket.show',['tiket' => $tiket] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        //
    }

    public function event($event)
    {
        if (Auth::check()) { $user = Auth::user()->id; }
        $agen = Agen::select('id')->where('user_id', $user)->first();

        $tiket = Tiket::select('tikets.id','nama_peserta', 'nama_tiket', 'asal', 'tikets.created_at')
                        ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                        ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                        ->where('events.id', '=', $event)
                        ->where('agen_id', '=', $agen->id)
                        ->orderBy('tikets.created_at')->get();
        $event = Event::select('id', 'nama_event')->where('id', '=', $event)->first();
        //return $tiket;
        return view ('agen.tiket.event',['tiket' => $tiket, 'event' => $event]);
    }

    public function cetak($tiket)
    {

        $tiket = Tiket::select('tikets.*', 'jenis_tikets.nama_tiket', 'events.nama_event', 
                                'jenis_tikets.event_id', 'jenis_tikets.foto_tiket'
                                )
                    ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                    ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                    ->where('tikets.id', '=', $tiket)
                    ->first();

        return view( 'agen.tiket.print',['tiket' => $tiket] );
    }
}