@extends('layouts.template')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('pengguna.daftar') }}" method="post" class="card p-5 shadow-sm">
            @csrf

            @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <h1 class="mb-5">Form Penambahan User</h1>

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Anda:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email Anda:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label">Role Anda:</label>
                <div class="col-sm-10">
                    <select class="form-select" name="role" id="role" required>
                        <option selected disabled hidden>Pilih</option>
                        <option value="admin">Admin</option>
                        <option value="cashier">Cashier</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
        </form>
    </div>
@endsection
