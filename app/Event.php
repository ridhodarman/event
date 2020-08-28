<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['nama_event', 'deskripsi', 'foto_brosur', 'tanggal_mulai' ];
}
