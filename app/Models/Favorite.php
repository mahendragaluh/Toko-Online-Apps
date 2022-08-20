<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mobil_id'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    protected $table = 'favorites';
}
