@extends('layouts.header')
@section('title', 'Jenis Barang')
@section('content')
<div class="container-fluid">
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-star">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    @if (session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
    @endif
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Tambah Jenis Barang</h5>
            <form action="{{route('jenis-barang.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="form-group mb-3">
                    <label for="jns_brg_nama" class="form-label">Nama Jenis Barang</label>
                    <input type="text" class="form-control" name="jns_brg_nama" id="jns_brg_nama">
                    @error('jns_brg_nama')
                    <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Daftar Barang</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Kode</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Jenis Barang</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0"> </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenis as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->jns_brg_kode}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->jns_brg_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <form action="{{route('jenis-barang.destroy', $data->jns_brg_kode)}}" method="post">
                                    <!-- <button type="button" class="form-select btn btn-primary" data-bs-toggle="modal" data-bs-target="#barangModal">Pilih Barang</button> -->
                                    <a href="{{route('jenis-barang.edit', $data->jns_brg_kode)}}" class="btn btn-sm btn-inverse-secondary" data-bs-toggle="modal" data-bs-target="#jenisModal">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-inverse-danger">
                                        <i class="ti ti-eraser"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="modal fade" id="jenisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Edit Jenis Barang</h5>
                        <form action="{{route('jenis-barang.store')}}" method="post" class="form-sample">
                            @csrf
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection