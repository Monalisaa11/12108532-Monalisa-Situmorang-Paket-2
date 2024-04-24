<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
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
    <h2 class="text-center">Data User</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th scope="col">Kategori Buku</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Deskripsi</th>
      
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $item)
            <tr <td>{{ $loop->iteration }}</td>
                <td>{{ $item->categoryBook->name}}</td>
                <td>{{$item->judul}}</td>
                        <td>{{$item->penulis}}</td>
                            <td>{{$item->penerbit}}</td>
                                <td>{{$item->tahun_terbit}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->deskripsi}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>