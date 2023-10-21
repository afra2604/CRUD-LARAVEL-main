@extends('layouts.layout')
@section('title', 'Tambah Data Buku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-shadow">
                <div class="card-body">
                    <h4>Tambah Buku</h4>
                    <form method="post" action="{{ route('buku.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="form-group">
                            <label for="tgl_terbit">Tgl. Terbit</label>
                            <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/buku" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
