<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // <-- TAMBAHKAN INI
use App\Models\Product; // <-- TAMBAHKAN INI

class Vendor extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'user_id',
        'shop_name',
        'address',
    ];

    // ===================================================================
    // TAMBAHKAN FUNGSI RELASI DI BAWAH INI
    // ===================================================================

    /**
     * Relasi satu-ke-satu (inverse): Vendor ini dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi satu-ke-banyak: Vendor ini memiliki banyak Produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}