<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agen;
use Auth;
use App\Event;
use App\Tiket;
use App\Faq;
use App\User;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $tgl = date('Y-m-d');
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->where('tanggal_mulai', '>=', $tgl)->orderBy('tanggal_mulai')->get();
        $faq = Faq::select('tanya', 'jawab')->orderBy('urutan')->get();
        return view ('index',['event' => $event, 'faq' => $faq]);
    }
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
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->orderBy('tanggal_mulai', 'desc')->get();
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
    public function show(Event $event)
    {
        //return $event;
        return view ('show',['event' => $event]);
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

    public function profil()
    {
        if (Auth::check()) { $user = Auth::user()->id; }
        $agen = Agen::select('name', 'no_whatsapp')
                    ->join('users', 'users.id', '=', 'agens.user_id')
                    ->where('user_id', $user)->first();
        //return $agen;
        return view ('agen.profil',['agen' => $agen]);
    }

    public function edit_profil(Request $request) {
        if (Auth::check()) { $user = Auth::user()->id; }

        $request->validate([
            'name' => 'required|not_regex:/`/i',
            'no_whatsapp' => 'required|not_regex:/`/i'
        ]);
        User::where('id', $user)->update([ 'name' => $request->name ]);
        Agen::where('user_id', $user)->update([ 'no_whatsapp' => $request->no_whatsapp ]);
        $pesan = "Profile sudah di-update";
        return redirect('profil')->with('status', $pesan);
    }

    public function tiket() {
        $tiket = Tiket::select('tikets.id','nama_peserta', 'nama_tiket', 'events.nama_event', 'tikets.created_at', 'users.name')
                        ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                        ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                        ->join('agens', 'agens.id', '=', 'tikets.agen_id')
                        ->join('users', 'users.id', '=', 'agens.user_id')
                        ->orderBy('tikets.created_at', 'desc')->get();
        //return $tiket;
        return view ('admin.tiket.index',['tiket' => $tiket]);
    }

    public function tiket_info($id) {
        $tiket = Tiket::select('tikets.*', 'nama_tiket', 'nama_event', 'event_id', 'foto_tiket',
                                'name', 'no_whatsapp', 'email'
                        )
                        ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                        ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                        ->join('agens', 'agens.id', '=', 'tikets.agen_id')
                        ->join('users', 'users.id', '=', 'agens.user_id')
                        ->where('tikets.id', $id)->first();
        //return $tiket;
        return view ('admin.tiket.show',['tiket' => $tiket]);
    }

    public function print($kode) {
        $tiket = Tiket::select('tikets.*', 'jenis_tikets.nama_tiket', 'events.nama_event', 
                                'jenis_tikets.event_id', 'jenis_tikets.foto_tiket'
                                )
                    ->join('jenis_tikets', 'jenis_tikets.id', '=', 'tikets.jenis_tiket')
                    ->join('events', 'events.id', '=', 'jenis_tikets.event_id')
                    ->where('tikets.kode_tiket', '=', $kode)
                    ->first();

        if (!$tiket) {
            return "tiket tidak ditemukan";
        }
        
        return view ('agen.tiket.print',['tiket' => $tiket]);
    }

    public function all() {
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->orderBy('tanggal_mulai', 'desc')->get();
        $faq = Faq::select('tanya', 'jawab')->orderBy('urutan')->get();
        return view ('more',['event' => $event, 'faq' => $faq]);
    }
}
