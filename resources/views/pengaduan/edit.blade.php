@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pengaduan</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pengaduan.update', $pengaduan->id_pengaduan)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
                            <input type="date" class="form-control" name="tgl_pengaduan" id="tgl_pengaduan" value="{{$pengaduan->tgl_pengaduan}}">
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <select name="nik" id="nik" class="form-select" required>
                                @foreach($masyarakat as $m)
                                <option value="{{$m->nik}}"
                                    @if($m->nik == $pengaduan->nik) selected @endif>
                                    {{$m->nik}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label">Isi Laporan</label>
                            <textarea class="form-control" name="isi_laporan" id="isi_laporan">{{$pengaduan->isi_laporan}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" accept=".png, .jpg, .jpeg" onchange="previewFoto()" required>
                            <img src="{{asset('storage/foto/'.$pengaduan->foto)}}" class="foto-preview mt-2" style="width: 100px;">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="0" @if($pengaduan->status == '0') selected @endif>0</option>
                                <option value="proses" @if($pengaduan->status == 'proses') selected @endif>proses</option>
                                <option value="selesai" @if($pengaduan->status == 'selesai') selected @endif>selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection