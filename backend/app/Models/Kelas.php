<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $hidden = ['id_jurusan'];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
}
