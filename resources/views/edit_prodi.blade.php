<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Data Prodi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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
    <!-- content -->
    <div class="flex-1 flex items-center justify-center p-10 bg-gray-100">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-lg">
      <!-- form edit data Prodi -->
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Edit Data Prodi</h2>
    <form action="{{ route('prodi.update', $prodi['kode_prodi']) }}" method="POST" class="space-y-5">
    @csrf
    @method('PUT')
      <div>
        <label class="block mb-1 font-medium text-gray-700">Kode Prodi</label>
        <input type="text" name="kode_prodi" value="{{ $prodi['kode_prodi'] }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Nama Prodi</label>
        <input type="text" name="nama_prodi" value="{{ $prodi['nama_prodi'] }}" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="pt-4">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-md">
          Perbarui
        </button>
        <a href="{{ route('prodi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md">Batal</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>