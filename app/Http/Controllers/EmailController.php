<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Tiket;

class EmailController extends Controller
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
                'tiket' => $request->tiket
            ], 
                function ($message) use ($request)
            {
                $message->subject('Tiket Peserta "'.$request->event.'"');
                $message->from('event@qosin.id', 'QOSin Event');
                $message->to($request->email);
            });

            $tiket = Tiket::select('keterangan')
                    ->where('tikets.kode_tiket', '=', $request->kode)
                    ->first();

            $timezone = new \DateTimeZone('Asia/Jakarta');
            $date = new \DateTime();
            $date->setTimeZone($timezone);
            $current_date = date('d-m-Y');

            $keterangan = $tiket->keterangan.'.
                        Tiket telah dikirim ke '.$request->email." pada tanggal ".$current_date;

            Tiket::where('kode_tiket', $request->kode)->update([
                'keterangan' => $keterangan
            ]);
            
            return back()->with('status','Berhasil Kirim Email');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
