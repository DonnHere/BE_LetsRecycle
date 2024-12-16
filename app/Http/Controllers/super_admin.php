<?php

namespace App\Http\Controllers;

use App\Models\superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class super_admin extends Controller
{
    // Tampilkan semua data admin
    public function index()
    {
        $superadmin = superadmin::all();
        return response()->json(['success' => true, 'data' => $superadmin], 200);
    }

    // Tambah data admin baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:superadmin,email',
            'password' => 'required|string|min:8',
        ]);

        $superadmin = superadmin::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['success' => true, 'message' => 'SuperAdmin berhasil ditambahkan', 'data' => $superadmin], 201);
    }

    // Tampilkan data admin berdasarkan ID
    public function show($id)
    {
        $superadmin = superadmin::find($id);

        if (!$superadmin) {
            return response()->json(['success' => false, 'message' => 'SuperAdmin tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $superadmin], 200);
    }

    // Perbarui data admin
    public function update(Request $request, $id)
    {
        $superadmin = superadmin::find($id);

        if (!$superadmin) {
            return response()->json(['success' => false, 'message' => 'SuperAdmin tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => "required|email|unique:superadmin,email,$id",
            'password' => 'nullable|string|min:8',
        ]);

        $data = [
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
        ];

        if ($request->password) {
            $data['password'] = bcrypt($validatedData['password']);
        }

        $superadmin->update($data);

        return response()->json(['success' => true, 'message' => 'Admin berhasil diperbarui', 'data' => $superadmin], 200);
    }

    // Hapus data admin
    public function destroy($id)
    {
        $superadmin = superadmin::find($id);

        if (!$superadmin) {
            return response()->json(['success' => false, 'message' => 'SuperAdmin tidak ditemukan'], 404);
        }

        $superadmin->delete();

        return response()->json(['success' => true, 'message' => 'SuperAdmin berhasil dihapus'], 200);
    }
    public function login(Request $request)
{
    // Validasi input email dan password
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cari superadmin berdasarkan email
    $superadmin = superadmin::where('email', $request->email)->first();

    // Cek apakah superadmin ada dan password sesuai
    if (!$superadmin || !Hash::check($request->password, $superadmin->password)) {
        return response()->json(['message' => 'Invalid email or password'], 401);
    }

    // Buat token untuk superadmin
    $token = $superadmin->createToken('superadmin_token')->plainTextToken;

    // Kirim response dengan token
    return response()->json([
        'message' => 'Login successful',
        'access_token' => $token,
        'token_type' => 'Bearer',
    ], 200);
}
    
}
