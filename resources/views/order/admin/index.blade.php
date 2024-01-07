@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="my-5 d-flex justify-content-end">
            <a href="{{ route('order.export-excel') }}" class="btn btn-success">Export (excel)</a>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Pembeli</th>
                    <th>Obat</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th>Tanggal Beli</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $item->nama_customer }}</td>
                        <td>
                            @foreach ($item->medicines as $medicine)
                                <ol>
                                    <li>
                                        {{ $medicine['name_medicine'] }} ({{ number_format($medicine['price'], 0, ',', '.') }}) : Rp. {{ number_format($medicine['sub_price'], 0, ',', '.') }} <small>qty {{ $medicine['qty'] }}</small>
                                    </li>
                                </ol>
                            @endforeach
                        </td>
                        <td>Rp. {{ number_format($item->total_price, 0, ',', '.') }}</td>
                        <td>
                            {{ $item->user->name }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            <a href="{{ route('kasir.order.download', $item->id )}}" class="btn btn-outline-danger">Unduh (.pdf)</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection
