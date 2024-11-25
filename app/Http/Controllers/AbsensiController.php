<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with(['guru', 'level', 'kelas', 'jadwal'])->get();
        return response()->json(['success' => true, 'data' => $absensi]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'id_level' => 'required|exists:levels,id',
            'id_jadwal' => 'required|exists:jadwals,id',
        ]);

        try {
            $absensi = Absensi::create([
                'id_guru' => Auth::id(), // Mengambil ID user yang sedang login
                'id_kelas' => $validated['id_kelas'],
                'id_level' => $validated['id_level'],
                'id_jadwal' => $validated['id_jadwal'],
                'waktu_absen' => now(),
            ]);

            return response()->json(['success' => true, 'data' => $absensi], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating absensi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $absensi = Absensi::with(['guru', 'level', 'kelas', 'jadwal'])->find($id);

        if (!$absensi) {
            return response()->json(['success' => false, 'message' => 'Absensi not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $absensi]);
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::find($id);

        if (!$absensi) {
            return response()->json(['success' => false, 'message' => 'Absensi not found'], 404);
        }

        $validated = $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'id_level' => 'required|exists:levels,id',
            'id_jadwal' => 'required|exists:jadwals,id',
        ]);

        try {
            $absensi->update([
                'id_kelas' => $validated['id_kelas'],
                'id_level' => $validated['id_level'],
                'id_jadwal' => $validated['id_jadwal'],
                'waktu_absen' => now(),
            ]);

            return response()->json(['success' => true, 'data' => $absensi]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating absensi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $absensi = Absensi::find($id);

        if (!$absensi) {
            return response()->json(['success' => false, 'message' => 'Absensi not found'], 404);
        }

        try {
            $absensi->delete();
            return response()->json(['success' => true, 'message' => 'Absensi deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting absensi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
