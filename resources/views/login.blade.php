<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EcoPoint+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: white !important; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-recycle text-white text-2xl">🌱</i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">EcoPoint+</h2>
            <p class="text-gray-600">Masuk ke Dashboard</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required 
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="email@contoh.com" value="user@ecopoint.com">
                </div>
                
                <div>
                    <label class="block text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                           placeholder="••••••••" value="password">
                </div>
                
                <button type="submit" 
                        class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition duration-300 mt-6">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Dashboard
                </button>
            </div>
        </form>
        
        <!-- Demo Credentials -->
        <div class="mt-8 p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600 font-semibold mb-2">🔐 Login Demo:</p>
            <p class="text-sm text-gray-600">Email: <span class="font-mono">user@ecopoint.com</span></p>
            <p class="text-sm text-gray-600">Password: <span class="font-mono">password</span></p>
        </div>
        
        <!-- Navigation -->
        <div class="mt-8 pt-6 border-t text-center">
            <a href="/" class="text-green-600 hover:text-green-800">
                <i class="fas fa-home mr-1"></i>Kembali ke Homepage
            </a>
        </div>
    </div>
</body>
</html>