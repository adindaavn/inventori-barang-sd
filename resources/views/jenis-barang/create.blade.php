@extends('layouts.header')
@section('title', 'Tambah Jenis Barang')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Tambah Jenis Barang</h5>
            <form action="{{route('jenis-barang.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="form-group mb-3 col-6">
                    <label for="jns_brg_nama" class="form-label">Nama Jenis Barang</label>
                    <input type="text" class="form-control" name="jns_brg_nama" id="jns_brg_nama">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection