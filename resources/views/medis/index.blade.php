<!-- resources/views/medis/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Medis</title>
</head>
<body>
    <h1>Daftar Data Medis</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('medis.create') }}">Input Data Medis Baru</a>

    <table border="1">
        <thead>
            <tr>
                <th>Foto Kejadian</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Perihal</th>
                <th>Progress</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medis as $data)
                <tr>
                    <td>
                        @if ($data->foto)
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Kejadian" width="100">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->telp }}</td>
                    <td>{{ $data->lokasi }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->perihal }}</td>
                    <td>{{ $data->progress }}</td>
                    <td>
                        <!-- Tombol untuk aksi (misalnya, edit) -->
                        <a href="{{ route('medis.edit', $data->id) }}" style="color: green;">✏️</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
