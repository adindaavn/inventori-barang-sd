@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Daftar Tanggapan</h5>
                <a href="{{route('tanggapan.create')}}" class="btn btn-outline-primary mb-3">
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
                                <h6 class="fw-semibold mb-0">Id Pengaduan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggapan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id Petugas</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tanggapan as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$data->id_tanggapan}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal">{{$data->id_pengaduan}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->tgl_tanggapan}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->tanggapan}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->id_petugas}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <form action="{{route('tanggapan.destroy', $data->id_tanggapan)}}" method="post">
                                    <a href="{{route('tanggapan.edit', $data->id_tanggapan)}}" class="btn btn-outline-secondary">
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