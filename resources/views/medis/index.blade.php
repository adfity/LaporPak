<!-- resources/views/medis/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Medis</title>
    <!-- Import Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Import DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    @include('layouts.head')
</head>
<body class="bg-gray-100">
    @include('layouts.sidebar')

    <div class="main-content" id="mainContent">
        @include('layouts.headbar')
        <h1 class="text-2xl font-bold mb-4">Laporan Medis</h1>

        <!-- Tabs Section -->
        <div class="flex items-center ">
            <a href="javascript:void(0);" id="allTab" class="mr-6 pb-2 text-gray-700 hover:text-black">Semua</a>
            <a href="javascript:void(0);" id="selesaiTab" class="mr-6 pb-2 text-gray-700 hover:text-black">Selesai</a>
            <a href="javascript:void(0);" id="jalanTab" class="mr-6 pb-2 text-gray-700 hover:text-black">Berjalan</a>
            <a href="javascript:void(0);" id="belumTab" class="mr-6 pb-2 text-gray-700 hover:text-black">Belum Mulai</a>
            <div class="ml-auto">
                <a href="{{ route('medis.create') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Tambah Laporan
                </a>
            </div>
        </div>
            <br>
        <!-- Display Table Title -->
        <h3 class="mr-6 pb-2 text-gray-700 hover:text-black">Riwayat Laporan Medis</h3>
            <br>
        <!-- Table All -->
        <div id="all" class="overflow-x-auto">
            <table id="dataTable1" class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Foto Kejadian</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Telepon</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Perihal</th>
                        <th class="px-4 py-2 text-left">Progress</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all as $data)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $data->id }}</td>
                            <td class="px-4 py-2">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Kejadian" class="w-24 h-auto rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $data->nama }}</td>
                            <td class="px-4 py-2">{{ $data->telp }}</td>
                            <td class="px-4 py-2">{{ $data->lokasi }}</td>
                            <td class="px-4 py-2">{{ $data->tanggal }}</td>
                            <td class="px-4 py-2">{{ $data->perihal }}</td>
                            <!-- Progress Column with Conditional Coloring -->
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-white"
                                    style="background-color: {{ $data->progress === 'Belum Dimulai' ? '#29cc97' : ($data->progress === 'Selesai' ? '#fec400' : ($data->progress === 'Berjalan' ? '#82cf5d' : '#cccccc')) }}">
                                    {{ $data->progress }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('medis.update', $data->id) }}" method="POST" style="display: inline;" class="updateForm" data-id="{{ $data->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="confirmUpdate('{{ $data->progress }}', '{{ $data->id }}')" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Table Belum Dimulai -->
        <div id="belum" class="overflow-x-auto" style="display:none;">
            <table id="dataTable1" class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Foto Kejadian</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Telepon</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Perihal</th>
                        <th class="px-4 py-2 text-left">Progress</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($belum as $data)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $data->id }}</td>
                            <td class="px-4 py-2">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Kejadian" class="w-24 h-auto rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $data->nama }}</td>
                            <td class="px-4 py-2">{{ $data->telp }}</td>
                            <td class="px-4 py-2">{{ $data->lokasi }}</td>
                            <td class="px-4 py-2">{{ $data->tanggal }}</td>
                            <td class="px-4 py-2">{{ $data->perihal }}</td>
                            <!-- Progress Column with Conditional Coloring -->
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-white"
                                    style="background-color: {{ $data->progress === 'Belum Dimulai' ? '#29cc97' : ($data->progress === 'Selesai' ? '#fec400' : ($data->progress === 'Berjalan' ? '#82cf5d' : '#cccccc')) }}">
                                    {{ $data->progress }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('medis.update', $data->id) }}" method="POST" style="display: inline;" class="updateForm" data-id="{{ $data->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="confirmUpdate('{{ $data->progress }}', '{{ $data->id }}')" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Table Berjalan -->
        <div id="jalan" class="overflow-x-auto" style="display:none;">
            <table id="dataTable1" class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Foto Kejadian</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Telepon</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Perihal</th>
                        <th class="px-4 py-2 text-left">Progress</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jalan as $data)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $data->id }}</td>
                            <td class="px-4 py-2">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Kejadian" class="w-24 h-auto rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $data->nama }}</td>
                            <td class="px-4 py-2">{{ $data->telp }}</td>
                            <td class="px-4 py-2">{{ $data->lokasi }}</td>
                            <td class="px-4 py-2">{{ $data->tanggal }}</td>
                            <td class="px-4 py-2">{{ $data->perihal }}</td>
                            <!-- Progress Column with Conditional Coloring -->
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-white"
                                    style="background-color: {{ $data->progress === 'Belum Dimulai' ? '#29cc97' : ($data->progress === 'Selesai' ? '#fec400' : ($data->progress === 'Berjalan' ? '#82cf5d' : '#cccccc')) }}">
                                    {{ $data->progress }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('medis.update', $data->id) }}" method="POST" style="display: inline;" class="updateForm" data-id="{{ $data->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="confirmUpdate('{{ $data->progress }}', '{{ $data->id }}')" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Table Selesai -->
        <div id="selesai" class="overflow-x-auto" style="display:none;">
            <table id="dataTable1" class="min-w-full bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200 text-gray-700">
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Foto Kejadian</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Telepon</th>
                        <th class="px-4 py-2 text-left">Lokasi</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Perihal</th>
                        <th class="px-4 py-2 text-left">Progress</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($selesai as $data)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $data->id }}</td>
                            <td class="px-4 py-2">
                                @if ($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Kejadian" class="w-24 h-auto rounded">
                                @else
                                    <span class="text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $data->nama }}</td>
                            <td class="px-4 py-2">{{ $data->telp }}</td>
                            <td class="px-4 py-2">{{ $data->lokasi }}</td>
                            <td class="px-4 py-2">{{ $data->tanggal }}</td>
                            <td class="px-4 py-2">{{ $data->perihal }}</td>
                            <!-- Progress Column with Conditional Coloring -->
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-white"
                                    style="background-color: {{ $data->progress === 'Belum Dimulai' ? '#29cc97' : ($data->progress === 'Selesai' ? '#fec400' : ($data->progress === 'Berjalan' ? '#82cf5d' : '#cccccc')) }}">
                                    {{ $data->progress }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <form action="{{ route('medis.update', $data->id) }}" method="POST" style="display: inline;" class="updateForm" data-id="{{ $data->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="confirmUpdate('{{ $data->progress }}', '{{ $data->id }}')" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>


--Halaman Admin--
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

        .sidebar a:hover,
        .sidebar a.active {
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

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        th,
        td {
            padding: 10px;
            border: none;
        }

        thead tr {
            background-color: #e0e0e0;
            height: 50px;
        }

        tbody tr {
            height: 60px;
        }

        button {
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            margin: 10px 0 20px 0;
        }

        .navbar a {
            padding: 10px 20px;
            font-size: 16px;
            color: #000000;
            text-decoration: none;
            position: relative;
            margin: 0 10px;
        }

        .navbar a.active {
            color: #002e6e;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #002e6e;
        }

        .navbar a::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background-color: #fec400;
            position: absolute;
            left: 0;
            bottom: -5px;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .navbar a:hover::after,
        .navbar a.active::after {
            transform: scaleX(1);
        }

        h4.riwayat-laporan {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Gaya untuk teks Tambahkan Laporan */
        .tambah-laporan {
            font-size: 16px;
            color: #555;
        }

        /* Gaya untuk tombol tambah laporan */
        .riwayat-laporan button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .riwayat-laporan button:hover {
            background-color: #45a049;
        }

        /* Status Button Styles */
        .status-button {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .status-completed {
            background-color: #fec400;
        }

        .status-in-progress {
            background-color: #82cf5d;
        }

        .status-not-started {
            background-color: #29cc97;
        }

        #confirmationModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        #confirmationModal > div {
            background: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
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
            <span>ADMIN</span>
        </div>

        <!-- Laporan Kebakaran -->
        <div id="laporanKebakaran" class="report">
            <h2>Laporan Kebakaran</h2>
            <div class="navbar">
                <a href="#" class="active" onclick="filterReport('all', 'laporanKebakaran', this)">Semua</a>
                <a href="#" onclick="filterReport('completed', 'laporanKebakaran', this)">Selesai</a>
                <a href="#" onclick="filterReport('in-progress', 'laporanKebakaran', this)">Dalam Proses</a>
                <a href="#" onclick="filterReport('not-started', 'laporanKebakaran', this)">Belum Mulai</a>
            </div>

            <h4 class="riwayat-laporan">
                <span class="tambah-laporan">Riwayat Laporan Kebakaran</span>
                <button onclick="tambahLaporan()">Tambah Laporan</button>
            </h4>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelapor</th>
                        <th>Telepon Pelapor</th>
                        <th>Lokasi Kejadian</th>
                        <th>Tanggal Kejadian</th>
                        <th>Isi Laporan</th>
                        <th>Gambar</th>
                        <th>Proses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>081234567890</td>
                        <td>Jl. Kebakaran No. 1</td>
                        <td>01-01-2024</td>
                        <td>Kebakaran di gedung A</td>
                        <td><i class="fas fa-folder"></i></td>
                        <td><span class="status-button status-completed">Selesai</span></td>
                        <td>
                            <button onclick="editLaporan()" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Laporan Medis -->
        <div id="laporanMedis" class="report" style="display:none;">
            <h2>Laporan Medis</h2>
            <div class="navbar">
                <a href="#" class="active" onclick="filterReport('all', 'laporanMedis', this)">Semua</a>
                <a href="#" onclick="filterReport('completed', 'laporanMedis', this)">Selesai</a>
                <a href="#" onclick="filterReport('in-progress', 'laporanMedis', this)">Dalam Proses</a>
                <a href="#" onclick="filterReport('not-started', 'laporanMedis', this)">Belum Mulai</a>
            </div>

            <h4 class="riwayat-laporan">
                <span class="tambah-laporan">Riwayat Laporan Medis</span>
                <button onclick="tambahLaporan()">Tambah Laporan</button>
            </h4>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelapor</th>
                        <th>Telepon Pelapor</th>
                        <th>Lokasi Kejadian</th>
                        <th>Tanggal Kejadian</th>
                        <th>Isi Laporan</th>
                        <th>Gambar</th>
                        <th>Proses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jane Smith</td>
                        <td>081234567891</td>
                        <td>Jl. Kesehatan No. 1</td>
                        <td>01-02-2024</td>
                        <td>Kecelakaan di jalan raya</td>
                        <td><i class="fas fa-folder"></i></td>
                        <td><span class="status-button status-in-progress">Dalam Proses</span></td>
                        <td>
                            <button onclick="editLaporan()" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Laporan Pencurian -->
        <div id="laporanPencurian" class="report" style="display:none;">
            <h2>Laporan Pencurian</h2>
            <div class="navbar">
                <a href="#" class="active" onclick="filterReport('all', 'laporanPencurian', this)">Semua</a>
                <a href="#" onclick="filterReport('completed', 'laporanPencurian', this)">Selesai</a>
                <a href="#" onclick="filterReport('in-progress', 'laporanPencurian', this)">Dalam Proses</a>
                <a href="#" onclick="filterReport('not-started', 'laporanPencurian', this)">Belum Mulai</a>
            </div>

            <h4 class="riwayat-laporan">
                <span class="tambah-laporan">Riwayat Laporan Pencurian</span>
                <button onclick="tambahLaporan()">Tambah Laporan</button>
            </h4>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelapor</th>
                        <th>Telepon Pelapor</th>
                        <th>Lokasi Kejadian</th>
                        <th>Tanggal Kejadian</th>
                        <th>Isi Laporan</th>
                        <th>Gambar</th>
                        <th>Proses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ali Akbar</td>
                        <td>081234567892</td>
                        <td>Jl. Pencurian No. 1</td>
                        <td>01-03-2024</td>
                        <td>Pencurian di toko</td>
                        <td><i class="fas fa-folder"></i></td>
                        <td><span class="status-button status-not-started">Belum Mulai</span></td>
                        <td>
                            <button onclick="editLaporan()" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; padding: 5px 10px;">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

     <!-- Confirmation Modal -->
    <div id="confirmationModal" style="display:none;">
        <div>
            <h3>Konfirmasi Perubahan</h3>
            <p>Apakah laporan diterima dan selesai?</p>
            <button id="confirmButton" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; padding: 5px 10px; margin: 5px;">Konfirmasi</button>
            <button onclick="closeModal()" style="background-color: #f44336; color: white; border: none; border-radius: 5px; padding: 5px 10px; margin: 5px;">Batal</button>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        function showReport(reportId, element) {
            const reports = document.querySelectorAll('.report');
            reports.forEach(report => {
                report.style.display = 'none';
            });
            document.getElementById(reportId).style.display = 'block';

            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => {
                link.classList.remove('active');
            });
            element.classList.add('active');
        }

        function filterReport(status, reportId, element) {
            const rows = document.querySelectorAll(`#${reportId} tbody tr`);
            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(8) span');
                if (status === 'all' || statusCell.classList.contains(`status-${status}`)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            const navLinks = document.querySelectorAll(`#${reportId} .navbar a`);
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            element.classList.add('active');
        }

        function tambahLaporan() {
            alert("Fungsi Tambah Laporan belum diimplementasikan.");
        }

           function editLaporan() {
            const modal = document.getElementById('confirmationModal');
            modal.style.display = 'flex';

            // Handle the confirm button action
            document.getElementById('confirmButton').onclick = function() {
                modal.style.display = 'none'; // Hide modal
                alert("Laporan telah diterima dan selesai."); // Show confirmation alert
                // Here you can also implement additional logic for editing the report
            }
        }

        function closeModal() {
            const modal = document.getElementById('confirmationModal');
            modal.style.display = 'none'; // Hide modal
        }
    </script>
</body>

</html>


