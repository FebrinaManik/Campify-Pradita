<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage) dengan semua produk.
     */
    public function index()
    {
        // Ambil semua produk dari database, urutkan dari yang terbaru
        $products = Product::latest()->get();

        // Kirim data 'products' ke view 'welcome'
        return view('welcome', compact('products'));
    }
}