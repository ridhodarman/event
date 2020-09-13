<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiket extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_peserta', 'asal','jenis_tiket', 'keterangan', 'kode_tiket', 'agen_id', 'no_wa', 'e_mail' ];
}
