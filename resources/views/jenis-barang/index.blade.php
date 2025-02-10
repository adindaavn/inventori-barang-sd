@extends('layouts.header')
@section('title', 'Jenis Barang')
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
                <h5 class="card-title fw-bold m-3">Jenis Barang</h5>
                <button type="button" class="btn btn-primary btn-sm btn-add fw-bold fs-6 text-white" data-bs-toggle="modal" data-bs-target="#jenisModal">+</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Kode</p>
                            </th>
                            <th class="border-bottom-0">
                                <p class="fw-bold mb-0">Jenis Barang</p>
                            </th>
                            <th class="border-bottom-0 text-center" style="width: 10%;">
                                <p class="fw-bold m-0"> </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenis as $data)
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-semibold mb-0">{{$data->jns_brg_kode}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0">{{$data->jns_brg_nama}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <a href="javascript:void(0)" class="btn btn-sm btn-inverse-secondary btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#jenisModal"
                                    data-kode="{{$data->jns_brg_kode}}"
                                    data-nama="{{$data->jns_brg_nama}}">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-inverse-danger btn-delete"
                                    data-id="{{$data->jns_brg_kode}}"
                                    data-action="{{route('jenis-barang.destroy', $data->jns_brg_kode)}}">
                                    <i class="ti ti-eraser"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="jenisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form id="jenisForm" action="{{route('jenis-barang.store')}}" method="post" class="form-sample m-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 id="modalTitle" class="card-title fw-bold">Tambah Jenis Barang</h5>
                        <button type="button" class="btn btn-sm btn-reverse card-title fw-bold" data-bs-dismiss="modal">x</button>
                    </div>
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="jns_brg_kode" id="jns_brg_kode">
                    <div class="form-group mb-3">
                        <label for="jns_brg_nama" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control" name="jns_brg_nama" id="jns_brg_nama" required>
                        @error('jns_brg_nama')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika tombol "Tambah" ditekan
        $('.btn-add').click(function() {
            $('#modalTitle').text('Tambah Jenis Barang');
            $('#jenisForm').attr('action', "{{ route('jenis-barang.store') }}");
            $('#formMethod').val('POST'); // Pastikan method tetap POST
            $('#jns_brg_nama').val(''); // Reset input
            $('#jns_brg_kode').val('');
        });

        // Ketika tombol "Edit" ditekan
        $('.btn-edit').click(function() {
            let kode = $(this).data('kode');
            let nama = $(this).data('nama');

            $('#modalTitle').text('Edit Jenis Barang');
            $('#jenisForm').attr('action', '/jenis-barang/' + kode);
            $('#formMethod').val('PUT'); // Ubah method ke PUT
            $('#jns_brg_nama').val(nama);
            $('#jns_brg_kode').val(kode);
        });
    });
</script>
@endsection