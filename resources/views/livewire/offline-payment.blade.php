<div>
    {{-- hello {{ $message }} --}}
    {{-- hi {{ $reference }} --}}
    {{-- <button wire:click="clickTest">test</button> --}}
    <table id="datatable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Untuk</th>
                <th>Aksi</th>
                <th>Tgl Request</th>
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
                    <td>{{ $item->user->nama_lengkap }}</td>
                    <td>{{ $item->total_amount }}</td>
                    <td>{!! $status !!}</td>
                    <td>{{ $item->bill_type->name }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->isoFormat('D MMM Y H:m') }}</td>
                    <td>
                        <button wire:click="bayar({{ $item->id }})" class="btn badge bg-primary">Bayar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
