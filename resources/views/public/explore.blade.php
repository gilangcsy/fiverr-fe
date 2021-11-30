@extends('public.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
@endsection

@section('hero')
<div class="hero-eksplorasi">
	<div class="hero__eksplo">
		<div class="eksplorasi">
			<h1>Jelajahi talenta terbaik</h1>
			<p>Temukan freelance yang sempurna untuk bisnis Anda!</p>
		</div>
		<img src="images/eksplorasi_hero.png" alt="">
	</div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
		<div class="col-auto">
			<div class="col-12">
				@foreach ($services as $item)
					<article class="post-item">
						<img class="post-item_thumbnail" src="{{asset('images/post-img.png')}}" alt="${resto.city}" />
						<div class="post-item_content">
							<h1 class="post-item_title"><a href="{{route('home.show', $item->id)}}">{{$item->title}}</a></h1>
							<p class="post-item_description">oleh storynative</p>
							<div class="grid">
								<span>&#xf004; 75</span>
								<p class="post-item_date">
									mulai dari @currency($item->ServicePlanFeatures[1]->price)
								</p>
							</div>
						</div>
					</article>
				@endforeach
				{{-- @foreach ($services as $item)
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="{{ $devHostStorage }}service/{{$item->thumbnail}}" alt="Card image cap">
						<div class="card-body">
							<h6 class="card-title">{{$item->User->username}}</h6>
							<p class="card-text" style="font-size: 11pt">
								{{$item->title}}
							</p>
							<a href="{{route('home.show', $item->id)}}" class="btn btn-success">
								Starting At @currency($item->ServicePlanFeatures[0]->price)
							</a>
						</div>
					</div>
				@endforeach --}}
			</div>
		</div>
    </div>
</div>
@endsection

@section('js')

<!-- JS Libraies -->
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

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
