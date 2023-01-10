<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $hidden = ['pivot'];
    protected $fillable  = ['nama_mapel','kode_mapel'];
    public $timestamps = false;

       public function guru()
    {
        return $this->belongsToMany(Guru::class,'guru_mapel','id_mapel','id_guru')->withPivot('kode_guru');
    }
}
