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
            <div class="col-8">
                <h1>detail page</h1>
                @foreach ($service as $item)
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ $devHostStorage }}service/{{$item->Service->thumbnail}}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            {{$item->Service->title}}
                        </p>
						<p>
							{!! $item->Service->description !!}
						</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-4">
                <h1>Plans</h1>
                <p>
					@foreach ($service as $item)
                    	<a class="btn btn-primary" data-toggle="collapse" href="#{{$item->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
							{{$item->ServicePlan->title}}
						</a>
					@endforeach
                </p>
                <div class="row">
					@foreach ($service as $item)
						<div class="col">
							<div class="collapse multi-collapse" id="{{$item->id}}">
								<div class="card card-body">
									{!! $item->title !!}
								</div>
								<div class="card-footer">
									<a href="{{route('home.create', $item->id)}}" class="btn btn-primary">
										{{$item->price}}
									</a >
								</div>
							</div>
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
