<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::select('id','nama_event', 'tanggal_mulai')->orderBy('nama_event')
                            ->get();
        //return $jenis;
        return view ('admin.event.index',['event' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.tambah');
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
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000|unique:events,foto_brosur',
            'nama_event' => 'required|not_regex:/`/i',
            'tanggal_mulai' => 'date|nullable'
		]);
        
        $file = $request->file('file');
        
        if ($request->file){

            $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nama);
            $nama_file = $nama2."_".time().".".$file->getClientOriginalExtension();
    
                    // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto/brosur';
            $file->move($tujuan_upload,$nama_file);

            $request->merge([
                'foto_brosur' => $nama_file,
            ]);
        }

        Event::create($request->all());
        $pesan = "<b>".$request->nama_event.'</b> berhasil ditambahkan';
        return redirect('/event')->with('status', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //return $event;
        return view ('admin.event.show', compact('event') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
