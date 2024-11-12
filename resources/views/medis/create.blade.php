<!-- resources/views/medis/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Medis</title> 
    @include('layouts.head')
</head>
<body>  
    @include('layouts.sidebar')

    <div class="main-content" id="mainContent">

        @include('layouts.headbar')
            
            <div class="container">
                <h2>Laporan Medis</h2>
                <form action="{{ route('medis.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @if(auth()->user()->role == 'Admin')
                            <label for="nama">Nama Pelapor</label>
                            <input type="text" id="nama" name="nama" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telepon</label>
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


<<<<<<< HEAD
=======
--Tampilan Pengguna --
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 300px;
            background-color: #002e6e;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%; 
            transition: transform 0.3s ease;
        }

        .sidebar.collapsed {
            transform: translateX(-300px);
        }

        .sidebar h2 {
            text-align: center;
            color: white;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .sidebar a {
            padding: 15px 20px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 5px;
            margin: 5px 15px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #003b8e;
        }

        .sidebar .logout {
            margin-top: auto;
            padding-bottom: 40px;
        }

        .main-content {
            padding: 20px;
            flex-grow: 1;
            background-color: #fff;
            margin-left: 300px;
            height: calc(100vh - 40px); 
            overflow-y: auto; 
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .toggle-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #002e6e;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 25px;
            border-radius: 5px;
            z-index: 10;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 20px;
            font-size: 30px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .container {
            max-width: 1100px;
            padding: 50px;
            padding-top:5px;
        }

        .report {
            display: none;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 300;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f4f4f9;
            color: #999;
            outline: none;
        }

        .form-group input[disabled], .form-group textarea[disabled] {
            color: #999;
        }

        .form-group input:focus, .form-group textarea:focus {
            border-color: #007bff;
            background-color: #fff;
            color: #333;
        }

        .form-group input::placeholder, .form-group textarea::placeholder {
            color: #999;
        }

       .btn-submit {
            display: block; 
            width: 20%;
            margin: 0 auto;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            background-color: #002e6e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }


        .btn-submit:hover {
            background-color: #003b8e;
        }
    </style>
</head>
<body>
    <button class="toggle-button" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar" id="sidebar">
        <h2>Masyarakat</h2>
        <a href="#" onclick="showReport('laporanKebakaran', this)" class="active">
            <i class="fas fa-fire"></i>Laporan Kebakaran
        </a>
        <a href="#" onclick="showReport('laporanMedis', this)">
            <i class="fas fa-medkit"></i>Laporan Medis
        </a>
        <a href="#" onclick="showReport('laporanPencurian', this)">
            <i class="fas fa-user-secret"></i>Laporan Pencurian
        </a>
        <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>Keluar
        </a>
    </div>

    <div class="main-content" id="mainContent">
        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Profile Image">
            <span>vivi</span>
        </div>
        <div id="contentArea">

            <div id="laporanKebakaran" class="report container">
                <h2>Laporan Kebakaran</h2>
                <form action="submit_laporan.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_pelapor">Nama Pelapor</label>
                        <input type="text" id="nama_pelapor" name="nama_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon_pelapor">Telepon Pelapor</label>
                        <input type="tel" id="telepon_pelapor" name="telepon_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" id="lokasi_kejadian" name="lokasi_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea id="isi_laporan" name="isi_laporan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Unggah File</label>
                        <input type="file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn-submit">Simpan</button>
                </form>
            </div>

            <div id="laporanMedis" class="report container">
            <h2>Laporan Medis</h2>
                <form action="submit_laporan.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_pelapor">Nama Pelapor</label>
                        <input type="text" id="nama_pelapor" name="nama_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon_pelapor">Telepon Pelapor</label>
                        <input type="tel" id="telepon_pelapor" name="telepon_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" id="lokasi_kejadian" name="lokasi_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea id="isi_laporan" name="isi_laporan" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Unggah File</label>
                        <input type="file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn-submit">Simpan</button>
                </form>
            </div>

            <div id="laporanPencurian" class="report container">
            <h2>Laporan Pencurian</h2>
              <form action="submit_laporan.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_pelapor">Nama Pelapor</label>
                        <input type="text" id="nama_pelapor" name="nama_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon_pelapor">Telepon Pelapor</label>
                        <input type="tel" id="telepon_pelapor" name="telepon_pelapor" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_kejadian">Lokasi Kejadian</label>
                        <input type="text" id="lokasi_kejadian" name="lokasi_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea id="isi_laporan" name="isi_laporan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Unggah File</label>
                        <input type="file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn-submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
            document.getElementById("mainContent").classList.toggle("expanded");
        }

        function showReport(reportId, element) {
            const reports = document.querySelectorAll('.report');
            reports.forEach(report => report.style.display = 'none');
            document.getElementById(reportId).style.display = 'block';

            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
        }

        document.addEventListener("DOMContentLoaded", function() {
            showReport('laporanKebakaran', document.querySelector('.sidebar a.active'));
        });
    </script>
</body>
</html>

>>>>>>> c0ce3ffdff5d4c2b4b302d68216e9d84d3bbedbf
