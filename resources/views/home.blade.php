@extends('layouts.header')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                    </li> -->
                </ul>
                <div>
                    <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                    </div>
                </div>
            </div>
            <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="d-sm-flex justify-content-between align-items-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Grafik Transaksi Peminjaman</h4>
                                                    <h5 class="card-subtitle card-subtitle-dash">Grafik transaksi peminjaman setiap hari.</h5>
                                                </div>
                                                <div id="performanceLine-legend"></div>
                                            </div>
                                            <div class="chartjs-wrapper mt-4">
                                                <canvas id="performanceLine" width=""></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                            <div class="row flex-grow">
                                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                    <div class="card bg-primary card-rounded">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-dash text-white">Total Entry Barang</h4>
                                            <div class="row">
                                                <p class="status-summary-ight-white">Jumlah barang yang sudah dientry </p>
                                                <h2 class="text-white">{{ $brg }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                    <div class="card bg-primary card-rounded">
                                        <div class="card-body">
                                            <h4 class="card-title card-title-dash text-white">Total Peminjaman</h4>
                                            <div class="row">
                                                <p class="status-summary-ight-white">Jumlah transaksi peminjaman</p>
                                                <h2 class="text-white">{{ $pinjam }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const dailyCounts = @json($transaksi);
</script>

@endsection