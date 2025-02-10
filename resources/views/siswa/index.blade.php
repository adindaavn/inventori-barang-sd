@extends('layouts.header')
@section('title', 'Siswa')
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
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title fw-bold m-3">Siswa</h5>
                <button type="button" class="btn btn-primary btn-sm btn-add fw-bold fs-6 text-white" data-bs-toggle="modal" data-bs-target="#jenisModal">+</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0" style="width: 10%;">
                                <p class="fw-bold mb-0">No</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Nama</p>
                            </th>
                            <th class="border-bottom-0 text-center">
                                <p class="fw-bold m-0">Kelas</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->no_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->nama_siswa}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->kls_siswa}}</p>
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