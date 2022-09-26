<table>
    <thead>
        <tr>
            <th>Kode Laporan</th>
            <th>Nama User</th>
            <th>Id Transaksi</th>
            <th>Status Transaksi</th>
            <th>Metode Transaksi</th>
            <th>Tanggal Laporan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporan as $row)
        <tr>
        <td>{{$row->kode}}</td>
        <td>{{ optional($row->user)->name}}</td>
        <td>{{ optional($row->transaksi)->idt}}</td>
        <td>{{ optional($row->transaksi)->status}}</td>
        <td>{{ optional($row->transaksi)->metode}}</td>
        <td>{{ $row->tgl }}</td>
        </tr>
        @endforeach
    </tbody>
</table>>
