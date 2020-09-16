<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Email extends Controller
{
    public function sendTiket(Request $request)
    {
        try{
            Mail::send('agen.tiket.email', 
            [
                'nama' => $request->nama, 
                'link' => $request->link,
                'event' => $request->event,
                'kode' => $request->kode,
                'kode' => $request->tiket
            ], 
                function ($message) use ($request)
            {
                $message->subject('Tiket Peserta "'.$request->event.'"');
                $message->from('event@qosin.id', 'QOSin Event');
                $message->to($request->email);
            });
            return back()->with('alert-success','Berhasil Kirim Email');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
