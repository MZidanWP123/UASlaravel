<?php

namespace App\Http\Controllers\WebView;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index(){
        try {
            $tipeUser='guru';
            $jadwalGuru=[];
            $jadwalMurid=[];
            // $riwayatPresensi=[];

            // Set Carbon locale to Indonesian
            Carbon::setLocale('id');

            // Get the current date in Asia/Jakarta timezone
            $today = Carbon::now('Asia/Jakarta');

            // Format the date in Indonesian format
            $getHari = $today->translatedFormat('l');
            
            // ambil informasi user yang login
            $dataUser=User::with(['murids','gurus'])->find(Auth::user()->id);            
            if($dataUser->gurus == []){
                $tipeUser='murid';
                $jadwalMurid=[]; //nanti ditambahkan
            }else{
                // ambil jadwal di hari ini
                $jadwalGuru=Jadwal::with(['kelas','level','guru'])
                ->where('hari',strtolower($getHari))
                ->where('guru_id',$dataUser->gurus[0]->id)->get();                

            }
            
            return view('presensi.index', [
                'judul' => 'Presensi',
                'tipeUser' => $tipeUser,
                'jadwalGuru'=>$jadwalGuru,
                'jadwalMurd'=>$jadwalMurid,
                'riwayatPresensi'=>Absensi::with(['jadwal','jadwal.kelas'])->where('user_id',Auth::user()->id)->paginate(4)
            ]);
        } catch (\Throwable $th) {
            throw $th;  
        }
    }

    public function presensi(){
        try {
            // INGAT INI HANYA UNTUK GURU SAJA jadi kalo login sebagi murid akan error
            // Set Carbon locale to Indonesian
            Carbon::setLocale('id');

            // Get the current date in Asia/Jakarta timezone
            $today = Carbon::now('Asia/Jakarta');

            // Format the date in Indonesian format
            $getHari = $today->translatedFormat('l');
            
            // ambil informasi user yang login
            $dataUser=User::with(['murids','gurus'])->find(Auth::user()->id); 
            
            $jadwalGuru=Jadwal::with(['kelas','level','guru'])
            ->where('hari',strtolower($getHari))
            ->where('guru_id',$dataUser->gurus[0]->id)->get();   

            if(!$jadwalGuru){
                return redirect()->route('presensi.index')->with('error', 'Anda tidak bisa absen karena jadwal anda belum ada');
            }else{
                Absensi::create([
                    'created_at'=>Carbon::now(),
                    'jadwal_id'=>$jadwalGuru[0]->id,
                    'user_id'=>Auth::user()->id,
                    'waktu_checkin'=>Carbon::now()
                ]);
                return redirect()->route('presensi.index')->with('success', 'Presensi berhasil di simpan');
            }
        } catch (\Throwable $th) {
            throw $th; 
        }
    }
}
