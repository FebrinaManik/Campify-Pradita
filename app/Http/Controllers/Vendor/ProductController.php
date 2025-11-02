<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- PENTING untuk upload

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk milik vendor. (Vendor Dashboard)
     */
    public function index()
    {
        // 1. Dapatkan vendor yang sedang login
        $vendor = Auth::user()->vendor;

        // 2. Ambil semua produk yang 'vendor_id'-nya sama dengan id vendor ini
        $products = Product::where('vendor_id', $vendor->id)->latest()->get();
        
        // 3. Kirim data produk ke view
        return view('vendor.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk menambah produk baru.
     */
    public function create()
    {
        // Cukup tampilkan view-nya
        return view('vendor.products.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input Data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
        ]);

        // 2. Dapatkan Vendor yang sedang login
        $vendor = Auth::user()->vendor;
        $imagePath = null;

        // 3. Handle Upload Gambar (Jika ada)
        if ($request->hasFile('image')) {
            // Simpan gambar di folder 'public/products'
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 4. Simpan data ke database
        Product::create([
            'vendor_id' => $vendor->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath, // Simpan path gambar (atau null jika tidak ada)
        ]);

        // 5. Redirect kembali ke dashboard vendor dengan pesan sukses
        return redirect()->route('vendor.dashboard')
                         ->with('status', 'Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // (Belum kita gunakan)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // (Belum kita gunakan)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // (Belum kita gunakan)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // (Belum kita gunakan)
    }
}