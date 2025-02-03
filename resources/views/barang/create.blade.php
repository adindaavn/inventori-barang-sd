@extends('layouts.header')
@section('title', 'Tambah Barang')
@section('content')
<div class="container-fluid">
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Tambah Barang</h5>
            <form action="{{route('barang.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="jns_brg_kode" class="form-label">Jenis Barang</label>
                        <select class="form-select js-example-basic-single" name="jns_brg_kode" id="jns_brg_kode">
                            @foreach($jns as $j)
                            <option value="{{$j->jns_brg_kode}}">{{$j->jns_brg_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="br_tgl_terima" class="form-label">Tanggal Terima Barang</label>
                        <input type="date" class="form-control" name="br_tgl_terima" id="br_tgl_terima">
                        @error('br_tgl_terima')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="br_nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="br_nama" id="br_nama">
                    @error('br_nama')
                    <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="br_sts" class="form-label">Status</label>
                    <div class="d-flex gap-2">
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="br_sts" id="br_hapus" value="0">
                            <label for="br_hapus" class="form-check-label">barang dihapus dari system</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="br_sts" id="br_baik" value="1">
                            <label for="br_baik" class="form-check-label">barang kondisi baik</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="br_sts" id="br_rusak" value="2">
                            <label for="br_rusak" class="form-check-label">barang kondisi rusak, bisa diperbaiki</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="br_sts" id="br_parah" value="3">
                            <label for="br_parah" class="form-check-label">barang rusak, tidak bisa digunakan</label>
                        </div>
                    </div>
                    @error('br_sts')
                    <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection