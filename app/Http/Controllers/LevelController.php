<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class LevelController extends Controller
{
    public function index()
    {
        try {
            $levels = Level::all();
            return response()->json([
                'status' => 'success',
                'data' => $levels,
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
                'nama_level' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'validation_error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $level = Level::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Level created successfully.',
                'data' => $level,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create level.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $level = Level::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $level,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Level not found.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_level' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'validation_error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $level = Level::findOrFail($id);
            $level->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Level updated successfully.',
                'data' => $level,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update level.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $level = Level::findOrFail($id);
            $level->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Level deleted successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete level.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
