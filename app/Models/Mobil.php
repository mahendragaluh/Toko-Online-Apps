<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['merek_id', 'type', 'price', 'gambar', 'stock'];

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }

    public function like($id)
    {
        $like = Favorite::where('user_id', Auth::user()->id)->where('mobil_id', $id)->first();
        return $like;
    }

    protected $table = 'mobils';
}
