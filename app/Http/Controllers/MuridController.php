<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class MuridController extends Controller
{
    public function index()
    {
        try {
            $murids = Murid::with('level')->get();
            return response()->json([
                'status' => 'success',
                'data' => $murids,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_murid' => 'required|string|max:255',
                'id_level' => 'required|exists:levels,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'validation_error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $murid = Murid::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Murid created successfully.',
                'data' => $murid,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create murid.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $murid = Murid::with('level')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $murid,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Murid not found.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_murid' => 'sometimes|required|string|max:255',
                'id_level' => 'sometimes|required|exists:levels,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'validation_error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $murid = Murid::findOrFail($id);
            $murid->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Murid updated successfully.',
                'data' => $murid,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update murid.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $murid = Murid::findOrFail($id);
            $murid->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Murid deleted successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete murid.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
