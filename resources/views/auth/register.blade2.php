{{-- resources/views/auth/register-step2.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campify | Register Step 2</title>

    {{-- Google Fonts Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body, input, button, label {
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(180deg, #B0CAFF 0%, #E6F0FF 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-step2-box {
            background: white;
            padding: 2.5rem 3rem;
            border-radius: 24px;
            box-shadow: 0 20px 42px rgba(0, 0, 0, 0.08);
            width: 360px;
            text-align: center;
            user-select: none;
        }

        /* Logo */
        .register-step2-box img {
            height: 60px;
            margin-bottom: 1rem;
        }

        /* Inputs */
        label {
            display: block;
            text-align: left;
            color: #521276;
            font-weight: 600;
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }

        input.form-control {
            border: 1.5px solid #792C7D;
            border-radius: 12px;
            padding: 0.55rem 1rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: #521276;
            outline-offset: 2px;
            width: 100%;
            margin-bottom: 1.2rem;
        }
        input.form-control::placeholder {
            color: #B497CD;
            font-weight: 400;
        }
        input.form-control:focus {
            border-color: #4B1E5A;
            box-shadow: 0 0 0 0.25rem rgba(82, 18, 118, 0.25);
            outline: none;
        }

        /* Button */
        button.btn-submit {
            background-color: #692776;
            border-radius: 24px;
            color: white;
            font-weight: 700;
            border: none;
            cursor: pointer;
            padding: 0.6rem 0;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        button.btn-submit:hover {
            background-color: #4B1E5A;
        }
    </style>
</head>
<body>

    <div class="register-step2-box" role="main" aria-labelledby="register-step2-title">
        <img src="{{ asset('images/Logo kotak.png') }}" alt="Campify Logo" />

        <h1 id="register-step2-title" class="mb-4" style="color:#521276; font-weight:bold;">
            Buat Password
        </h1>

        <form method="POST" action="{{ route('register.step2.post') }}">
            @csrf

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Buat Password kamu" class="form-control" required autocomplete="new-password" />

            <label for="password_confirmation">Verifikasi Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Masukan Password" class="form-control" required autocomplete="new-password" />

            <button type="submit" class="btn-submit">Selanjutnya</button>
        </form>
    </div>

    {{-- Bootstrap Bundle JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>