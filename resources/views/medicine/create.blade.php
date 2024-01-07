@extends('layouts.template')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('medicine.store') }}" method="POST" class="card p-5">
            @csrf

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <h1 class="mb-5">Form Penambahan Obat</h1>

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Obat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Jenis Obat</label>
                <div class="col-sm-10">
                    <select class="form-select" name="type" id="type" required>
                        <option selected disabled hidden>Pilih</option>
                        <option value="tablet">Tablet</option>
                        <option value="sirup">Sirup</option>
                        <option value="kapsul">Kapsul</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga obat</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Tambah</button>
        </form>
    </div>
@endsection
