<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan form registrasi.
     */
    public function create()
    {
        return view('auth.register'); // pastikan view register Anda sesuai
    }

    /**
     * Proses registrasi dan simpan data.
     */
    public function store(Request $request)
    {
        // Validasi form input user
        $request->validate([
            'name'      => 'required|string|max:255',
            'birthdate' => 'required|date_format:d-m-Y',
            'phone'     => 'required|string',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8|confirmed', // tambahkan konfirmasi password jika ada
        ]);

        // Convert tanggal lahir dari format input ke format database
        $birthdate = Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d');

        // Simpan user baru ke database
        User::create([
            'name'      => $request->name,
            'birthdate' => $birthdate,
            'phone'     => $validated['phone'],
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // Login otomatis user baru
        Auth::login($user);

        // Redirect ke dashboard
        return redirect()->route('dashboard');

        return view('auth.register', ['phone' => $validated['phone']]);
    }
}