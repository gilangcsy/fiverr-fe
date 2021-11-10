@extends('public.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
@endsection

@section('hero')
	<div class="hero">
		<div class="hero__inner">
			<h1 class="hero__title">Wujudkan ide anda ke level selanjutnya.</h1>
			<p class="hero__tagline">Temukan freelance yang sempurna untuk bisnis Anda!</p>
			<button class="hero__button">Layanan</button>
		</div>
	</div>
@endsection

@section('content')
	<div class="headline">
	    <h1 class="headline__title">Dipercaya Oleh</h1>
	    <ul class="headline__content">
	        <li><img src="{{asset('images/Airbnb.png')}}"></li>
	        <li><img src="{{asset('images/Hubspot.png')}}"></li>
	        <li><img src="{{asset('images/Google.png')}}"></li>
	        <li><img src="{{asset('images/Microsoft.png')}}"></li>
	        <li><img src="{{asset('images/Walmart.png')}}"></li>
	        <li><img src="{{asset('images/FedEx.png')}}"></li>
	    </ul>
	</div>
	<div class="offer">
	    <div class="offer_head">
	        <h2>Buat Penawaran</h2>
	        <p>Ambil jalur cepat ke talenta yang tepat.</p>
	    </div>
	    <!-- ini harusnya ga pake gambar wkwk tp buat elemennya satu2 -->
	    <!-- <img src="{{asset('')}}images/StepsGroup.png" class="offer_group"> -->
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
