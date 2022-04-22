<div>
    {{-- hello {{ $message }} --}}
    {{-- hi {{ $reference }} --}}
    {{-- <button wire:click="clickTest">test</button> --}}
    <table id="datatable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                {{-- <th>Nama</th> --}}
                <th>Nominal</th>
                <th>Status</th>
                <th>Untuk</th>
                <th>Tgl Request</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $item)
                @php
                    $status = $item->status;
                    if ($status == 'unpaid') {
                        $status = '<span class="btn badge bg-warning">BELUM</span>';
                    } elseif ($status == 'paid') {
                        $status = '<span class="btn badge bg-success">LUNAS</span>';
                    }
                @endphp
                <tr>
                    <td>{{ $item->reference }}</td>
                    {{-- <td>{{ $item->user->name }}</td> --}}
                    <td>{{ $item->total_amount }}</td>
                    <td>{!! $status !!}</td>
                    <td>{{ $item->bill_type->name }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMM Y H:m') }}</td>
                    <td>
                        @if ($item->status == 'unpaid')
                            <button wire:click="bayar({{ $item->id }})" class="btn badge bg-primary">Bayar</button>
                        @else
                            <button wire:click="belumbayar({{ $item->id }})" class="btn badge bg-primary">Ubah ke
                                Belum</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
