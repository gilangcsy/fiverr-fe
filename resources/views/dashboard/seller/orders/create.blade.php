@extends('dashboard.partials.app')

@section('css')
	<link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
	<link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Service</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Add New Service</h2>
        <p class="section-lead">
			Create your new service here.
		</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Input Text</h4>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{route('services.store')}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
							@csrf
                            @include('dashboard.seller.services._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
	<script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
	<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
@endsection

@push('active.services')
    active
@endpush