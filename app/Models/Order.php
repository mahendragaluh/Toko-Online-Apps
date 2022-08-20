<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['user_id', 'mobil_id', 'quantity', 'total', 'payment_status'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function namaMobil($id)
    {
        $mobil = Mobil::findorfail($id);
        $namaMobil = $mobil->merek->name . ' ' . $mobil->type;
        return $namaMobil;
    }

    public function bukti($id)
    {
        $bukti = Bukti::where('order_id', $id)->first();
        return $bukti;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'orders';
}
