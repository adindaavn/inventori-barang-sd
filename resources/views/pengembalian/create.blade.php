@extends('layouts.header')
@section('title', 'Form Pengembalian')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-bold mx-3">Form Pengembalian</h5>
            <form action="{{route('pengembalian.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="mb-3 form-group col-6">
                    <label for="pb_id" class="form-label">ID Peminjaman</label>
                    <select class="form-select js-example-basic-single" name="pb_id" id="pb_id">
                        @foreach($peminjaman as $pb)
                        @if ($pb->pb_sts == '1')
                        <option value="{{$pb->pb_id}}">{{$pb->pb_id}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('pb_id')
                    <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection