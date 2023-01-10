<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    protected $hidden = ['pivot'];

      public function mapel()
    {
        return $this->belongsToMany(Mapel::class,'guru_mapel','id_mapel','id_guru');
    }

}
