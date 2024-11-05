<!DOCTYPE html>
<html>
<head>
    <title>Halaman</title>
</head>
<body>
    <h1>Selamat datang di halaman!</h1>
    <p>Konten ini khusus untuk pengguna cekkk.</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
