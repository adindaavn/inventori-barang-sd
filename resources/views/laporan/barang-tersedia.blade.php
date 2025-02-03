@extends('layouts.header')
@section('title', 'Laporan Barang Tersedia')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Barang Tersedia</h5>
            <!-- Laporan Barang Tersedia-->
            <div class="table-responsive">
                <table id="example1" class="table table-striped text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Kode</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Jenis</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-bold mb-0">Status</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tersedia as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->br_kode}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal">{{$data->br_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal">{{$data->jns_brg_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                @if ($data->br_sts == '0')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-danger">
                                    dihapus
                                </p>
                                @endif
                                @if ($data->br_sts == '1')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                    kondisi baik
                                </p>
                                @endif
                                @if ($data->br_sts == '2')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-warning">
                                    rusak
                                </p>
                                @endif
                                @if ($data->br_sts == '3')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-dark">
                                    rusak parah
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