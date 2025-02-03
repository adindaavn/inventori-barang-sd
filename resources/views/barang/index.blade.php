@extends('layouts.header')
@section('title', 'Daftar Barang')
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
            <h5 class="card-title fw-bold m-3">Daftar Barang</h5>
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
                                <p class="fw-bold mb-0">Jenis</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">User Id</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Tanggal Terima</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Tanggal Entry</p>
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
                        @foreach($barang as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->br_kode}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->br_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">
                                    @foreach($jns as $j)
                                        @if ($j->jns_brg_kode == $data->jns_brg_kode)
                                            {{$j->jns_brg_nama}}
                                        @endif
                                    @endforeach
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->user_id}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->br_tgl_terima}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->br_tgl_entry}}</p>
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
                            <td class="border-bottom-0">
                                <a href="{{route('barang.edit', $data->br_kode)}}" class="btn btn-sm btn-inverse-secondary">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <!-- <form action="{{route('barang.destroy', $data->br_kode)}}" method="post">
                                    <a href="{{route('barang.edit', $data->br_kode)}}" class="btn btn-sm btn-inverse-secondary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-inverse-danger">
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