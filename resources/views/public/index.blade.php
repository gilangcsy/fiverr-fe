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
		<li><img src="images/Airbnb.png"></li>
		<li><img src="images/Hubspot.png"></li>
		<li><img src="images/Google.png"></li>
		<li><img src="images/Microsoft.png"></li>
		<li><img src="images/Walmart.png"></li>
		<li><img src="images/FedEx.png"></li>
	</ul>
</div>
<div class="offer">
	<div class="offer_head">
		<h2>Buat Penawaran</h2>
		<p>Ambil jalur cepat ke talenta yang tepat.</p>
		<img src="images/StepsGroup.png" class="offer_group">
	</div>
</div>
<div class="solusi">
	<h3>Solusi untuk setiap kebutuhan</h3>
	<p class="solusi_p">Tingkatkan ke pengalaman pilihan yang dikemas dengan pengalaman dan manfaat, yang didedikasikan untuk bisnis.</p>
	<div class="solusi1">
		<div class="solusi_inner">
			<p class="text1">GRAFIK DAN DESAIN</p>
			<h4>BANGUN MEREK ANDA</h4>
			<P class="solusi_inner_p">Logo, Brosur, Banner, Poster, Postcard, Flyer, Ilustrasi, Desain Kemasan & Label, Desain Katalog, Ikon,
			Undangan.</P>
		</div>
		<img src="images/solusi1.png" alt="">
	</div>
	<div class="solusi1">
		<img src="images/solusi2.png" alt="">
		<div class="solusi_inner2">
			<p class="text1">VIDEO</p>
			<h4>BAGIKAN CERITA ANDA</h4>
			<P class="solusi_inner_p">Short Video Ads, Live Action Video, Video Editing, Unboxing Videos, E-Commerce Product Videos, Corporate Videos,
			Slideshows Videos.</P>
		</div>
	</div>
	<div class="solusi1">
		<div class="solusi_inner">
			<p class="text1">ANIMASI</p>
			<h4>WARNAI MIMPIMU</h4>
			<P class="solusi_inner_p">Animasi Logo, Animasi Karakter, GIF Animasi, Animasi Produk 3D, Animasi untuk Anak-anak, Animasi Situs Web, Animasi untuk Streamer.</P>
		</div>
		<img src="images/solusi3.png" alt="">
	</div>
	<div class="solusi2"></div>
	<div class="solusi3"></div>
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
