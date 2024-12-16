<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use Illuminate\Http\Request;

class DataSampahController extends Controller
{
    /**
     * Get all data sampah.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Mendapatkan semua data dari tabel data_sampahs
            $dataSampah = DataSampah::all();

            return response()->json([
                'status' => 'success',
                'data' => $dataSampah
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a single data sampah by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $dataSampah = DataSampah::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $dataSampah
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found!'
            ], 404);
        }
    }
}
