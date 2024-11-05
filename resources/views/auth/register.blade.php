<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>
</body>
</html>

--register baru--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen font-poppins">
   <div class="bg-white p-8 rounded-lg shadow-lg h-auto">
        <h2 class="text-3xl font-bold mb-2 text-center text-gray-800">Registrasi</h2>
        <p class="mb-6 text-center text-gray-600">Selamat datang! Silakan isi detail Anda untuk mendaftar.</p>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="mb-4 text-red-500 text-sm text-center">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="mb-6 relative">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <div class="flex items-center">
                    <i class="fas fa-user absolute left-3 top-8 text-gray-400"></i>
                    <input type="text" id="username" name="username" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                </div>
            </div>
            <div class="mb-6 relative">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex items-center">
                    <i class="fas fa-envelope absolute left-3 top-8 text-gray-400"></i>
                    <input type="email" id="email" name="email" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                </div>
            </div>
            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="flex items-center">
                    <i class="fas fa-lock absolute left-3 top-8 text-gray-400"></i>
                    <input type="password" id="password" name="password" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                    <i class="fas fa-eye absolute right-3 top-8 cursor-pointer" id="togglePassword"></i>
                </div>
            </div>
            <div class="mb-6 relative">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <div class="flex items-center">
                    <i class="fas fa-lock absolute left-3 top-8 text-gray-400"></i>
                    <input type="password" id="confirm_password" name="confirm_password" required 
                        class="mt-1 h-8 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-10">
                    <i class="fas fa-eye absolute right-3 top-8 cursor-pointer" id="toggleConfirmPassword"></i>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-900 text-white rounded-md py-2 hover:bg-blue-700 transition duration-200">Daftar</button>
        </form>

        <p class="mt-4 text-center text-gray-600">Sudah memiliki akun? <a href="login.php" class="text-blue-600 hover:underline">Login di sini</a>.</p>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('confirm_password');

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    </script>
</body>
</html>
