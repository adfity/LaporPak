<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Memastikan font Poppins digunakan */
        }
    </style>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen font-poppins">
    <div class="bg-white p-8 rounded-lg shadow-lg h-auto">
        <h2 class="text-3xl font-bold mb-2 text-center text-gray-800">Login</h2>
        <p class="mb-6 text-center text-gray-600">Selamat datang! Silakan masukkan detail Anda.</p>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-6 relative">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex items-center">
                    <i class="fas fa-user absolute left-3 top-8 text-gray-400"></i>
                    <input type="text" id="email" name="email" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                </div>
            </div>
            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="flex items-center">
                    <i class="fas fa-lock absolute left-3 top-8 text-gray-400"></i>
                    <input type="password" id="password" name="password" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                </div>
                <a href="#" class="text-gray-500 text-sm hover:underline mt-2 block text-left">Lupa Password?</a>
            </div>
            <button type="submit" class="w-full bg-blue-900 text-white rounded-md py-2 hover:bg-blue-700 transition duration-200">Login</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>.</p>
    </div>
</body>
</html>
