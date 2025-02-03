@extends('layouts.header')
@section('title', 'Pengembalian Barang')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Pengembalian Barang</h5>
            <!-- Laporan Pengembalian Barang -->
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Peminjaman ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">User ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Status</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengembalian as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->kembali_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->pb_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->user_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->kembali_tgl}}</p>
                            </td>
                            <td class="border-bottom-0">
                                @if ($data->kembali_sts == '0')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                    dikembalikan
                                </p>
                                @endif
                                @if ($data->kembali_sts == '1')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-danger">
                                    dipinjam
                                </p>
                                @endif
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