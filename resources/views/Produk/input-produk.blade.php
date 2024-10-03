@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('UploadProduk') }}" method="post" name="input-form" id="input-form"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Produk / Bahan"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="3"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilih Gambar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="gambar">
                </div>
            </div>
            <div class="d-flex my-4 w-25">
                <div class="input-group input-group-outline">
                    <input class="form-control-radio" type="radio" name="status" id="flexRadioDefault1" value="1"
                        checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Produk
                    </label>
                </div>
                <div class="input-group input-group-outline ">
                    <input class="form-control-radio" type="radio" name="status" value="2" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Bahan
                    </label>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="simpan">Tambah</button>
        </form>
    </div>
@endsection
