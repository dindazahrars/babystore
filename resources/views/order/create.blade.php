<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Order</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('form/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Order</h2>
                </div>
                <div class="card-body">
                    <form class="custom-validation" method="POST" action="{{ route('order.store') }}"  novalidate="">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                         <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                         </ul>
                        </div>
                        @endif

                        <div class="form-row">
                            <div class="name">Nama Product</div>
                            <div class="value">
                                <select name="id" class="form-control">
                                    <option value="">Choose Product</option>
                                    @foreach ($barang as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Total</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="text" name="harga" class="form-control" required="" placeholder="Silahkan input nama">
                                </div>
                            </div>
                        </div>

                <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit">Send Application</button>

                </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('form/vendor/jquery/jquery.min.js')}}"></script>


    <!-- Main JS-->
    <script src="{{asset('form/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
