@extends('layouts.header')
@section('title', 'Daftar Peminjaman')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-star">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold m-3">Daftar Peminjaman</h5>
            <!-- daftar peminjaman -->
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">ID</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">User ID</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Tanggal</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">No. Siswa</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Nama Siswa</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Batas Pengembalian</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Status</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0"> </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peminjaman as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->pb_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->user_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_tgl}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_no_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_nama_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->pb_harus_kembali_tgl}}</p>
                            </td>
                            <td class="border-bottom-0">
                                @if ($data->pb_sts == '0')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-danger">
                                    dihapus
                                </p>
                                @endif
                                @if ($data->pb_sts == '1')
                                <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                    aktif
                                </p>
                                @endif
                            </td>
                            <td class="border-bottom-0">
                                <a href="{{route('peminjaman.edit', $data->pb_id)}}" class="btn btn-sm btn-inverse-secondary">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <!-- <form action="{{route('peminjaman.destroy', $data->pb_id)}}" method="post">
                                        <a href="{{route('peminjaman.edit', $data->pb_id)}}" class="btn btn-outline-secondary">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="ti ti-eraser"></i>
                                        </button>
                                    </form> -->
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