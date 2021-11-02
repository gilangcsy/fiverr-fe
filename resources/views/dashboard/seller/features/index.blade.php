@extends('dashboard.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

<style>
	li.media {
		padding:10px;
	}
	.media:hover {
		background: rgb(241, 241, 241);
	}
</style>
@endsection

@section('content')
{{-- <input type="hidden" id="status" value="{{Session::get('status')}}">
<input type="hidden" id="UserId" value="{{Session::get('UserId')}}"> --}}
@if (session('ToUserId'))
    <input type="hidden" id="ToUserIdNew" value="{{ session('ToUserId') }}">
@else
	<input type="hidden" id="ToUserIdNew" value="0">
@endif
{{-- <input type="text" id="ToUserId" value="0">
<input type="text" id="groupId" value="0"> --}}

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
		@if (session('ToUserId'))
    		<div class="alert alert-success">
        		{{ session('ToUserId') }}
   			</div>
		@endif
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Disabled &amp; Active State</h4>
			</div>
			<div class="card-body">
				<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('features.create', $ServiceId)}}" class="btn btn-primary">
                            Add New Features
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $item)
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>{!!$item->title!!}</td>
                                        <td>
											<a href="#" class="btn btn-primary">
												Features
											</a>
										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			</div>
		</div>
    </div>
</section>
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

@if (session('ToUserId'))

<script>
	let ToUserIdNew = document.getElementById("ToUserIdNew").value;
	let mychatbox2 = document.getElementById("mychatbox2");
	
	mychatbox2.style = "block";
</script>
@endif
@endsection
