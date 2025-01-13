@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Petugas</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('petugas.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas">
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
                        <div class="mb-3">
                            <label for="level" class="form-label">level</label>
                            <select name="level" id="level" class="form-select" required>
                                <option value="admin">admin</option>
                                <option value="petugas">petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection