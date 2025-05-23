<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Prodi</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f3f4f6;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>📋 Data Prodi</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Prodi</th>
                <th>Nama Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodi as $pd)
            <tr>
                <td>{{ $pd['kode_prodi'] }}</td>
                <td>{{ $pd['nama_prodi'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>