{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campify | Login</title>

    {{-- Google Fonts Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body, input, button, label, p, h1, h2, a {
            font-family: 'Poppins', sans-serif;
            margin: 0; padding: 0;
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

        /* Navbar brand (logo + text) */
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

        /* Button Daftar kanan */
        .btn-register {
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
        
        .btn-register:hover {
            background-color: #3B0E81;
            color: white;
            text-decoration: none;
        }

        /* Container for left and right side */
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

        /* Left box (form) */
        .login-box {
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

        /* Heading text */
        .login-heading {
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

        /* Labels */
        label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #521276;
            text-align: left;
            display: block;
            margin-bottom: 0.25rem;
        }

        /* Inputs */
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

        /* Checkbox and Forgot Password container */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            font-weight: 600;
            color: #521276;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
        }

        /* Checkbox */
        .form-check-input {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1.5px solid #aaa;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #521276;
            border-color: #521276;
        }
        .form-check-label {
            cursor: pointer;
            color: #521276;
        }

        /* Lupa kata sandi link */
        .forgot-link {
            color: #521276;
            text-decoration: none;
            font-weight: 600;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Button Masuk */
        .btn-login {
            background-color: #521276;
            color: white;
            font-weight: 700;
            border-radius: 12px;
            padding: 0.6rem 0;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            user-select: none;
        }
        .btn-login:hover {
            background-color: #3B0E81;
        }

        /* Divider Atau */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            font-weight: 600;
            color: #7f7a9e;
            font-size: 0.9rem;
            margin: 1.5rem 0 1rem;
            user-select: none;
        }
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #cfcde0;
        }
        .divider:not(:empty)::before {
            margin-right: 0.5em;
        }
        .divider:not(:empty)::after {
            margin-left: 0.5em;
        }

        /* Google button */
        .btn-google {
            width: 100%;
            border: 1.5px solid #521276;
            border-radius: 12px;
            padding: 0.45rem 0;
            font-weight: 600;
            font-size: 0.9rem;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            color: #521276;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            user-select: none;
        }
        .btn-google img {
            width: 20px;
            height: 20px;
        }
        .btn-google:hover {
            background-color: #ebdefb;
            color: #3B0E81;
            border-color: #3B0E81;
            text-decoration: none;
        }

        /* Right side content */
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
        .right-text {
            max-width: 65%;
        }
        .right-text h2 {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: #521276;
        }
        .right-text p {
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

    {{-- Navbar --}}
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand" aria-label="Campify Home">
            <img src="{{ asset('images/Logo kotak.png') }}" alt="Campify Logo" />
            <div>
                Campify
                <br /><small>Explore Creativity</small>
            </div>
        </a>
        <a href="{{ route('register') }}" class="btn-register">Daftar</a>
    </nav>

    <main class="content" role="main">

        {{-- Left side: login form --}}
        <section class="login-box" aria-labelledby="login-heading">
            <h1 id="login-heading" class="login-heading">
                Hai! Selamat <br /> Datang Kembali
            </h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control"
                        placeholder="excmample@gmail.com" required autofocus value="{{ old('email') }}" />
                </div>

                {{-- Password --}}
                <div class="mb-2">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Insert your Password" required />
                </div>

                {{-- Remember & Forgot Password --}}
                <div class="form-options mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" />
                        <label for="remember" class="form-check-label">Ingat Saya</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                </div>

                {{-- Button Masuk --}}
                <button type="submit" class="btn-login">Masuk</button>

                {{-- Divider --}}
                <div class="divider">Atau</div>

                {{-- Google Sign in --}}
                <dev class="btn-google">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" />
                    Sign In with Google
                </a>
            </form>
        </section>

        {{-- Right side content --}}
        <section class="right-content" aria-label="Brand message">
            <div class="right-text">
                <h2>Where Campus Meets Creativity</h2>
                <p>Jelajahi, jual, dan dukung produk inovatif karya mahasiswa Pradita University</p>
            </div>
            <img src="{{ asset('images/Logo kotak.png') }}" alt="Campify Icon" class="right-icon" />
        </section>

    </main>

    {{-- Bootstrap Bundle (Popper + JS) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>