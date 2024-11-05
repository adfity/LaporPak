<?php

// app/Http/Controllers/MedisController.php
namespace App\Http\Controllers;

use App\Models\Medis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedisController extends Controller
{
    // Menampilkan form input
    public function create()
    {
        $nama = Auth::user()->name;
        return view('medis.create', compact('nama'));
    }

    // Menyimpan data medis
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
            $fotoPath = $request->file('foto')->store('medis_foto', 'public');
        }
    
        // Simpan data ke database
        Medis::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'foto' => $fotoPath,
        ]);
    
        // Redirect berdasarkan role
        if (auth()->user()->role == 'User') {
            return redirect()->route('medis.indexU')->with('success', 'Data medis berhasil disimpan.');
        } elseif (auth()->user()->role == 'Admin') {
            return redirect()->route('medis.index')->with('success', 'Data medis berhasil disimpan.');
        }
    }
    

    // Menampilkan semua data medis
    public function index()
    {
        $all = Medis::all();
        $belum = Medis::where('progress', 'Belum Dimulai')->get();
        $jalan = Medis::where('progress', 'Berjalan')->get();
        $selesai = Medis::where('progress', 'Selesai')->get();
        $nama = Auth::user()->name;
        return view('medis.index', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }

    public function indexU()
    {
        $namaPemohon = Auth::user()->name;

        $all = Medis::where('nama', $namaPemohon)->get();
        $belum = Medis::where('progress', 'Belum Dimulai')->where('nama', $namaPemohon)->get();
        $jalan = Medis::where('progress', 'Berjalan')->where('nama', $namaPemohon)->get();
        $selesai = Medis::where('progress', 'Selesai')->where('nama', $namaPemohon)->get();
        $nama = Auth::user()->name;
        return view('medis.indexU', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }
    public function edit()
    {
        return view('medis.edit');
    }

    // Mengupdate data medis
    public function update(Request $request, $id)
    {
        // Temukan data medis yang akan diupdate
        $medis = Medis::findOrFail($id);
    
        // Update nilai progress berdasarkan kondisi
        if ($medis->progress === 'Belum Dimulai') {
            $medis->progress = 'Berjalan';
        } elseif ($medis->progress === 'Berjalan') {
            $medis->progress = 'Selesai';
        } elseif ($medis->progress === 'Selesai') {
            $medis->progress = 'Berjalan';
        }
    
        // Simpan perubahan
        $medis->save();
    
        // Redirect setelah sukses
        return redirect()->route('medis.index')->with('success', 'Data medis berhasil diupdate.');
    }

    // Menghapus data medis
    public function delete($id)
    {
        // Temukan data medis yang akan dihapus
        $medis = Medis::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($medis->foto) {
            \Storage::disk('public')->delete($medis->foto);
        }

        // Hapus data medis dari database
        $medis->delete();

        // Redirect setelah sukses
        return redirect()->route('medis.index')->with('success', 'Data medis berhasil dihapus.');
    }
}

