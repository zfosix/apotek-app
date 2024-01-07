@extends('layouts.template')

@section('content')
   <div class="jumbotron py-4 px-5">
    @if (Session::get('cantAccess'))
        <div class="alert alert-danger">{{ Session::get('cantAccess') }}</div>
    @endif
    <h1 class="display-4">
        Selamat Datang {{ Auth::user()->name }}!
    </h1>
    <hr class="py-4">
    <p>Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir). Dengan akses yang dibatasi untuk administrator apotek, aplikasi ini memungkinkan mereka mengelola inventaris obat, memantau level stok, dan mencatat pembelian obat oleh kasir. Fungsionalitasnya mencakup manajemen data obat, penataan stok, dan pencatatan transaksi penjualan. Hal ini memastikan keefisienan dalam operasional apotek dan akurasi dalam melacak pergerakan stok obat.
       
    </p>
   </div> 
@endsection