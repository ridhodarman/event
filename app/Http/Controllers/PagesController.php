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
        $event = Event::select('id','nama_event', 'tanggal_mulai', 'deskripsi', 'foto_brosur')->orderBy('tanggal_mulai', 'desc')->get();
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
}
