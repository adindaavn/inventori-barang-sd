@extends('layouts.header')
@section('title', 'Edit Peminjaman')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Masyarakat</h5>
            <form action="{{route('peminjaman.update', $peminjaman->pb_id)}}" method="post" class="form-sample mx-3">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group">
                    <label for="user_id" class="form-label">User ID</label>
                    <select class="form-select js-example-basic-single" name="user_id" id="user_id">
                        @foreach($users as $u)
                        <option value="{{$u->user_id}}" @if ($u->user_id == $peminjaman->user_id) selected @endif>
                            {{$u->user_id}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="mb-3 form-group col-6">
                        <label for="pb_no_siswa" class="form-label">No Siswa</label>
                        <input type="text" class="form-control" name="pb_no_siswa" id="pb_no_siswa" value="{{$peminjaman->pb_no_siswa}}">
                    </div>
                    <div class="mb-3 form-group col-6">
                        <label for="pb_nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="pb_nama_siswa" id="pb_nama_siswa" value="{{$peminjaman->pb_nama_siswa}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 form-group">
                        <label for="br_kode" class="form-label">Kode Barang Dipinjam</label>
                        <select class="form-select js-example-basic-single" name="br_kode" id="br_kode">
                            @foreach($barang as $br)
                            <option value="{{$br->br_kode}}" @if ($br->br_kode == $peminjaman->br_kode) selected @endif>{{$br->br_kode}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 form-group col-6">
                        <label for="pb_tgl" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="pb_tgl" id="pb_tgl" value="{{$peminjaman->pb_tgl}}">
                    </div>
                    <div class="mb-3 form-group col-6">
                        <label for="pb_harus_kembali_tgl" class="form-label">Harus Kembali Tanggal</label>
                        <input type="date" class="form-control" name="pb_harus_kembali_tgl" id="pb_harus_kembali_tgl" value="{{$peminjaman->pb_harus_kembali_tgl}}">
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <label for="pb_sts" class="form-label">Status</label>
                    <div class="d-flex gap-2">
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_sts" id="pb_hapus" value="0"
                                @if ($peminjaman->pb_sts == '0') checked @endif>
                            <label for="pb_hapus" class="form-check-label">peminjaman dihapus dari system</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_sts" id="pb_baik" value="1"
                                @if ($peminjaman->pb_sts == '1') checked @endif>
                            <label for="pb_baik" class="form-check-label">peminjaman aktif</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection