<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Data Prodi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

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

      <!-- Content -->
      <main class="p-6">
        <!-- Form Tambah Prodi -->
        <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
          <h2 class="text-2xl font-bold mb-6 text-gray-700">Tambah Data Prodi</h2>
          <form action="{{ route('prodi.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
              <label class="block mb-1 font-medium text-gray-700">Kode Prodi</label>
              <input type="text" name="kode_prodi" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
              <label class="block mb-1 font-medium text-gray-700">Nama Prodi</label></label>
              <input type="text" name="nama_prodi" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="pt-4">
              <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md">
                Simpan
              </button>
              <a href="{{ route('prodi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-md">Batal</a>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
</body>
</html>