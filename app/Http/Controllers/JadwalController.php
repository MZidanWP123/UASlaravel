<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;

class JadwalController extends Controller
{
    public function index()
    {
        try {
            $jadwal = Jadwal::all();
            return response()->json(['success' => true, 'data' => $jadwal], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error retrieving data', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i|after:jam_masuk',
        ]);

        try {
            $jadwal = Jadwal::create($validated);
            return response()->json(['success' => true, 'data' => $jadwal], 201);
        } catch (QueryException $qe) {
            return response()->json(['success' => false, 'message' => 'Database error', 'error' => $qe->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating data', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);
            return response()->json(['success' => true, 'data' => $jadwal], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data not found', 'error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i|after:jam_masuk',
        ]);

        try {
            $jadwal = Jadwal::findOrFail($id);
            $jadwal->update($validated);
            return response()->json(['success' => true, 'data' => $jadwal], 200);
        } catch (QueryException $qe) {
            return response()->json(['success' => false, 'message' => 'Database error', 'error' => $qe->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating data', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);
            $jadwal->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }
}
