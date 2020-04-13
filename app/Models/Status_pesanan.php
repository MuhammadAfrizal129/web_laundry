<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_pesanan extends Model
{
    protected $table = 'status_pesanan';
    public $fillable =
    [
        "id_status_pesanan",
        "nama_status_pesanan",
        "urutan",
    ];
    public $primaryKey = "id_status_pesanan";
}