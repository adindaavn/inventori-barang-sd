@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Petugas</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('petugas.update', $petugas->id_petugas)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="{{$petugas->nama_petugas}}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{$petugas->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="{{$petugas->password}}">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telp</label>
                            <input type="text" class="form-control" name="telp" id="telp" value="{{$petugas->telp}}">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">level</label>
                            <select name="level" id="level" class="form-select" required>
                                <option value="admin" @if($petugas->level == 'admin') selected @endif>admin</option>
                                <option value="petugas" @if($petugas->level == 'petugas') selected @endif>petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection