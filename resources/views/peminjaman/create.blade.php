@extends('layouts.header')
@section('title', 'Tambah Peminjaman')
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
        <div class="card-body">
            <h5 class="card-title fw-semibold m-3">Tambah Peminjaman</h5>
            <form action="{{route('peminjaman.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="pb_no_siswa" class="form-label">Siswa</label>
                        <select class="form-select js-example-basic-single" name="pb_no_siswa" id="pb_no_siswa">
                            @foreach($siswa as $s)
                            <option value="{{$s->no_siswa}}" data-nama="{{$s->nama_siswa}}">
                                ({{$s->no_siswa}}) {{$s->nama_siswa}} {{$s->kls_siswa}}
                            </option>
                            @endforeach
                        </select>
                        <input type="hidden" id="pb_nama_siswa" name="pb_nama_siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 form-group">
                        <label for="br_kode" class="form-label">Barang Dipinjam</label>
                        <button type="button" class="form-select btn btn-primary" data-bs-toggle="modal" data-bs-target="#barangModal">Pilih Barang</button>
                        <div id="selected-items" class="mt-2 d-none">
                            <table class="table text-nowrap mb-0 align-middle table-bordered">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Kode Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0">Nama Barang</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-bold mb-0"> </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="selected-items-body">
                                    <!-- Dynamically populated -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="mb-3 form-group col-6">
                        <label for="pb_tgl" class="form-label">Tanggal Peminjaman</label>
                        <input type="datetime-local" class="form-control" name="pb_tgl" id="pb_tgl">
                    </div> -->
                    <div class="mb-3 form-group col-6">
                        <label for="pb_harus_kembali_tgl" class="form-label">Harus Kembali Tanggal</label>
                        <input type="datetime-local" class="form-control" name="pb_harus_kembali_tgl" id="pb_harus_kembali_tgl">
                    </div>
                </div>
                <!-- <div class="mb-3 form-group">
                    <label for="pb_sts" class="form-label">Status</label>
                    <div class="d-flex gap-2">
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_sts" id="pb_hapus" value="0">
                            <label for="pb_hapus" class="form-check-label">peminjaman dihapus dari system</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="pb_sts" id="pb_baik" value="1">
                            <label for="pb_baik" class="form-check-label">peminjaman aktif</label>
                        </div>
                    </div>
                </div> -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Barang</h5>
                <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="order-listing" class="table text-nowrap mb-0 align-middle">
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
                                <th class="border-bottom-0">
                                    <h6 class="fw-bold mb-0"> </h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tersedia as $data)
                            <tr>
                                <td class="border-bottom-0">
                                    <p class="fw-semibold mb-0">{{$data->br_kode}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="fw-normal">{{$data->br_nama}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="fw-normal">{{$data->jns_brg_nama}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    @if ($data->br_sts == '0')
                                    <p class="m-0 btn btn-sm btn-rounded btn-inverse-danger">
                                        dihapus
                                    </p>
                                    @endif
                                    @if ($data->br_sts == '1')
                                    <p class="m-0 btn btn-sm btn-rounded btn-inverse-primary">
                                        kondisi baik
                                    </p>
                                    @endif
                                    @if ($data->br_sts == '2')
                                    <p class="m-0 btn btn-sm btn-rounded btn-inverse-warning">
                                        rusak
                                    </p>
                                    @endif
                                    @if ($data->br_sts == '3')
                                    <p class="m-0 btn btn-sm btn-rounded btn-inverse-dark">
                                        rusak parah
                                    </p>
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <button type="button" class="btn btn-success btn-sm pilih-barang" data-kode="{{ $data->br_kode }}" data-nama="{{ $data->br_nama }}">Pilih</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var firstNamaSiswa = $("#pb_no_siswa").find(":selected").data("nama");
        $("#pb_nama_siswa").val(firstNamaSiswa); // Set nilai awal

        $("#pb_no_siswa").on("change", function() {
            var namaSiswa = $(this).find(":selected").data("nama");
            $("#pb_nama_siswa").val(namaSiswa);
        });
    });
</script>

<script>
    $(document).ready(function() {
        const $selectedItems = $("#selected-items");
        const $selectedItemsBody = $("#selected-items-body");

        $(".pilih-barang").on("click", function() {
            const brKode = $(this).data("kode");
            const brNama = $(this).data("nama");

            // Cek apakah item sudah dipilih
            if (!$(`#item-${brKode}`).length) {
                // Tambahkan item ke dalam tabel
                const row = `
                <tr id="item-${brKode}">
                    <td>
                        <input type="hidden" name="br_kode[${brKode}]" value="${brKode}">
                        ${brKode}
                    </td>
                    <td>${brNama}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm hapus-barang" data-item-id="${brKode}">
                            Hapus
                        </button>
                    </td>
                </tr>
                `;
                $selectedItemsBody.append(row);

                $selectedItems.removeClass("d-none");

                $(this).text("Dipilih").removeClass("btn-primary").addClass("btn-secondary").prop("disabled", true);
            }
        });

        // Hapus item ketika tombol "Hapus" diklik
        $selectedItemsBody.on("click", ".hapus-barang", function() {
            const itemId = $(this).data("item-id");

            // Hapus baris dari tabel
            $(`#item-${itemId}`).remove();

            // Aktifkan kembali tombol "Pilih"
            const $selectButton = $(`.pilih-barang[data-kode="${itemId}"]`);
            if ($selectButton.length) {
                $selectButton.text("Pilih").removeClass("btn-secondary").addClass("btn-primary").prop("disabled", false);
            }

            // Sembunyikan tabel jika tidak ada item yang tersisa
            if ($selectedItemsBody.children().length === 0) {
                $selectedItems.addClass("d-none");
            }
        });
    });
</script>
@endsection