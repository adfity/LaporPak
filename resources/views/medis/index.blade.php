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



