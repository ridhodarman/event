<?php

namespace App\Http\Controllers;

use App\Jenis_tiket;
use Illuminate\Http\Request;

class Jenis_tiketsController extends Controller
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
        return view( 'admin.jenis_tiket.tambah',['event' => $event] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event)
    {
        $this->validate($request, [
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000|unique:jenis_tikets,foto_tiket',
            'nama_tiket' => 'required|not_regex:/`/i',
            'harga' => 'integer|nullable'
		]);
        
        $file = $request->file('file');
        
        if ($request->file){

            $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nama_tiket);
            $nama_file = $nama2."_".time().".".$file->getClientOriginalExtension();
    
                    // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto/tiket';
            $file->move($tujuan_upload,$nama_file);

            $request->merge([
                'foto_tiket' => $event.$nama_file,
                'event_id' => $event,
            ]);
        }

        Jenis_tiket::create($request->all());
        $pesan = $request->nama_tiket.' berhasil ditambahkan';
        return redirect('/event/'.$event)->with('status', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis_tiket $jenis_tiket)
    {
        return $jenis_tiket;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis_tiket $jenis_tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_tiket $jenis_tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_tiket $jenis_tiket)
    {
        //
    }
}
