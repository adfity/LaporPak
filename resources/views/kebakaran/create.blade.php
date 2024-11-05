<!-- resources/views/medis/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kebakaran</title> 
    @include('layouts.head')
</head>
<body>  
    @include('layouts.sidebar')

    <div class="main-content" id="mainContent">

        @include('layouts.headbar')
            
            <div class="container">
                <h2>Laporan Kebakaran</h2>
                <form action="{{ route('kebakaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @if(auth()->user()->role == 'Admin')
                            <label for="nama">Nama Pelapor</label>
                            <input type="text" id="nama" name="nama" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="telp"> Nomor Telpon</label>
                        <input type="tel" id="telp" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi Kejadian</label>
                        <input type="text" id="lokasi" name="lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Kejadian</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Laporan</label>
                        <textarea id="perihal" name="perihal" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Unggah File</label>
                        <input type="file" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn-submit">Simpan</button>
                </form>
            </div>
            
    </div>
</body>
</html>


