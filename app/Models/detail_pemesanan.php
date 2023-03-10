<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pemesanan extends Model
{
    protected $table = 'detail_pemesanan';
    public $timestamps = false;
    public $primaryKey = 'id_detail_pemesanan';
    protected $fillable = ['id_pemesanan', 'id_kamar','tgl_akses','harga'];

    public function pemesanan() {
        return $this->belongsTo('App\Models\pemesanan','id_pemesanan','id_pemesanan');
    }

    public function kamar() {
        return $this->belongsTo('App\Models\kamar','id_kamar','id_kamar');
    }
    use HasFactory;
}