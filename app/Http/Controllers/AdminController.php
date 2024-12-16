<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    // Tampilkan semua data admin
    public function index()
    {
        $admin = Admin::all();
        return response()->json(['success' => true, 'data' => $admin], 200);
    }

    // Tambah data admin baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|string|min:8',
        ]);

        $admin = Admin::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['success' => true, 'message' => 'Admin berhasil ditambahkan', 'data' => $admin], 201);
    }

    // Tampilkan data admin berdasarkan ID
    public function show($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $admin], 200);
    }

    // Perbarui data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => "required|email|unique:admin,email,$id",
            'password' => 'nullable|string|min:8',
        ]);

        $data = [
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
        ];

        if ($request->password) {
            $data['password'] = bcrypt($validatedData['password']);
        }

        $admin->update($data);

        return response()->json(['success' => true, 'message' => 'Admin berhasil diperbarui', 'data' => $admin], 200);
    }

    // Hapus data admin
    public function destroy($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin tidak ditemukan'], 404);
        }

        $admin->delete();

        return response()->json(['success' => true, 'message' => 'Admin berhasil dihapus'], 200);
    }
    public function login(Request $request)
    {
        // Validasi input email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        return response()->json(['message' => 'Login successful'], 200);
    }
}
