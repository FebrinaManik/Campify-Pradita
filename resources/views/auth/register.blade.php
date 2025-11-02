{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campify | Register</title>

    {{-- Google Fonts Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Set font Poppins untuk seluruh halaman */
        body, input, button, label, p, h1, h2, a {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(180deg, #B0CAFF 0%, #E6F0FF 100%);
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        nav.navbar {
            padding: 1.25rem 3rem;
            background: transparent;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo kiri atas */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 1.125rem;
            background: linear-gradient(90deg, #521276 0%, #490D98 51%, #6B43BA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            text-decoration: none;
            user-select: none;
        }

        .navbar-brand img {
            height: 70px !important;
            width: auto;
        }

        .navbar-brand small {
            font-weight: 400;
            font-size: 0.75rem;
            display: block;
            line-height: 1;
            color: #490D98;
            -webkit-text-fill-color: initial;
            background: none;
            user-select: none;
        }

        /* Tombol Login di pojok kanan atas */
        .btn-login-top {
            background-color: #521276;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            user-select: none;
            white-space: nowrap;
        }

        .btn-login-top:hover {
            background-color: #3B0E81;
            color: white;
            text-decoration: none;
        }

        /* Kontainer utama - form + kanan teks */
        main.content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: auto;
            margin: 0 auto 3rem;
            gap: 3rem;
            padding: 0 2rem;
        }

        /* Box form Register, mirip Login */
        .register-box {
            background: white;
            border-radius: 24px;
            padding: 3rem 4rem;
            box-shadow: 0 20px 42px rgba(0, 0, 0, 0.08);
            max-width: 500px; /* LEBAR LEBIH BESAR */
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            user-select: none;
        }

        /* Heading form */
        .register-heading {
            font-weight: 700;
            font-size: 1.375rem;
            background: linear-gradient(90deg, #521276 0%, #490D98 51%, #6B43BA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Label */
        label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #521276;
            text-align: left;
            display: block;
            margin-bottom: 0.25rem;
        }

        /* Input fields */
        input.form-control {
            border: 1.5px solid #521276;
            border-radius: 12px;
            padding: 0.5rem 0.8rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: #521276;
        }
        input.form-control::placeholder {
            color: #a891b3;
            font-weight: 400;
        }
        input.form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(82, 18, 118, 0.2);
            border-color: #521276;
        }

        /* Tombol Selanjutnya */
        button.btn-submit {
            background-color: #692776;
            color: white;
            border-radius: 24px;
            padding: 0.55rem 0;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 1rem;
            user-select: none;
        }
        button.btn-submit:hover {
            background-color: #4b1e5a;
        }

        /* Bagian kanan teks */
        .right-content {
            max-width: auto;
            color: #521276;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            user-select: none;
        }

        .right-content h2 {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #521276;
        }

        .right-text {
            max-width: 65%;
        }

        .right-content p {
            font-weight: 500;
            font-size: 1rem;
            color: #000;
            margin-bottom: 0;
        }

        .right-icon {
            height: 100px !important;
            width: auto;
        }

        /* Responsive */
        @media (max-width: 900px) {
            main.content {
                flex-direction: column;
                gap: 2.5rem;
                align-items: center;
                padding: 1rem;
            }
            .right-content {
                max-width: 100%;
                text-align: center;
                flex-direction: column;
                align-items: center;
            }
            .right-text {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<style>
    /* Style popup verifikasi nomor handphone */
        .verifikasi-popup-background {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.07);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .verifikasi-popup {
            background: white;
            border-radius: 24px;
            padding: 2rem 2.5rem;
            width: 300px;
            box-shadow: 0 10px 30px rgba(102, 41, 145, 0.24);
            text-align: center;
            font-family: 'Poppins', sans-serif;
            color: #521276;
            user-select: none;
        }
        .verifikasi-popup h2 {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .verifikasi-popup p {
            font-weight: 500;
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }
        .otp-codes {
            font-size: 2.25rem;
            letter-spacing: 28px;
            font-weight: 900;
            margin-bottom: 1.1rem;
            color: #692776;
            user-select: text; /* Supaya kode bisa di-copy jika diperlukan */
        }
        .small-text {
            font-size: 0.75rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: #521276;
        }

        button.btn-verifikasi {
            background-color: #692776;
            color: white;
            font-weight: 700;
            border-radius: 24px;
            padding: 0.5rem 1.8rem;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        button.btn-verifikasi:hover {
            background-color: #4b1e5a;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand" aria-label="Campify Home">
            <img src="{{ asset('images/Logo kotak.png') }}" alt="Campify Logo" />
            <div>
                Campify<br/>
                <small>Explore Creativity</small>
            </div>
        </a>
        <a href="{{ route('login') }}" class="btn-login-top">Login</a>
    </nav>

    <main class="content" role="main">
        {{-- Form Registrasi --}}
        <section class="register-box" aria-labelledby="register-heading">
            <h1 id="register-heading" class="register-heading">Mari Bergabung</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="mb-3">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Namamu" required autofocus />
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-3">
                    <label for="birthdate">Tanggal Lahir</label>
                    <input id="birthdate" name="birthdate" type="text" class="form-control" placeholder="DD-MM-YYYY" required />
                </div>

                {{-- No. Handphone --}}
                <div class="mb-3">
                    <label for="phone">No. Handphone</label>
                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="Masukan No. Handphone" required />
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="excmample@gmail.com" required />
                </div>

                {{-- Tombol Selanjutnya --}}
                <button type="submit" class="btn-submit">Selanjutnya</button>
            </form>
        </section>

        {{-- Bagian kanan teks dengan logo --}}
        <section class="right-content" aria-label="Brand message">
            <div class="right-text">
                <h2>Where Campus Meets Creativity</h2>
                <p>Jelajahi, jual, dan dukung produk inovatif karya mahasiswa Pradita University</p>
            </div>
            <img src="{{ asset('images/Logo kotak.png') }}" alt="Campify Icon" class="right-icon" />
        </section>
    </main>

    @if(!empty($phone))
    <div class="verifikasi-popup-background" role="dialog" aria-modal="true" aria-labelledby="verif-title" tabindex="-1">
        <div class="verifikasi-popup">
            <h2 id="verif-title">Verifikasi Nomor Handphone</h2>
            <p>Kode OTP telah terkirim ke No. Handphone<br/><strong>{{ maskPhoneNumber($phone) }}</strong></p>
            <div class="otp-codes">- - - - - -</div>
            <p class="small-text">Pesan belum masuk?</p>
            <button type="submit" class="btn-verifikasi" onclick="closePopup()">Selanjutnya</button>
        </div>
    </div>

    <script>
        function closePopup() {
            const popupBg = document.querySelector('.verifikasi-popup-background');
            if (popupBg) {
                popupBg.style.display = 'none';
            }
        }
        
        // Optional: close popup dengan ESC key
        document.addEventListener('keydown', function(e){
            if(e.key === "Escape"){
                closePopup();
            }
        });
    </script>
    @endif

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>