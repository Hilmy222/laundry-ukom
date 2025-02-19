<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'outlet_id',
        'jenis',
        'nama_paket',
        'harga'
    ];
    public function Outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
