<!-- headernya mau buat transparan tpi gatau caranya -->
	<header class="header">
		<div class="header__inner">
			<img src="{{asset('images/logo.jpeg')}}" class="logo">
			<a id="menu" class="header__menu">☰</a>
			<nav id="drawer" class="nav">
				<ul class="nav__list">
					<li class="nav__item"><a href="{{route('home.index')}}">Beranda</a></li>
					<li class="nav__item"><a href="{{route('home.explore')}}">Eksplorasi</a></li>
					<li class="nav__item"><a href="#">Kategori</a></li>
				</ul>
			</nav>
			@if (! Session::has('accessToken'))
			<form action="{{ route('auth.index') }}">
				<button type="submit" class="header_button a">Masuk</button>
			</form>
			<form action="{{ route('auth.create') }}">
				<button type="submit" class="header_button b">Daftar</button>
			</form>
			@else
				<form method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="header_button b" tabindex="4">
                        Logout
                    </button>
                </form>
			@endif
		</div>
	</header>