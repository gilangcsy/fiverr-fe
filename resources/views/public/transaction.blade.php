<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">VA Number</th>
							<th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($transaction as $item)
							<tr>
								<th scope="row">1</th>
								<td>{{$item->id}}</td>
								<td>{{$item->vaNumber}}</td>
								<td>{{$item->status}}</td>
							</tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
