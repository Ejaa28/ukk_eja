<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $timestamps = false;

    protected $fillable = ['nomor_pemesanan', 'nama_pemesanan', 'email_pemesanan', 'tgl_pemesanan', 'tgl_check_in', 'tgl_check_out', 'nama_tamu', 'jumlah_kamar', 'id_tipe_kamar', 'status_pemesanan', 'id_user'];

    public function tipe_kamar(){
        return $this->belongsTo('App\Models\tipe_kamar', 'id_tipe_kamar', 'id_tipe_kamar'); 
    }

    public function user(){
        return $this->belongsTo('App\Models\user', 'id_user', 'id_user'); 
    }
}