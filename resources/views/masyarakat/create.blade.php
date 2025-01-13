@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Masyarakat</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('masyarakat.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nik</label>
                            <input type="text" class="form-control" name="nik" id="nik">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telp</label>
                            <input type="text" class="form-control" name="telp" id="telp">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Masyarakat</title>
</head>

<body>
    <form action="{{route('masyarakat.store')}}" method="post">
        @csrf
        <label for="nik">nik</label>
        <input type="text" name="nik" id="nik" required>
        <br>

        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <label for="username">username</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">password</label>
        <input type="text" name="password" id="password" required>
        <br>
        <label for="telp">telp</label>
        <input type="text" name="telp" id="telp" required>
        <br>

        <button type="submit">create</button>
    </form>
</body>

</html> -->