<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor; // <-- Import Model Vendor
use Illuminate\Support\Facades\Auth; // <-- Import helper Auth
use Illuminate\Validation\Rule; // <-- Import helper Rule

class VendorRegistrationController extends Controller
{
    /**
     * Menampilkan form pendaftaran vendor.
     */
    public function create()
    {
        // Cek dulu, jika user SUDAH jadi vendor, lempar ke dashboard vendor
        if (Auth::user()->is_vendor) {
            // (Kita akan buat rute 'vendor.dashboard' di langkah selanjutnya)
            // Untuk sementara, kita redirect ke dashboard biasa dulu
            return redirect('/dashboard')->with('status', 'Anda sudah menjadi Vendor.');
        }

        // Jika belum, tampilkan view form pendaftaran
        return view('vendor.register');
    }

    /**
     * Menyimpan data pendaftaran vendor.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi Input
        $request->validate([
            // 'shop_name' harus unik di tabel 'vendors'
            'shop_name' => ['required', 'string', 'max:255', Rule::unique(Vendor::class)],
            'address' => 'required|string|max:500',
        ]);

        // 2. Buat data baru di tabel 'vendors'
        Vendor::create([
            'user_id' => $user->id,
            'shop_name' => $request->shop_name,
            'address' => $request->address,
        ]);

        // 3. Update status user menjadi vendor
        $user->is_vendor = true;
        $user->save();

        // 4. Redirect ke dashboard vendor
        return redirect()->route('vendor.dashboard')->with('status', 'Selamat! Toko Anda berhasil dibuat.');
    }
}