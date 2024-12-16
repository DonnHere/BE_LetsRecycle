<?php
namespace App\Http\Controllers;

use App\Models\laporan_model;
use Illuminate\Http\Request;
class laporan_controller extends Controller
{

    public function index()
    {
        // Ambil semua data dari tabel posts
        $posts = laporan_model::all();
        // Kembalikan data dalam format JSON
        return response()->json(['data' => $posts], 200);
    }

    public function show($id)
    {
        // Cari data berdasarkan custom_id
        $post = laporan_model::find($id);
        // Jika data tidak ditemukan, kembalikan respons error
        if (!$post) {
        return response()->json(['message' => 'Post not 
        found'], 404);
    }
    // Kembalikan data dalam format JSON
    return response()->json(['data' => $post], 200);
    }
    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nohp' => 'required|string|max:50',
            'lokasi' => 'required|string|max:20',
            'aktivitas' => 'required|string|max:20',
            ]);
            // Create the post without needing custom_id from the request (auto-incremented)
            $laporan = laporan_model::create([
            'nama' => $request->input('nama'),
            'nohp' => $request->input('nohp'),
            'lokasi' => $request->input('lokasi'),
            'aktivitas' => $request->input('aktivitas'),
            ]);
            return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $laporan], 201);
    }
    public function update(Request $request, $id)
    {
    // Validasi data yang dikirimkan
    $request->validate([
            'nama' => 'required|string|max:100',
            'nohp' => 'required|string|max:50',
            'lokasi' => 'required|string|max:20',
            'aktivitas' => 'required|string|max:20',
    ]);
    $laporan = laporan_model::find($id);
    // Jika post tidak ditemukan, kembalikan respons error
    if (!$laporan) {
    return response()->json(['message' => 'Laporan not found'], 404);
    }
    // Update data post dengan data yang dikirim
    $laporan->update($request->only(['nama', 'nohp', 'lokasi', 'aktivitas']));
    // Kembalikan respons JSON yang menunjukkan sukses
    return response()->json(['message' => 'Laporan berhasil diperbarui!', 'data' =>$laporan], 200);
    }
    public function delete($id)
    {
    // Cari post berdasarkan ID
    $laporan = laporan_model::find($id);
    // Jika post tidak ditemukan, kembalikan respons error
    if (!$laporan) {
    return response()->json(['message' => 'Laporan not found'], 404);
    }
    // Hapus data post
    $laporan->delete();
    // Kembalikan respons JSON yang menunjukkan sukses
    return response()->json(['message' => 'laporan berhasil dihapus!'], 200);
    }
}