<?php

namespace App\Http\Controllers\WebView;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterKelasController extends Controller
{
    public function index(){
        try {
            return view('master.kelas.index', ['judul' => 'Master Kelas','data'=>Kelas::paginate(5-1)]);
        } catch (\Throwable $th) {
            throw $th;            
        }
    }

    public function add(){
        try {
            return view('master.kelas.add', ['judul' => 'Tambah Master Kelas']);
        } catch (\Throwable $th) {
            throw $th;            
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

            return redirect()->route('master-kelas.index')->with('success', 'kelas berhasil di tambah!');

            return response()->json(['message' => 'Kelas berhasil dibuat.', 'data' => $kelas], 201);
        } catch (\Exception $e) {
            return redirect()->route('master-kelas.index')->with('error', $e->getMessage());
            //return response()->json(['error' => 'Gagal membuat kelas.'], 500);
            // return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function view($id){
        try {
            return view('master.kelas.view', ['judul' => 'Master Kelas','data'=>Kelas::find($id)]);
        } catch (\Throwable $th) {
            throw $th;            
        }
    }

    public function update(Request $request, $id){
        try {
            $kelas = Kelas::find($id);
            if (!$kelas) {
                return response()->json(['error' => 'Data tidak ditemukan.'], 404);
            }

            $validator = Validator::make($request->all(), [
                'nama_kelas' => 'required|string|max:255',
            ]);

            // if ($validator->fails()) {
            //     return response()->json(['error' => $validator->errors()], 400);
            // }

            $kelas->update([
                'nama_kelas' => $request->nama_kelas,
            ]);

            return redirect()->route('master-kelas.index')->with('success', 'Data Kelas berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('master-kelas.index')->with('error', $e->getMessage());
        }
    }
    

    public function delete($id)
    {
        try {
           
            $kelas = Kelas::find($id);
    
           
            if (!$kelas) {
                return response()->json(['error' => 'Data tidak ditemukan.'], 404);
            }
    
           
            $kelas->delete();
    
            return redirect()->route('master-kelas.index')->with('success', 'Data Kelas berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('master-kelas.index')->with('error', $e->getMessage());
        }
    }

}
