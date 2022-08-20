<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jumlah($id)
    {
        $mobil = Mobil::where('merek_id', $id)->count();
        return $mobil;
    }

    protected $table = 'mereks';
}
