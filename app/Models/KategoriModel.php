<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $guarded = 'id_kategori';

    public function Buku(){
        return $this->hasMany(BukuModel::class, 'id_kategori', 'id_kategori');
    }
}
