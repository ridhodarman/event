<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_tiket extends Model
{
    protected $fillable = ['nama_tiket', 'harga','keterangan', 'foto_tiket', 'event_id' ];
}
