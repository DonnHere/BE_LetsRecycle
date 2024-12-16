<?php

namespace App\Http\Controllers;

use App\Models\pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pelaporancontroller extends Controller
{
    // Menampilkan semua data pelaporan (Read - Index)
    public function index()
    {
        $pelaporan = Pelaporan::all();
        return response()->json(['data' => $pelaporan], 200);
    }

    // Menampilkan data pelaporan berdasarkan ID (Read - Show)
    public function show($id)
    {
        $pelaporan = pelaporan::find($id);
        if (!$pelaporan) {
            return response()->json(['message' => 'Data pelaporan tidak ditemukan'], 404);
        }

        return response()->json(['data' => $pelaporan], 200);
    }

    // Membuat laporan baru (Create - Store)
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'tanggal_kejadian' => 'required|date',
            'deskripsi' => 'required|string',
            'file_path' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'in:Terkirim,Diterima,Proses Penanganan,Selesai',
        ]);

        // Upload file jika ada
        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')->store('pelaporan_files', 'public');
        }

        $pelaporan = Pelaporan::create($validated);

        return response()->json(['message' => 'Laporan berhasil dibuat', 'data' => $pelaporan], 201);
    }

    // Memperbarui laporan berdasarkan ID (Update)
    public function update(Request $request, $id)
    {
        $pelaporan = Pelaporan::find($id);
        if (!$pelaporan) {
            return response()->json(['message' => 'Data pelaporan tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'nomor_telepon' => 'sometimes|string|max:15',
            'provinsi' => 'sometimes|string|max:255',
            'kabupaten' => 'sometimes|string|max:255',
            'kecamatan' => 'sometimes|string|max:255',
            'kelurahan' => 'sometimes|string|max:255',
            'tanggal_kejadian' => 'sometimes|date',
            'deskripsi' => 'sometimes|string',
            'file_path' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'in:Panding,Proses,Selesai',
        ]);

        // Jika ada file baru, hapus file lama dan upload file baru
        if ($request->hasFile('file_path')) {
            if ($pelaporan->file_path && Storage::exists('public/' . $pelaporan->file_path)) {
                Storage::delete('public/' . $pelaporan->file_path);
            }
            $validated['file_path'] = $request->file('file_path')->store('pelaporan_files', 'public');
        }

        $pelaporan->update($validated);

        return response()->json(['message' => 'Laporan berhasil diperbarui', 'data' => $pelaporan], 200);
    }

    // Menghapus laporan berdasarkan ID (Delete)
    public function delete($id)
    {
        $pelaporan = Pelaporan::find($id);
        if (!$pelaporan) {
            return response()->json(['message' => 'Data pelaporan tidak ditemukan'], 404);
        }

        // Hapus file jika ada
        if ($pelaporan->file_path && Storage::exists('public/' . $pelaporan->file_path)) {
            Storage::delete('public/' . $pelaporan->file_path);
        }

        $pelaporan->delete();

        return response()->json(['message' => 'Laporan berhasil dihapus'], 200);
    }
}