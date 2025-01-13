@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Masyarakat</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('masyarakat.update', $masyarakat->nik)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nik</label>
                            <input type="text" class="form-control" name="nik" id="nik" value="{{$masyarakat->nik}}">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$masyarakat->nama}}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{$masyarakat->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="{{$masyarakat->password}}">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telp</label>
                            <input type="text" class="form-control" name="telp" id="telp" value="{{$masyarakat->telp}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection