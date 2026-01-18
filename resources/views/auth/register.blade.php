<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Ecopoint++</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
         min-height: 100vh;
         display: flex;
         justify-content: center;
         align-items: center;
         padding: 20px;
      }

      .container {
         display: flex;
         background: white;
         border-radius: 20px;
         box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
         overflow: hidden;
         max-width: 1000px;
         width: 100%;
      }

      .left-section {
         flex: 1;
         background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
         padding: 60px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         color: white;
         text-align: center;
      }

      .logo {
         font-size: 36px;
         font-weight: bold;
         margin-bottom: 30px;
      }

      .illustration {
         width: 100%;
         max-width: 300px;
         margin: 20px 0;
      }

      .illustration svg {
         width: 100%;
         height: auto;
      }

      .tagline {
         font-size: 18px;
         margin-top: 20px;
         opacity: 0.9;
      }

      .right-section {
         flex: 1;
         padding: 60px;
         display: flex;
         flex-direction: column;
         justify-content: center;
      }

      .form-title {
         font-size: 32px;
         font-weight: bold;
         color: #2e7d32;
         margin-bottom: 10px;
      }

      .form-subtitle {
         color: #666;
         margin-bottom: 30px;
         font-size: 14px;
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-group label {
         display: block;
         margin-bottom: 8px;
         color: #333;
         font-weight: 500;
         font-size: 14px;
      }

      .form-group input {
         width: 100%;
         padding: 12px 15px;
         border: 2px solid #e0e0e0;
         border-radius: 8px;
         font-size: 14px;
         transition: all 0.3s;
      }

      .form-group input:focus {
         outline: none;
         border-color: #66bb6a;
         box-shadow: 0 0 0 3px rgba(102, 187, 106, 0.1);
      }

      .form-group input.error {
         border-color: #ef5350;
      }

      .password-wrapper {
         position: relative;
      }

      .toggle-password {
         position: absolute;
         right: 15px;
         top: 50%;
         transform: translateY(-50%);
         cursor: pointer;
         color: #999;
         font-size: 18px;
         user-select: none;
      }

      .remember-forgot {
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 25px;
         font-size: 14px;
      }

      .remember-me {
         display: flex;
         align-items: center;
         gap: 8px;
      }

      .remember-me input[type="checkbox"] {
         width: 18px;
         height: 18px;
         cursor: pointer;
      }

      .forgot-password {
         color: #43a047;
         text-decoration: none;
         font-weight: 500;
      }

      .forgot-password:hover {
         text-decoration: underline;
      }

      .btn-login {
         width: 100%;
         padding: 14px;
         background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
         color: white;
         border: none;
         border-radius: 8px;
         font-size: 16px;
         font-weight: 600;
         cursor: pointer;
         transition: all 0.3s;
      }

      .btn-login:hover:not(:disabled) {
         transform: translateY(-2px);
         box-shadow: 0 5px 15px rgba(67, 160, 71, 0.3);
      }

      .btn-login:active {
         transform: translateY(0);
      }

      .btn-login:disabled {
         opacity: 0.6;
         cursor: not-allowed;
      }

      .register-link {
         text-align: center;
         margin-top: 20px;
         color: #666;
         font-size: 14px;
      }

      .register-link a {
         color: #43a047;
         text-decoration: none;
         font-weight: 600;
      }

      .register-link a:hover {
         text-decoration: underline;
      }

      .error-message {
         background: #ffebee;
         color: #c62828;
         padding: 12px;
         border-radius: 8px;
         margin-bottom: 20px;
         font-size: 14px;
         display: none;
         border-left: 4px solid #c62828;
      }

      .success-message {
         background: #e8f5e9;
         color: #2e7d32;
         padding: 12px;
         border-radius: 8px;
         margin-bottom: 20px;
         font-size: 14px;
         display: none;
         border-left: 4px solid #2e7d32;
      }

      .field-error {
         color: #c62828;
         font-size: 12px;
         margin-top: 5px;
         display: none;
      }

      .loading {
         display: none;
         text-align: center;
         margin-top: 10px;
      }

      .spinner {
         border: 3px solid #f3f3f3;
         border-top: 3px solid #43a047;
         border-radius: 50%;
         width: 30px;
         height: 30px;
         animation: spin 1s linear infinite;
         margin: 0 auto;
      }

      @keyframes spin {
         0% {
            transform: rotate(0deg);
         }

         100% {
            transform: rotate(360deg);
         }
      }

      @media (max-width: 768px) {
         .container {
            flex-direction: column;
         }

         .left-section {
            padding: 40px 20px;
         }

         .right-section {
            padding: 40px 20px;
         }

         .logo {
            font-size: 28px;
         }

         .form-title {
            font-size: 24px;
         }
      }
   </style>
</head>
<body>

<div class="container">

    <!-- LEFT -->
    <div class="left-section">
        <div class="logo">Ecopoint++</div>
        <div class="tagline">Daftar dan mulai selamatkan bumi 🌱</div>
    </div>

    <!-- RIGHT -->
    <div class="right-section">
        <h1 class="form-title">REGISTER</h1>
        <p class="form-subtitle">Buat akun baru</p>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="error-message" style="display:block">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="{{ old('alamat') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button class="btn-login" type="submit">
                Register
            </button>
        </form>

        <div class="register-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>

</body>
</html>
