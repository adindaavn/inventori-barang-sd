@extends('layouts.header')
@section('title', 'Daftar Peminjaman')
@section('content')
<div class="container-fluid">
    <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#peminjaman" role="tab" aria-controls="peminjaman" aria-selected="true">Peminjaman Aktif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#histori" role="tab" aria-selected="false">Riwayat Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#dipinjam" role="tab" aria-selected="false">Barang Dipinjam</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                </li> -->
            </ul>
        </div>

        <div class="tab-content tab-content-basic">
            <!-- peminjaman -->
            <div class="tab-pane fade show active" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-bold m-3">Peminjaman Aktif</h5>
                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm btn-add fw-bold fs-6 text-white">+</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- daftar peminjaman -->
                        <div class="table-responsive">
                            <table id="tablePeminjaman" class="table table-striped table-bordered mb-0 align-middle">
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
                                            <p class="fw-bold mb-0">Batas Peminjaman</p>
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
                                    @if ($data->pb_sts == '1')
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
                                            <p class="mb-0">{{$data->pb_harus_kembali_tgl}}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($data->pb_sts == '0')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                                dihapus
                                            </p>
                                            @elseif($data->pb_sts == '1')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-info">
                                                aktif
                                            </p>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <button type="button" class="btn btn-sm btn-success text-white btn-kembali"
                                                data-id="{{$data->pb_id}}"
                                                data-action="{{route('pengembalian.store', $data->pb_id)}}">
                                                Kembali
                                            </button>
                                            <!-- <a href=" {{route('peminjaman.edit', $data->pb_id)}}" class="btn btn-sm btn-inverse-secondary">
                                                <i class="ti ti-pencil"></i>
                                                </a> -->
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
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- history -->
            <div class="tab-pane fade" id="histori" role="tabpanel" aria-labelledby="histori">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-bold m-3">Riwayat Peminjaman</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- daftar peminjaman -->
                        <div class="table-responsive">
                            <table id="tableHistori" class="table table-striped table-bordered mb-0 align-middle">
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
                                            <p class="fw-bold mb-0">Batas Peminjaman</p>
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
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                                dikembalikan
                                            </p>
                                            @elseif($data->pb_sts == '1')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-info">
                                                aktif
                                            </p>
                                            @endif
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="{{route('peminjaman.edit', $data->pb_id)}}" class="btn btn-sm btn-inverse-secondary">
                                                <i class="ti ti-pencil"></i>
                                            </a>
                                            <!-- @if ($data->pb_sts == '0')
                                            <button type="button" class="btn btn-sm btn-inverse-danger btn-delete"
                                                data-id="{{$data->pb_id}}"
                                                data-action="{{route('peminjaman.destroy', $data->pb_id)}}">
                                                <i class="ti ti-eraser"></i>
                                            </button>
                                            @endif -->
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
            <!-- dipinjam -->
            <div class="tab-pane fade" id="dipinjam" role="tabpanel" aria-labelledby="dipinjam">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-bold m-3">Barang Dipinjam</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- daftar peminjaman -->
                        <div class="table-responsive">
                            <table id="tableDipinjam" class="table table-striped table-bordered mb-0 align-middle">
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
        </div>

    </div>
</div>
@endsection