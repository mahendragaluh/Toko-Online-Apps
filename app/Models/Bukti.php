<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'foto', 'nama_bank', 'nama_pengirim'];

    protected $table = 'buktis';
}
