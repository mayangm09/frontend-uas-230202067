<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
class prodiController extends Controller
{
    public function index()  //fungsi  menarik data
    {
        $response = Http::get(url: 'http://localhost:8080/prodi');
        if ($response->successful()) {
            $prodi = $response->json();
            return view(view: 'data_prodi', data: ['prodi' => $prodi]);
        }
        return view(view: 'data_prodi', data: ['prodi' => [], 'error' =>'Gagal mengambil data prodi']);
    }

    public function create()
    {
        $response = Http::get('http://localhost:8080/prodi'); // Sesuaikan endpoint API Prodi
    
        if ($response->successful()) {
            $prodi = $response->json();
            return view('tambah_prodi', compact('prodi'));
        }
    
        return view('tambah_prodi', ['prodi' => []])->withErrors(['msg' => 'Gagal mengambil data prodi']);
    }
    
    public function store(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/prodi', [
        'kode_prodi' => $request->kode_prodi,
        'nama_prodi' => $request->nama_prodi,
    ]);
    
    
        if ($response->successful()) {
            return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
        }
    
        // Debug responsenya
        $error = $response->json()['messages']['error'] ?? 'Gagal menambahkan prodi';
        return back()->withErrors(['msg' => 'Gagal menambahkan Prodi: ' . $error])->withInput();
        }

        public function edit($kode_prodi)
        {
        // Ambil data prodi berdasarkan ID
        $prodiResponse = Http::get("http://localhost:8080/prodi/{$kode_prodi}");
    
        if ($prodiResponse->successful()&& !empty($prodiResponse[0])) {
        $prodi = $prodiResponse[0];
        
        return view('edit_prodi', compact('prodi'));
         }

        return redirect()->route('prodi.index')
        ->withErrors(['msg' => 'Data prodi gagal diambil']);
        }

        public function update(Request $request, $kode_prodi)
        {
            // Validasi data
            $request->validate([
                'kode_prodi' => 'required|string',
                'nama_prodi' => 'required|string', //diliat tipe datanya ga semua nya string
            ]);
        
            // Kirim data ke backend 
            $response = Http::asForm()->put("http://localhost:8080/prodi/{$kode_prodi}", $request->all() 
                
            );
        
            // Periksa apakah update berhasil
            if ($response->successful()) {
                return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil diperbarui');
            }
        
            // Jika gagal, kembalikan pesan error
            return back()->withErrors(['msg' => 'Gagal memperbarui data prodi'])->withInput();
        }
        public function destroy($kode_prodi) //fungsi delete
        {
            $response = Http::delete("http://localhost:8080/prodi/{$kode_prodi}");
            if ($response->successful()) {
                return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus');
            }
    
            return redirect()->route('prodi.index')->withErrors(['msg' => 'Gagal menghapus prodi']);
        }

        public function cetak()
        {
            $response = Http::get('http://localhost:8080/prodi');
            if ($response->successful()) {
                $prodi = collect($response->json());
                $pdf = Pdf::loadView('cetak', compact('prodi')); 
                return $pdf->download('prodi.pdf');
            } else {
                return back()->with('error', 'Gagal mengambil data untuk PDF');
            }
        }

}
