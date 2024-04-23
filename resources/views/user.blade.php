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
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)

            <tr <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{$item->email}}</td>
                        <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->role}}</td>
                                <td>{{$item->alamat}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>