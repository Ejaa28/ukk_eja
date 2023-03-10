<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeModel extends Model
{
    protected $table = 'model_room';
    public $timestamps = false;
    protected $primaryKey = 'model_room_id';
    protected $fillable = ['model_room_name', 'price', 'description', 'image'];
    
    use HasFactory;
}