@extends('layouts.header')
@section('title', 'Status Barang')
@section('content')
<div class="container-fluid">
    <div class="home-tab">
        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                </li>
            </ul>
        </div>
        <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title fw-bold m-3">Status Barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered text-nowrap mb-0 align-middle">
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
                                            <h6 class="fw-bold mb-0">Status</h6>
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
                                                kondisi baik
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