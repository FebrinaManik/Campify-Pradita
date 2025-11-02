<?php

namespace App\Http\Controllers; // <-- Pastikan namespace-nya ini

use App\Models\Product;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{
    /**
     * Tampilkan halaman detail untuk satu produk.
     */
    public function __invoke(Product $product) // <-- INI FUNGSI YANG DICARI
    {
        // Laravel akan otomatis mencari produk berdasarkan ID di URL.
        // Kita tinggal mengirim produk itu ke view.
        return view('product.show', compact('product'));
    }
}