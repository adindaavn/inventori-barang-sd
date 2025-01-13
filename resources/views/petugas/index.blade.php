@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Daftar Petugas</h5>
                <a href="{{route('petugas.create')}}" class="btn btn-outline-primary mb-3">
                    <i class="ti ti-plus"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Username</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Password</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No. Telp</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Level</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petugas as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$data->id_petugas}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal">{{$data->nama_petugas}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->username}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->password}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->telp}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-3 fw-semibold
                                    @if($data->level == 'admin') bg-primary @endif
                                    @if($data->level == 'petugas') bg-success @endif
                                    ">{{$data->level}}</span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <form action="{{route('petugas.destroy', $data->id_petugas)}}" method="post">
                                    <a href="{{route('petugas.edit', $data->id_petugas)}}" class="btn btn-outline-secondary">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="ti ti-eraser"></i>
                                    </button>
                                </form>
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