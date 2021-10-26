@extends('dashboard.partials.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add New Service</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Advanced Forms</h2>
        <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Text</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            @include('dashboard.seller.services._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection