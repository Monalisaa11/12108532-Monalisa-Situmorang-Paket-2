<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <title>Download Data</title>
  
  <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even) {
      background-color: #f2f2f2;
    }

   
    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #b40000;
      color: white;
    }

  </style>
</head>

<body>
  <table id="customers">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kategori Buku</th>
        <th scope="col">Judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Tahun Terbit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $data)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$data->categoryBook->name}}</td>
        <td>{{$data->judul}}</td>
        <td>{{$data->penulis}}</td>
        <td>{{$data->penerbit}}</td>
        <td>{{$data->tahun_terbit}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
