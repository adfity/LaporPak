<!-- resources/views/medis/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Input Data Medis</title>
</head>
<body>
    <h1>Input Data Medis</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('medis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="telp">Telepon:</label><br>
        <input type="text" id="telp" name="telp" required><br><br>

        <label for="lokasi">Lokasi:</label><br>
        <input type="text" id="lokasi" name="lokasi" required><br><br>

        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <label for="perihal">Isi Laporan:</label><br>
        <textarea id="perihal" name="perihal" required></textarea><br><br>

        <label for="foto">Foto Kejadian:</label><br>
        <input type="file" id="foto" name="foto"><br><br>

        <button type="submit">Simpan Data</button>
    </form>

    <a href="{{ route('medis.index') }}">Kembali ke Daftar Medis</a>
</body>
</html>
