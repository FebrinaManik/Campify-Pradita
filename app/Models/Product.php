<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor; // <-- TAMBAHKAN INI

class Product extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    // ===================================================================
    // TAMBAHKAN FUNGSI RELASI DI BAWAH INI
    // ===================================================================

    /**
     * Relasi satu-ke-banyak (inverse): Produk ini dimiliki oleh satu Vendor.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}