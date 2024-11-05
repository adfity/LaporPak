<?php

// app/Http/Controllers/MedisController.php
namespace App\Http\Controllers;

use App\Models\Medis;
use Illuminate\Http\Request;

class MedisController extends Controller
{
    // Menampilkan form input
    public function create()
    {
        return view('medis.create');
    }

    // Menyimpan data medis
    public function store(Request $request)
    {
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

        // Redirect setelah sukses
        return redirect()->route('medis.index')->with('success', 'Data medis berhasil disimpan.');
    }

    // Menampilkan semua data medis
    public function index()
    {
        $medis = Medis::all();
        return view('medis.index', compact('medis'));
    }
    public function edit()
    {
        return view('medis.edit');
    }

    // Mengupdate data medis
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Temukan data medis yang akan diupdate
        $medis = Medis::findOrFail($id);

        // Simpan gambar baru jika ada
        $fotoPath = $medis->foto; // Mengambil foto lama
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fotoPath) {
                \Storage::disk('public')->delete($fotoPath);
            }
            $fotoPath = $request->file('foto')->store('medis_foto', 'public');
        }

        // Update data medis
        $medis->update([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal,
            'foto' => $fotoPath,
        ]);

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

