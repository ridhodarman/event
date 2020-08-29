<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis_tiket extends Model
{
    protected $fillable = ['nama_tiket', 'harga','keterangan', 'foto_tiket', 'event_id' ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
