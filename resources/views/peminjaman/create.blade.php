@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Peminjaman</h5>
            <form action="{{route('peminjaman.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <select class="form-select" name="user_id" id="user_id">
                        @foreach($users as $u)
                        <option value="{{$u->user_id}}">{{$u->user_id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="pb_no_siswa" class="form-label">No Siswa</label>
                        <input type="text" class="form-control" name="pb_no_siswa" id="pb_no_siswa">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pb_nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="pb_nama_siswa" id="pb_nama_siswa">
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="mb-3">
                        <label for="pb_kode" class="form-label">Kode Barang Dipinjam</label>
                        <select class="form-select" name="pb_kode" id="pb_kode">
                            @foreach($barang as $pb)
                            <option value="{{$pb->pb_kode}}">{{$pb->pb_kode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="pb_tgl" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="pb_tgl" id="pb_tgl">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pb_harus_kembali_tgl" class="form-label">Harus Kembali Tanggal</label>
                        <input type="date" class="form-control" name="pb_harus_kembali_tgl" id="pb_harus_kembali_tgl">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="pb_status" class="form-label">Status</label>
                    <div class="d-flex gap-2">
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_status" id="pb_hapus" value="0">
                            <label for="pb_hapus" class="form-check-label">peminjaman dihapus dari system</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_status" id="pb_baik" value="1">
                            <label for="pb_baik" class="form-check-label">peminjaman aktif</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection