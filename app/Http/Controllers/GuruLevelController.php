<?php

namespace App\Http\Controllers;

use App\Models\GuruLevel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;

class GuruLevelController extends Controller
{
    public function index()
    {
        try {
            $guru_levels = GuruLevel::with(['guru', 'level'])->get(); // Include relasi guru dan level
            return response()->json(['success' => true, 'data' => $guru_levels], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error retrieving data', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_guru' => 'required|exists:gurus,id',
            'id_level' => 'required|exists:levels,id',
        ]);

        try {
            $guruLevel = GuruLevel::create($validated);
            return response()->json(['success' => true, 'data' => $guruLevel], 201);
        } catch (QueryException $qe) {
            return response()->json(['success' => false, 'message' => 'Database error', 'error' => $qe->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating data', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $guruLevel = GuruLevel::with(['guru', 'level'])->findOrFail($id);
            return response()->json(['success' => true, 'data' => $guruLevel], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data not found', 'error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_guru' => 'required|exists:gurus,id',
            'id_level' => 'required|exists:levels,id',
        ]);

        try {
            $guruLevel = GuruLevel::findOrFail($id);
            $guruLevel->update($validated);
            return response()->json(['success' => true, 'data' => $guruLevel], 200);
        } catch (QueryException $qe) {
            return response()->json(['success' => false, 'message' => 'Database error', 'error' => $qe->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating data', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $guruLevel = GuruLevel::findOrFail($id);
            $guruLevel->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting data', 'error' => $e->getMessage()], 500);
        }
    }
}
