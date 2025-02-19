<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers_table';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp'
    ];
    public function transaction(){
        return $this->hasMany(transaction::class, 'id_member');
    }
}
