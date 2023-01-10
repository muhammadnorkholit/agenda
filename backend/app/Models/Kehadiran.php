<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agenda;
use App\Models\Siswa;

class Kehadiran extends Model
{
    use HasFactory;
    protected $table = 'kehadiran';

    protected $hidden = ['id_siswa','id_agenda'];

       public function agenda()
    {
        return $this->belongsTo(Agenda::class,'id_agenda');
    }

       public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

}
