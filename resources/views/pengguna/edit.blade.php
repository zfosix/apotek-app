@extends('layouts.template')

@section('content')
<form action="{{ route('pengguna.update', $pengguna['id']) }}" method="post" class="card p-5">
@csrf
@method('PATCH')

@if ($errors->any())
<ul class="alert alert-danger p-3">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Anda:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $pengguna['name'] }}">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Email Anda:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $pengguna['email'] }}">
        </div>
    </div>
    
      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Anda:</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-select">
                <option selected disabled hidden>Pilih</option>
                <option value="admin" {{ $pengguna['role'] == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="cashier" {{ $pengguna['role'] == 'cashier' ? 'selected' : '' }}>cashier</option>
            </select>
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Ubah Password Anda?:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" >
        </div>
    </div>


<button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection