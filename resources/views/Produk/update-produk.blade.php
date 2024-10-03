@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/produkedit/edit/' . $produk->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Code product</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode_produk" name="kode_produk"
                        value="{{ $produk->id_reference }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Product</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                        value="{{ $produk->nama_produk }}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Product</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Produk" rows="3">{{ $produk->deskripsi }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilih Gambar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="gambar" value="{{ $produk->gambar }}">
                </div>
            </div>
            <div class="d-flex my-4 w-25">
                <div class="input-group input-group-outline">
                    <input class="form-control-radio" type="radio" name="status" id="flexRadioDefault1" value="1"
                        {{ $produk->status == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Produk
                    </label>
                </div>
                <div class="input-group input-group-outline">
                    <input class="form-control-radio" type="radio" name="status" value="2" id="flexRadioDefault2"
                        {{ $produk->status == 2 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Bahan
                    </label>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="simpan">Update</button>
            <a href="{{ route('Produk') }}" class="btn btn-danger">Batal</a>
        </form>
    </div>
@endsection
