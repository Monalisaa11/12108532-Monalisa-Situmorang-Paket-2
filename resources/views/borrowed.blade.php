<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrowed</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h2 class="text-center">Data Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowed as $item)
            <tr <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->tanggal_peminjaman}}</td>
                <td>{{$item->tanggal_pengembalian}}</td>
                <td>{{$item->action}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>