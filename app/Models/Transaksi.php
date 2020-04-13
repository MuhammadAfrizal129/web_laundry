<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $fillable =
    [
        "id_transaksi",
        "tanggal",
        "member",
        "paket",
        "berat",
        "biaya_tambahan",
        "harga_total",
        "status_pesanan",
        "status_pembayaran",
        "tanggal_bayar"
    ];
    public $primaryKey = "id_transaksi";
    // public function customers(){
    // 	return $this->belongsTo('App\Models\Member','customer','id');
    // }

    public function pakets(){
    	return $this->belongsTo('App\Models\Paket','paket','id_paket');
    }

    public function status_pesanans(){
    	return $this->belongsTo('App\Models\Status_pesanan','status_pesanan','id_status_pesanan');
    }

    public function status_pembayarans(){
    	return $this->belongsTo('App\Models\Status_pembayaran','status_pembayaran','id_status_pembayaran');
    }
}