@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Tanggapan</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tanggapan.update', $tanggapan->id_tanggapan)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="id_pengaduan" class="form-label">Id Pengaduan</label>
                            <select name="id_pengaduan" id="id_pengaduan" class="form-select" required>
                                @foreach($pengaduan as $pengaduan)
                                <option value="{{$pengaduan->id_pengaduan}}"
                                    @if($pengaduan->id_pengaduan == $tanggapan->id_pengaduan) selected @endif>
                                    {{$pengaduan->id_pengaduan}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_tanggapan" class="form-label">Tanggal Tanggapan</label>
                            <input type="date" class="form-control" name="tgl_tanggapan" id="tgl_tanggapan" value="{{$tanggapan->tgl_tanggapan}}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggapan" class="form-label">Tanggapan</label>
                            <input type="text" class="form-control" name="tanggapan" id="tanggapan" value="{{$tanggapan->tanggapan}}">
                        </div>
                        <div class="mb-3">
                            <label for="id_petugas" class="form-label">Id Petugas</label>
                            <select name="id_petugas" id="id_petugas" class="form-select" required>
                                @foreach($petugas as $petugas)
                                <option value="{{$petugas->id_petugas}}"
                                    @if($petugas->id_petugas == $tanggapan->id_petugas) selected @endif>
                                    {{$petugas->id_petugas}}
                                </option>
                                @endforeach
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