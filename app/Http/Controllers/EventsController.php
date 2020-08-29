<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Jenis_tiket;
use File;

class EventsController extends Controller
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::select('id','nama_event', 'tanggal_mulai')->orderBy('tanggal_mulai', 'DESC')->get();
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

            $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nama_event);
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
        $jenis_tiket = Jenis_tiket::select('id','nama_tiket')->where('event_id', '=', $event->id)->orderBy('nama_tiket')->get();
        return view ('admin.event.show',['event' => $event, 'jenis_tiket' => $jenis_tiket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view ('admin.event.edit',['event' => $event]);
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
        $request->validate([
            'nama_event' => 'required|not_regex:/`/i'
        ]);
        Event::where('id', $event->id)
            ->update([
                'nama_event' => $request->nama_event,
                'tanggal_mulai' => $request->tanggal_mulai,
                'deskripsi' => $request->deskripsi
            ]);
        $pesan = "Data event ".$request->nama_event.' berhasil diubah';
        return redirect('/event/'.$event->id)->with('status', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $gambar = Event::where('id', $event->id)->first();
        File::delete('foto/brosur/'.$gambar->foto_brosur);
    
        Event::where('id', $event->id)
        ->update([
            'foto_brosur' => null
        ]);
        
        $event = Event::find($event->id);
        $event->delete();

        $pesan = "Event <b>".$event->nama_event.'</b> berhasil dihapus';
        return redirect('/event/')->with('hapus', $pesan);
    }

    public function hapus_foto(Event $event)
    {   
        // hapus cover
        $gambar = Event::where('id', $event->id)->first();
        File::delete('foto/brosur/'.$gambar->foto_brosur);
    
        Event::where('id', $event->id)
            ->update([
                'foto_brosur' => null
            ]);
        $pesan = "Foto brosur berhasil dihapus !";
        return redirect('/event/'.$event->id)->with('status-hapus-foto', $pesan);
    }

    public function form_upload_foto(Event $event)
    {
        return view ('admin.event.foto',['event' => $event]);
    }

    public function upload_foto(Request $request, Event $event)
    {
        $gambar = Event::where('id', $event->id)->first();
        if($gambar->cover){
            File::delete('foto/'.$gambar->cover);
        }
        
        $this->validate($request, [
			'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4000|unique:events,foto_brosur,required'
		]);
        $file = $request->file('file');
        $nama2 = preg_replace('/[^A-Za-z0-9\-]/', '', $request->nama_tiket);
        $nama_file = $nama2."_".time().".".$file->getClientOriginalExtension();
        $tujuan_upload = 'foto/brosur';
        $file->move($tujuan_upload,$nama_file);
        
        Event::where('id', $event->id)
            ->update([
                'foto_brosur' => $nama_file
            ]);
        $pesan = "Foto tiket berhasil di-upload !";
        return redirect('/event/'.$event->id)->with('status-foto', $pesan);
    }
}
