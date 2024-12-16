<?php

namespace App\Http\Controllers;

use App\Models\items_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class itemscontroller extends Controller
{
    // Menampilkan semua data (Read - Index)
    public function index()
    {
        $polhut = items_model::all();
        return response()->json(['data' => $polhut], 200);
    }

    // Menampilkan data berdasarkan ID (Read - Show)
    public function show($id)
    {
        $polhut = items_model::find($id);
        if (!$polhut) {
            return response()->json(['message' => 'Data laporan tidak ditemukan'], 404);
        }

        return response()->json(['data' => $polhut], 200);
    }

    // Membuat data baru (Create)
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'nohp' => 'required||max:50',
            'lokasi' => 'required|string|max:50',
            'aktivitas' => 'required|string|max:50',
            'gambar' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('pelaporan', 'public');
        }

        $polhut = items_model::create($validated);

        return response()->json(['message' => 'Data pelaporan berhasil ditambahkan', 'data' => $polhut], 201);
    }

    // Memperbarui data (Update)
    public function update(Request $request, $nip)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string|max:50',
            'foto' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $polhut = items_model::where('nip', $nip)->first();
        if (!$polhut) {
            return response()->json(['message' => 'Data polisi kehutanan tidak ditemukan'], 404);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($polhut->foto && Storage::exists('public/foto-polisi-hutan' . $polhut->foto)) {
                Storage::delete('public/foto-polisi-hutan' . $polhut->foto);
            }

            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('foto-polisi-hutan', 'public');
        }

        $polhut->update($validated);

        return response()->json(['message' => 'Data polisi kehutanan berhasil diperbarui', 'data' => $polhut], 200);
    }


    // Menghapus data (Delete)
    public function delete($id)
    {
        $polhut = items_model::find($id);
        if (!$polhut) {
            return response()->json(['message' => 'Data polisi kehutanan tidak ditemukan'], 404);
        }

        $polhut->delete();

        return response()->json(['message' => 'Data polisi kehutanan berhasil dihapus'], 200);
    }
}