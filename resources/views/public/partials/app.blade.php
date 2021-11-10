<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">

	<!-- Custom CSS Files -->
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <link rel="stylesheet" href="{{asset('styles/responsive.css')}}">

</head>
    @include('public.partials.navbar')
	@yield('hero')
	<main>
		<section class="content">
			@yield('content')
		</section>
	</main>
	<footer>
	</footer>

</html>
