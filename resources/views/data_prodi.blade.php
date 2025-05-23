<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Informasi Kampus</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

  <div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg flex flex-col">
      <!-- Link ke homepage -->
      <a href="{{ route('homepage')}}" class="p-5 text-2xl font-semibold border-b border-gray-700 hover:bg-gray-700 transition">SI Kampus🏫</a>
      <!-- Navigasi sidebar -->
      <nav class="flex-1 p-5">
        <ul class="space-y-3">
         <!-- Navigasi ke halaman Dashboard -->
         <li>
        <a href="{{ route('homepage')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">📌Dashboard</a>
        </li>
         <!-- Navigasi ke halaman Data Prodi -->
         <li>
            <a href="{{ route('prodi.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">📋Data Prodi</a>
          </li>
          <!-- Navigasi ke halaman Data Mahasiswa-->
          <li>
            <a href="{{ route('mahasiswa.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">👩‍🎓Data Mahasiswa</a>
          </li>
      </nav>
    </aside>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-5 flex items-center justify-center border-b border-gray-200">
        <h1 class="text-gray-800 text-2xl font-semibold tracking-wide">Sistem Informasi Kampus</h1>
      </header>

      <!-- Content utama -->
      <main class="p-6">
        <!-- Card putih untuk tombol + dan tabel -->
        <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center justify-center mb-6 gap-2">
        <h2 class="text-2xl font-semibold text-gray-700">📋Data Prodi</h2>
        </div>
          <!-- Tombol Tambah Data di kiri atas -->
          <div class="flex justify-between items-center mb-4">
          <div class="flex gap-2">
          <a href="{{ route('prodi.create') }}"class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-md text-sm transition">+ Tambah Data</a>
          <a href="{{ route('prodi.cetak') }}" target="_blank"class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md text-sm transition">🖨️ Cetak PDF</a>
          </div>
            <!-- Search Bar, supaya bisa langsung aktif ditambahin id=serchinput --> 
            <div class="relative w-64">
            <input id="searchInput" type="text" placeholder="Cari Prodi..." class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-indigo-300 text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>

          <!-- Tabel Data Prodi -->
          <table class="min-w-full border border-gray-300 text-sm rounded-md overflow-hidden">
            <thead>
              <tr class="bg-gray-100 text-center text-gray-600">
                <th class="px-5 py-3 border-b border-gray-300">Kode Prodi</th>
                <th class="px-5 py-3 border-b border-gray-300">Nama Prodi</th>
                <th class="px-5 py-3 border-b border-gray-300">Aksi</th>
              </tr>
            </thead>
            <!-- tambahin id supaya isi tabel bisa di serch -->
            <tbody id="prodiTableBody"> 
              @foreach ($prodi as $pd)
              <tr class="hover:bg-gray-50 text-center">
                <td class="px-5 py-3 border-b border-gray-200">{{ $pd['kode_prodi']}}</td>
                <td class="px-5 py-3 border-b border-gray-200">{{ $pd['nama_prodi']}}</td>
                <td class="px-5 py-3 border-b border-gray-200 flex justify-center space-x-3">
                  <!-- Tombol Edit -->
                  <a href="{{ route('prodi.edit', $pd['kode_prodi']) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️Edit</a>
                  <!-- Tombol Hapus -->
                  <form action="{{ route('prodi.destroy', $pd['kode_prodi']) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
<script> //script js supaya bisa langsung serch
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("prodiTableBody");

    searchInput.addEventListener("input", function () {
      const keyword = this.value.toLowerCase();
      const rows = tableBody.getElementsByTagName("tr");

      Array.from(rows).forEach((row) => {
        const rowText = row.textContent.toLowerCase();
        if (rowText.includes(keyword)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  });
</script>
</html>