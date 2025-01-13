@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Pengaduan Masyarakat</h5>
                <a href="{{route('pengaduan.create')}}" class="btn btn-outline-primary mb-3">
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
                                <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">NIK</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Isi Laporan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Foto</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$data->id_pengaduan}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal">{{$data->tgl_pengaduan}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->nik}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$data->isi_laporan}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <img class="mb-0" src="{{asset('storage/foto/'.$data->foto)}}" alt="" width="100">
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge rounded-3 fw-semibold
                                    @if($data->status == '0') bg-danger @endif
                                    @if($data->status == 'proses') bg-primary @endif
                                    @if($data->status == 'selesai') bg-success @endif
                                    ">{{$data->status}}</span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <form action="{{route('pengaduan.destroy', $data->id_pengaduan)}}" method="post">
                                    <a href="{{route('pengaduan.edit', $data->id_pengaduan)}}" class="btn btn-outline-secondary">
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