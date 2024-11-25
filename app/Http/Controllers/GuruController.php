<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    
    public function index()
    {
        try {
            $gurus = Guru::with('kelas')->get();
            return response()->json(['data' => $gurus], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:gurus,username',
                'password' => 'required|string|min:8',
                'id_kelas' => 'required|exists:kelas,id', 
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $guru = Guru::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password), // Hash password
                'id_kelas' => $request->id_kelas,
            ]);

            return response()->json(['message' => 'Guru berhasil dibuat.', 'data' => $guru], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $guru = Guru::with('kelas', 'level')->find($id);

            if (!$guru) {
                return response()->json(['error' => 'Data guru tidak ditemukan.'], 404);
            }

            return response()->json(['data' => $guru], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $guru = Guru::find($id);

            if (!$guru) {
                return response()->json(['error' => 'Data guru tidak ditemukan.'], 404);
            }

            $validator = Validator::make($request->all(), [
                'nama' => 'sometimes|required|string|max:255',
                'username' => 'sometimes|required|string|max:255|unique:gurus,username,' . $id,
                'password' => 'sometimes|required|string|min:8',
                'id_kelas' => 'sometimes|required|exists:kelas,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $guru->update([
                'nama' => $request->nama ?? $guru->nama,
                'username' => $request->username ?? $guru->username,
                'password' => $request->has('password') ? bcrypt($request->password) : $guru->password,
                'id_kelas' => $request->id_kelas ?? $guru->id_kelas,
            ]);

            return response()->json(['message' => 'Guru berhasil diperbarui.', 'data' => $guru], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $guru = Guru::find($id);

            if (!$guru) {
                return response()->json(['error' => 'Data guru tidak ditemukan.'], 404);
            }

            $guru->delete();
            return response()->json(['message' => 'Guru berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
