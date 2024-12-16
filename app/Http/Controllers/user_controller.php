<?php
namespace App\Http\Controllers;

use App\Models\user_model;
use Illuminate\Http\Request;
class user_controller extends Controller
{

    public function index()
    {
        // Mengambil semua data pengguna
        $users = user_model::all();
        return response()->json($users); // Mengembalikan data pengguna dalam format JSON
    }

    public function show($id)
    {
        // Cari data berdasarkan custom_id
        $post = user_model::find($id);
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
        'email' => 'required|string|max:50',
        'password' => 'required|string|max:20',
        ]);
        // Create the post without needing custom_id from the request (auto-incremented)
        $user = user_model::create([
        'nama' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        ]);
        return response()->json(['message' => 'Post berhasil dibuat!', 'data' => $user], 201);
    }
    public function update(Request $request, $id)
    {
    // Validasi data yang dikirimkan
    $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
    ]);
    $user = user_model::find($id);
    // Jika post tidak ditemukan, kembalikan respons error
    if (!$user) {
    return response()->json(['message' => 'User not found'], 404);
    }
    // Update data post dengan data yang dikirim
    $user->update($request->only(['nama', 'email', 'password']));
    // Kembalikan respons JSON yang menunjukkan sukses
    return response()->json(['message' => 'User berhasil diperbarui!', 'data' =>$user], 200);
    }
    public function delete($id)
    {
    // Cari post berdasarkan ID
    $user = user_model::find($id);
    // Jika post tidak ditemukan, kembalikan respons error
    if (!$user) {
    return response()->json(['message' => 'User not found'], 404);
    }
    // Hapus data post
    $user->delete();
    // Kembalikan respons JSON yang menunjukkan sukses
    return response()->json(['message' => 'User berhasil dihapus!'], 200);
    }
}

