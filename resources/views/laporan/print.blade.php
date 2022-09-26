
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href=" {{ asset('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Laporan</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="2">
                    <thead>
                        <tr>
                            <th>Kode Laporan</th>
                            <th>Nama User</th>
                            <th>Id Transaksi</th>
                            <th>Status Transaksi</th>
                            <th>Metode Transaksi</th>
                            <th>Tanggal Laporan</th>
                            </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @php $i=1 @endphp
                        @foreach($laporan as $row)
                        <td>{{$row->kode}}</td>
                        <td>{{ optional($row->user)->name}}</td>
                        <td>{{ optional($row->transaksi)->idt}}</td>
                        <td>{{ optional($row->transaksi)->status}}</td>
                        <td>{{ optional($row->transaksi)->metode}}</td>
                        <td>{{ $row->tgl }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
