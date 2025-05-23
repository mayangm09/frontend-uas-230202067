<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class mahasiswaController extends Controller
{
    public function index()  //fungsi  menarik data
    {
        $response = Http::get(url: 'http://localhost:8080/mahasiswa');
        if ($response->successful()) {
            $mahasiswa = $response->json();
            return view(view: 'data_mahasiswa', data: ['mahasiswa' => $mahasiswa]);
        }
        return view(view: 'data_mahasiswa', data: ['mahasiswa' => [], 'error' =>'Gagal mengambil data kajur']);
    }
    public function create()
    {
    // Ambil data user dari API
    $responseKelas = Http::get('http://localhost:8080/kelas');
    $responseProdi = Http::get('http://localhost:8080/prodi');
    $responseMahasiswa = Http::get('http://localhost:8080/mahasiswa'); // Ganti sesuai endpoint user kamu

    if ($responseKelas->successful() && $responseProdi->successful() && $responseMahasiswa->successful()) {
        $kelas = $responseKelas->json();
        $prodi = $responseProdi->json();
        $mahasiswa = $responseMahasiswa->json();

        return view('tambah_mahasiswa', compact('kelas', 'prodi', 'mahasiswa'));
    }

    return back()->withErrors(['msg' => 'Gagal mengambil data dari server']);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $response = Http::asForm()->post('http://localhost:8080/mahasiswa', [
        'npm' => $request->npm,
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nama_kelas' => $request->nama_kelas,
        'nama_prodi' => $request->nama_prodi,

    ]);
    
    
        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
        }
    
        // dd($response->body());
        // Debug responsenya
        $error = $response->json()['messages']['error'] ?? 'Gagal menambahkan mahasiswa';
        return back()->withErrors(['msg' => 'Gagal menambahkan mahasiswa: ' . $error])->withInput();
    }

    public function destroy($npm) //fungsi delete
        {
            $response = Http::delete("http://localhost:8080/mahasiswa/{$npm}");
            if ($response->successful()) {
                return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
            }
    
            return redirect()->route('mahasiswa.index')->withErrors(['msg' => 'Gagal menghapus mahasiswa']);
        }
}
