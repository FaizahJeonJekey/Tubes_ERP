@extends('layouts.master')
@section('content')
<div class="container">
    <form action="{{ Route('UploadProdukSQ') }}" method="post" name="input-form" id="input-form">
        {{ csrf_field() }}
            <div class="col-sm-10">
                <input type="text" class="form-control" name="id_sq" id="id_sq" value="{{$sq->id}}" hidden>
            </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="customer" value="{{$sq->nama_vendor.' - '.$sq->alamat}}" name="customer" readonly>
            </div>
        </div>

        @if($sq->status == 0)
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Pilih Produk</label>
            <div class="col-sm-10">
            <div class="dropdown">
                <select class="form-select" name="kode_produk">
                    @if($produk->count())
                    @foreach($produk as $item)
                    <option value="{{$item->id}}">{{$item->nama_produk}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            </div>
        </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Banyak</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="qty" id="qty"  required>
                </div>
                <input type="text" class="form-control" name="satuan" value="pcs" id="satuan" hidden>
            </div>
        <div class="form-group mt-3">

            <button type="submit" name="simpan" class="btn btn-primary">Add Produk</button>
        </div>
        @endif
    </form>
</div>
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-body">
            <br>
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Banyak</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($sqlist->count())
            @foreach($sqlist as $item)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$item->kode_produk}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->qty}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{$item->harga}}</td>
                @php
                {{
                    $total = $item->harga * $item->qty;
                }}
                @endphp
                <td>{{$total}}</td>
                @if($sq->status == 0)
                <td>
                    <a href="{{ url('product/bom-delete-item/'.$item->kode_bom_list) }}" class="btn btn-danger delete-confirm" role="button">Hapus</a>
                </td>
                @else
                <td>
                </td>
                @endif
            </tr>
            @endforeach
            @endif
        </tbody>
        </tbody>

    </table>
        </div>
    </div>
        <div class="container-sm ">
            <div class="row"></div>     
            <div class="row mt-auto p-2 bd-highlight">
                <label for="text_harga" class="font-weight-bold"> Total Harga : </label>
                <label for="total_harga" id="val"> XXXXX</label>
            </div>
        </div>
    <div class="form-group mt-3">

    </div>
    @if($sq->status == 0)
    <a href="{{'/SQ/data/list/save/'.$sq->id}}" class="btn btn-primary">Make Order</a>
    @elseif($sq->status == 1)
    <a href="{{'/SQ/data/list/cek/'.$sq->id}}" class="btn btn-warning">Check Availability</a>
    @endif
</div>
@endsection