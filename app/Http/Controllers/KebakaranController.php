<?php

// app/Http/Controllers/kebakaranController.php
namespace App\Http\Controllers;

use App\Models\Kebakaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KebakaranController extends Controller
{
    // Menampilkan form input
    public function create()
    {
        $nama = Auth::user()->name;
        return view('kebakaran.create', compact('nama'));
    }

    // Menyimpan data kebakaran
    public function store(Request $request)
    {
        // Cek peran pengguna yang mengakses
        if (auth()->user()->role == 'User') {
            // Isi nama secara otomatis dengan nama pengguna yang sedang masuk
            $request->merge(['nama' => auth()->user()->name]);
        }
    
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
    
        // Simpan gambar jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kebakaran_foto', 'public');
        }
    
        // Simpan data ke database
        Kebakaran::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'foto' => $fotoPath,
        ]);
    
        // Redirect berdasarkan role
        if (auth()->user()->role == 'User') {
            return redirect()->route('kebakaran.indexU')->with('success', 'Data kebakaran berhasil disimpan.');
        } elseif (auth()->user()->role == 'Admin') {
            return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil disimpan.');
        }
    }

    // Menampilkan semua data kebakaran
    public function index()
    {
        $all = Kebakaran::all();
        $belum = Kebakaran::where('progress', 'Belum Dimulai')->get();
        $jalan = Kebakaran::where('progress', 'Berjalan')->get();
        $selesai = Kebakaran::where('progress', 'Selesai')->get();
        $nama = Auth::user()->name;
        return view('kebakaran.index', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }

    public function indexU()
    {
        $namaPemohon = Auth::user()->name;

        $all = Kebakaran::where('nama', $namaPemohon)->get();
        $belum = Kebakaran::where('progress', 'Belum Dimulai')->where('nama', $namaPemohon)->get();
        $jalan = Kebakaran::where('progress', 'Berjalan')->where('nama', $namaPemohon)->get();
        $selesai = Kebakaran::where('progress', 'Selesai')->where('nama', $namaPemohon)->get();
        $nama = Auth::user()->name;
        return view('kebakaran.indexU', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }

    public function edit()
    {
        return view('kebakaran.edit');
    }

    // Mengupdate data kebakaran
    public function update(Request $request, $id)
    {
        // Temukan data kebakaran yang akan diupdate
        $kebakaran = Kebakaran::findOrFail($id);
    
        // Update nilai progress berdasarkan kondisi
        if ($kebakaran->progress === 'Belum Dimulai') {
            $kebakaran->progress = 'Berjalan';
        } elseif ($kebakaran->progress === 'Berjalan') {
            $kebakaran->progress = 'Selesai';
        } elseif ($kebakaran->progress === 'Selesai') {
            $kebakaran->progress = 'Berjalan';
        }
    
        // Simpan perubahan
        $kebakaran->save();
    
        // Redirect setelah sukses
        return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil diupdate.');
    }
    

    // Menghapus data kebakaran
    public function delete($id)
    {
        // Temukan data kebakaran yang akan dihapus
        $kebakaran = Kebakaran::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($kebakaran->foto) {
            \Storage::disk('public')->delete($kebakaran->foto);
        }

        // Hapus data kebakaran dari database
        $kebakaran->delete();

        // Redirect setelah sukses
        return redirect()->route('kebakaran.index')->with('success', 'Data kebakaran berhasil dihapus.');
    }
}

//     <form id="formPembatalan{{ $post->id }}" action="/booking-reject-acc/{{ $post->id }}" method="post" enctype="multipart/form-data">
//         @csrf
//         @method('PUT')
//         <div class="modal fade" id="confirmationModal{{ $post->id }}" tabindex="-1" aria-labelledby="confirmationModalLabel{{ $post->id }}" aria-hidden="true">
//             <div class="modal-dialog">
//                 <div class="modal-content">
//                     <div class="modal-header">
//                         <h5 class="modal-title" id="confirmationModalLabel{{ $post->id }}">Sertakan alasan pembatalan {{ $post->tiket }}</h5>
//                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//                     </div>
//                     <div class="modal-body">
//                         <div class="form-group">
//                             <textarea id="alasan{{ $post->id }}" name="alasan" class="form-control" placeholder="Tolong sertakan alasan" value="{{ $post->alasan }}" required></textarea>
//                         </div>
//                     </div>
//                     <div class="modal-footer">
//                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
//                         <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     </form>

// <script>
// function submitForm(id) {
//     const alasan = document.getElementById('alasan' + id).value;
//     if (alasan === '') {
//         alert('Tolong sertakan alasan');
//         return;
//     } else {
//         document.querySelector('form[action="/booking-reject-acc/' + id + '"]').submit();
//     }
// }
// </script>