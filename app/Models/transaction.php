<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = [
      'id_outlet',
      'kode_invoice',
      'id_member',
      'tgl',
      'batas_waktu',
      'tgl_bayar',
      'biaya_tambahan',
      'diskon',
      'pajak',
      'status',
      'dibayar',
      'id_user',
    ];
    public function outlet(){
        return $this->belongsTo(outlet::class, 'id_outlet');
    }
    public function customers(){
        return $this->belongsTo(Customer::class, 'id_member');
    }
    public function user(){
        return $this->belongsTo(user::class, 'id_user');
    }
}
