@extends('layouts.header')
@section('title', 'Barang Belum Kembali')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Barang Belum Kembali</h5>
            <!-- daftar barang belum kembali -->
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Kode</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Nama</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">No Siswa Peminjam</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Nama Siswa Peminjam</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Tanggal Pinjam</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dipinjam as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->br_kode}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->br_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_no_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_nama_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_tgl}}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection