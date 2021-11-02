@extends('dashboard.partials.app')

@section('css')
	<link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Features</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Add New Features</h2>
        <p class="section-lead">
			Create your new features here.
		</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('features.store')}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
							@csrf
                            @include('dashboard.seller.features._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
	<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
@endsection