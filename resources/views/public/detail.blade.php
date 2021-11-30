{{-- <!DOCTYPE html>
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
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ $devHostStorage }}service/{{$service[0]->Service->thumbnail}}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                            {{$service[0]->Service->title}}
                        </p>
						<p>
							{!! $service[0]->Service->description !!}
						</p>
                    </div>
                </div>
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

</html> --}}

@extends('public.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
@endsection

@section('content')
<section class="detail">
    <article class="detail-item">
        <div class="grid2">
            <img src="{{ $devHostStorage }}service/{{$service[0]->Service->thumbnail}}"
            alt="Card image cap">
            <div class="keterangan">
                <h1 class="detail-title">{{$service[0]->Service->title}}</h1>
                <p class="detail-by">oleh gilangcsy</p>
                <p class="detail-desc">
                    {!! $service[0]->Service->description !!}
                </p>
                <button type="submit">Hubungi Penjual</button>
            </div>
        </div>
    </article>
    <div class="pay">
        <div class="tipe">
            @foreach ($service as $item)
                <div onclick="show(this)" data-content="content_{{ $item->id }}" class="tipe1" style="cursor: pointer">{{$item->ServicePlan->title}}</div>
            @endforeach
        </div>
        @foreach ($service as $item)
            <div id="content_{{ $item->id }}" class="kett thisContent content_{{ $item->id }}" style="display: none">{!! $item->title !!}</div>
            <form action="{{route('home.create', $item->id)}}">
                @csrf
                <button style="display: none" class="thisContent content_{{ $item->id }}">Pesan (Rp. {{ $item->price }})</button>
            </form>
        @endforeach
    </div>
</section>
@endsection

@section('js')

<!-- JS Libraies -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

<script>
    function show(caller) {
        $('.thisContent').hide();
        dataContent = $(caller).attr('data-content');
        $('.' + dataContent).show();
    }
</script>

@if (Session::has('status'))
<script>
    let status = document.getElementById("status").value;
    iziToast.success({
        title: `${status}. `,
        message: 'You are logged as a Seller! :)',
        position: 'topRight'
    });
</script>

@endif
@endsection

</html>
