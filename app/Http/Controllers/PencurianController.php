<?php

// app/Http/Controllers/PencurianController.php
namespace App\Http\Controllers;

use App\Models\Pencurian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PencurianController extends Controller
{
    // Menampilkan form input
    public function create()
    {
        $nama = Auth::user()->name;
        return view('pencurian.create', compact('nama'));
    }

    // Menyimpan data pencurian
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
            $fotoPath = $request->file('foto')->store('pencurian_foto', 'public');
        }
    
        // Simpan data ke database
        Pencurian::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'foto' => $fotoPath,
        ]);
    
        // Redirect berdasarkan role
        if (auth()->user()->role == 'User') {
            return redirect()->route('pencurian.indexU')->with('success', 'Data pencurian berhasil disimpan.');
        } elseif (auth()->user()->role == 'Admin') {
            return redirect()->route('pencurian.index')->with('success', 'Data pencurian berhasil disimpan.');
        }
    }
    

    // Menampilkan semua data pencurian
    public function index()
    {
        $all = Pencurian::all();
        $belum = Pencurian::where('progress', 'Belum Dimulai')->get();
        $jalan = Pencurian::where('progress', 'Berjalan')->get();
        $selesai = Pencurian::where('progress', 'Selesai')->get();
        $nama = Auth::user()->name;
        return view('pencurian.index', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }

    public function indexU()
    {
        $namaPemohon = Auth::user()->name;

        $all = Pencurian::where('nama', $namaPemohon)->get();
        $belum = Pencurian::where('progress', 'Belum Dimulai')->where('nama', $namaPemohon)->get();
        $jalan = Pencurian::where('progress', 'Berjalan')->where('nama', $namaPemohon)->get();
        $selesai = Pencurian::where('progress', 'Selesai')->where('nama', $namaPemohon)->get();
        $nama = Auth::user()->name;
        return view('pencurian.indexU', compact('all', 'belum', 'jalan', 'selesai', 'nama'));
    }

    
    public function edit()
    {
        return view('pencurian.edit');
    }

    // Mengupdate data pencurian
    public function update(Request $request, $id)
    {
        // Temukan data medis yang akan diupdate
        $pencurian = Pencurian::findOrFail($id);
    
        // Update nilai progress berdasarkan kondisi
        if ($pencurian->progress === 'Belum Dimulai') {
            $pencurian->progress = 'Berjalan';
        } elseif ($pencurian->progress === 'Berjalan') {
            $pencurian->progress = 'Selesai';
        } elseif ($pencurian->progress === 'Selesai') {
            $pencurian->progress = 'Berjalan';
        }
    
        // Simpan perubahan
        $pencurian->save();
    
        // Redirect setelah sukses
        return redirect()->route('pencurian.index')->with('success', 'Data pencurian berhasil diupdate.');
    }

    // Menghapus data pencurian
    public function delete($id)
    {
        // Temukan data pencurian yang akan dihapus
        $pencurian = Pencurian::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($pencurian->foto) {
            \Storage::disk('public')->delete($pencurian->foto);
        }

        // Hapus data pencurian dari database
        $pencurian->delete();

        // Redirect setelah sukses
        return redirect()->route('pencurian.index')->with('success', 'Data pencurian berhasil dihapus.');
    }
}

