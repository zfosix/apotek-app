@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between my-3">

            <div class="row w-100 ml-2">
                <form action="{{ route('order.kasir.tanggal_filter') }}" method="POST" class="row g-3 align-items-center">
                    @csrf 
                    <div class="col-4">
                        <input type="date" name="search" id="search" value="{{ request('search') }}" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-info m-1" id="cari_date"><i data-feather="search"></i> Cari Data</button>
                        <button class="btn btn-outline-secondary m-1" id="clear_data" type="reset">Clear</button>
                        @if(request('search'))
                            <a href="{{ route('order.kasir.index') }}" class="btn btn-secondary m-1">Clear Filter</a>
                        @endif
                    </div>
                </form>
            </div>
            
   
            <a href="{{ route('kasir.order.create') }}" class="btn btn-primary"><i data-feather="dollar-sign"></i> Beli Baru!</a>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Pembeli</th>
                    <th>Obat</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_customer }}</td>
                        <td>
                            @foreach ($item->medicines as $medicine)
                                <ol>
                                    <li>
                                        {{ $medicine['name_medicine'] }} {{ number_format($medicine['price'], 0, ',', '.') }}:
                                        Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>qty {{ $medicine['qty'] }}</small>
                                    </li>
                                </ol>
                            @endforeach
                        </td>
                        <td>Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            @php \Carbon\Carbon::setLocale('id_ID') @endphp
                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            <a href="{{ route('kasir.order.download', $item->id )}}" class="btn btn-secondary"><i class="ri-install-line"></i> Download</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection
