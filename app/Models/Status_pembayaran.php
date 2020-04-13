<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_pembayaran extends Model
{
    protected $table = 'status_pembayaran';
    public $fillable =
    [
        "id_status_pembayaran",
        "nama_status_pembayaran",
        "urutan",
    ];
    public $primaryKey = "id_status_pembayaran";
}