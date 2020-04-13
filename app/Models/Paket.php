<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = "paket";

    public $fillable =
    [
        "id_paket",
        "id_outlet",
        "jenis",
        "nama_paket",
        "harga",
    ];
    public $primaryKey = "id_paket";
}