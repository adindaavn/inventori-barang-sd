@extends('layouts.header')
@section('title', 'Tambah Peminjaman')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold m-3">Tambah Peminjaman</h5>
            <form action="{{route('peminjaman.store')}}" method="post" class="form-sample mx-3">
                @csrf
                <div class="row">
                    <div class="mb-3 form-group col-6">
                        <label for="pb_no_siswa" class="form-label">No Siswa</label>
                        <input type="text" class="form-control" name="pb_no_siswa" id="pb_no_siswa">
                    </div>
                    <div class="mb-3 form-group col-6">
                        <label for="pb_nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" name="pb_nama_siswa" id="pb_nama_siswa">
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
                <!-- <div class="row">
                    <div class="mb-3 form-group">
                        <label for="br_kode" class="form-label">Barang Dipinjam</label>

                        <button type="button" class="form-select btn btn-primary" data-bs-toggle="modal" data-bs-target="#defaultModal">Launch demo modal</button>

                        <select class="form-select js-example-basic-multiple w-100" multiple="multiple" name="br_kode" id="br_kode">

                            <select class="form-select js-example-basic-single" name="br_kode" id="br_kode">
                            @foreach($barang as $br)
                            <option value="{{$br->br_kode}}">{{$br->br_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <div class="row">
                    <div class="mb-3 form-group col-6">
                        <label for="pb_tgl" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="pb_tgl" id="pb_tgl">
                    </div>
                    <div class="mb-3 form-group col-6">
                        <label for="pb_harus_kembali_tgl" class="form-label">Harus Kembali Tanggal</label>
                        <input type="date" class="form-control" name="pb_harus_kembali_tgl" id="pb_harus_kembali_tgl">
                    </div>
                </div>
                <div class="mb-3 form-group">
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
                </div>
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
                                    <h6 class="fw-bold mb-0">Nama Barang</h6>
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
                                    <button type="button" class="btn btn-success btn-sm pilih-barang" data-kode="{{ $data->br_kode }}" data-nama="{{ $data->br_nama }}">Select</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectedItems = document.getElementById("selected-items");
        const selectedItemsBody = document.getElementById("selected-items-body");

        document.querySelectorAll(".pilih-barang").forEach((btn) => {
            btn.addEventListener("click", function() {
                const brKode = this.getAttribute("data-kode");
                const brNama = this.getAttribute("data-nama");

                // Check if the item is already selected
                if (!document.getElementById(`item-${brKode}`)) {
                    // Add the selected item to the table
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
                    selectedItemsBody.insertAdjacentHTML("beforeend", row);

                    selectedItems.classList.remove("d-none");

                    this.textContent = "Selected";
                    this.classList.replace("btn-primary", "btn-secondary");
                    this.disabled = true;
                }
            });
        });

        // Remove item on "Hapus" button click
        selectedItemsBody.addEventListener("click", function(event) {
            if (event.target.classList.contains("hapus-barang")) {
                const itemId = event.target.getAttribute("data-item-id");

                // Remove the item row from the table
                document.getElementById(`item-${itemId}`).remove();

                // Re-enable the "Pilih" button and reset its text
                const selectButton = document.querySelector(`.pilih-barang[data-kode="${itemId}"]`);
                if (selectButton) {
                    selectButton.textContent = "Select";
                    selectButton.classList.replace("btn-secondary", "btn-primary");
                    selectButton.disabled = false;
                }

                // Hide the table if no items remain
                if (selectedItemsBody.children.length === 0) {
                    selectedItems.classList.add("d-none");
                }
            }
        });
    });
</script>
@endsection