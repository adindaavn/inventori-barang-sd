@extends('layouts.header')
@section('title', 'Laporan')
@section('content')
<div class="container-fluid">
    <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#tersedia" role="tab" aria-controls="tersedia" aria-selected="true">Barang Tersedia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#pengembalian" role="tab" aria-selected="false">Pengembalian Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#status" role="tab" aria-selected="false">Status Barang</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                </li> -->
            </ul>
        </div>
        <div class="tab-content tab-content-basic">
            <!-- tersedia -->
            <div class="tab-pane fade show active" id="tersedia" role="tabpanel" aria-labelledby="tersedia">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title fw-bold m-3">Barang Tersedia</h5>
                    </div>
                    <div class="card-body">
                        <!-- Laporan Barang Tersedia-->
                        <form action="" method="post">
                            <div class="d-flex align-items-center mb-2">
                                <div class="input-group input-daterange d-flex align-items-center">
                                    <input type="date" name="dateFrom" class="form-control">
                                    <div class="input-group-addon mx-4">to</div>
                                    <input type="date" name="dateTo" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary text-white mx-2">></button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="tableTersedia" class="table table-striped table-bordered align-middle">
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
                                            <h6 class="fw-bold mb-0">Kondisi</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Tgl Terima</h6>
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
                                                baik
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
                                            <p class="fw-normal">{{$data->br_tgl_terima}}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pengembalian -->
            <div class="tab-pane fade" id="pengembalian" role="tabpanel" aria-labelledby="pengembalian">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title fw-bold m-3">Pengembalian Barang</h5>
                    </div>
                    <div class="card-body">
                        <!-- Laporan Pengembalian Barang -->
                        <div class="table-responsive">
                            <table id="tablePengembalian" class="table table-striped table-bordered align-middle">
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
            <!-- status -->
            <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title fw-bold m-3">Status Barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableStatus" class="table table-striped table-bordered align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Kode Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Jenis Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Nama Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Kondisi</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($status as $data)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <p class="fw-semibold mb-0">{{$data->br_kode}}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{$data->jns_brg_nama}}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">{{$data->br_nama}}</p>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($data->br_sts == '0')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-danger">
                                                dihapus
                                            </p>
                                            @elseif ($data->br_sts == '1')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                                baik
                                            </p>
                                            @elseif ($data->br_sts == '2')
                                            <p class="m-0 btn btn-sm btn-rounded btn-inverse-warning">
                                                rusak
                                            </p>
                                            @elseif ($data->br_sts == '3')
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
        </div>
    </div>
</div>
@endsection