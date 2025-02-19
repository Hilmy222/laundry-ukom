<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    protected $fillable = [
        'nama_outlet',
        'alamat_outlet',
        'telp_outlet'
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }
    public function transaction (){
        return $this->hasMany(transaction::class, 'id_outlet');
    }
}
