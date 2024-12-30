<?php

namespace App\Http\Controllers;

use App\Models\JadwalMakan;
use Illuminate\Http\Request;

class JadwalMakanController extends Controller
{
    // Method untuk mendapatkan semua data
    public function index()
    {
        return response()->json(JadwalMakan::all(), 200);
    }

    // Method untuk mendapatkan data berdasarkan ID
    public function show($id)
    {
        $jadwalMakan = JadwalMakan::find($id);

        if (!$jadwalMakan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($jadwalMakan, 200);
    }

    // Method untuk menambahkan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_makan' => 'required|date',
            'waktu_makan' => 'required|date_format:H:i:s',
            'menu' => 'required|string|max:255',
        ]);

        $jadwalMakan = JadwalMakan::create($validatedData);

        return response()->json($jadwalMakan, 201);
    }

    // Method untuk memperbarui data berdasarkan ID
    public function update(Request $request, $id)
    {
        $jadwalMakan = JadwalMakan::find($id);

        if (!$jadwalMakan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'tanggal_makan' => 'sometimes|date',
            'waktu_makan' => 'sometimes|date_format:H:i:s',
            'menu' => 'sometimes|string|max:255',
        ]);

        $jadwalMakan->update($validatedData);

        return response()->json($jadwalMakan, 200);
    }

    // Method untuk menghapus data berdasarkan ID
    public function destroy($id)
    {
        $jadwalMakan = JadwalMakan::find($id);

        if (!$jadwalMakan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $jadwalMakan->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
