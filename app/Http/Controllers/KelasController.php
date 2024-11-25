<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        try {
            $kelas = Kelas::all();
            return response()->json(['data' => $kelas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data kelas.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_kelas' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $kelas = Kelas::create([
                'nama_kelas' => $request->nama_kelas,
            ]);

            return response()->json(['message' => 'Kelas berhasil dibuat.', 'data' => $kelas], 201);
        } catch (\Exception $e) {
            //return response()->json(['error' => 'Gagal membuat kelas.'], 500);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Kelas $kelas)
    {
        try {
            return response()->json(['data' => $kelas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menampilkan data kelas.'], 500);
        }
    }

    public function update(Request $request, $id)
{
    try {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return response()->json(['message' => 'Kelas berhasil diperbarui.', 'data' => $kelas], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function destroy($id)
{
    try {
       
        $kelas = Kelas::find($id);

       
        if (!$kelas) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

       
        $kelas->delete();

        return response()->json(['message' => 'Kelas berhasil dihapus.'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
