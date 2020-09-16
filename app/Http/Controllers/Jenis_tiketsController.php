<?php

namespace App\Http\Controllers;

use App\Jenis_tiket;
use Illuminate\Http\Request;
use File;

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
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000|unique:jenis_tikets,foto_tiket',
            'nama_tiket' => 'required|not_regex:/`/i',
            'harga' => 'integer|nullable'
		]);
        
        $file = $request->file('file');
        
        if ($request->file){

            $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nama_tiket);
            $nama_file = $event."-".$nama2."_".time().".".$file->getClientOriginalExtension();
    
                    // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto/tiket';
            $file->move($tujuan_upload,$nama_file);

            $request->merge([
                'foto_tiket' => $nama_file,
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
        return view ('admin.jenis_tiket.show',['jenis_tiket' => $jenis_tiket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenis_tiket $jenis_tiket)
    {
        return view ('admin.jenis_tiket.edit',['jenis_tiket' => $jenis_tiket]);
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
        //return $jenis_tiket;
        $request->validate([
            'nama_tiket' => 'required|not_regex:/`/i'
        ]);
        Jenis_tiket::where('id', $jenis_tiket->id)
            ->update([
                'nama_tiket' => $request->nama_tiket,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan
            ]);
        $pesan = "Data tiket <b>".$request->nama_tiket.'</b> berhasil diubah';
        return redirect('/jenis_tiket/'.$jenis_tiket->id)->with('status', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jenis_tiket  $jenis_tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_tiket $jenis_tiket)
    {
        //return $jenis_tiket;
        $gambar = Jenis_tiket::where('id', $jenis_tiket->id)->first();
        File::delete('foto/tiket/'.$gambar->foto_tiket);
    
        Jenis_tiket::where('id', $jenis_tiket->id)
        ->update([
            'foto_tiket' => null
        ]);
        
        $jenis_tiket = Jenis_tiket::find($jenis_tiket->id);
        $jenis_tiket->delete();

        $pesan = "Tiket <b>".$jenis_tiket->nama_tiket.'</b> berhasil dihapus';
        return redirect('/event/'.$jenis_tiket->event_id)->with('hapus-tiket', $pesan);
    }

    public function hapus_foto(Jenis_tiket $jenis_tiket)
    {   
        // hapus cover
        $gambar = Jenis_tiket::where('id', $jenis_tiket->id)->first();
        File::delete('foto/tiket/'.$gambar->foto_tiket);
    
        Jenis_tiket::where('id', $jenis_tiket->id)
            ->update([
                'foto_tiket' => null
            ]);
        $pesan = "Foto tiket berhasil dihapus !";
        return redirect('/jenis_tiket/'.$jenis_tiket->id)->with('status-hapus-foto', $pesan);
    }

    public function form_upload_foto(Jenis_tiket $jenis_tiket)
    {
        return view ('admin.jenis_tiket.foto',['jenis_tiket' => $jenis_tiket]);
    }

    public function upload_foto(Request $request, Jenis_tiket $jenis_tiket)
    {
        $gambar = Jenis_tiket::where('id', $jenis_tiket->id)->first();
        if($gambar->cover){
            File::delete('foto/'.$gambar->cover);
        }
        
        $this->validate($request, [
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000|unique:jenis_tikets,foto_tiket,required'
		]);
        $file = $request->file('file');
        $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $jenis_tiket->nama_tiket);
        $nama_file = $jenis_tiket->event_id."-".$nama2."_".time().".".$file->getClientOriginalExtension();
        $tujuan_upload = 'foto/tiket';
        $file->move($tujuan_upload,$nama_file);
        
        Jenis_tiket::where('id', $jenis_tiket->id)
            ->update([
                'foto_tiket' => $nama_file
            ]);
        $pesan = "Foto tiket berhasil di-upload !";
        return redirect('/jenis_tiket/'.$jenis_tiket->id)->with('status-foto', $pesan);
    }
}
