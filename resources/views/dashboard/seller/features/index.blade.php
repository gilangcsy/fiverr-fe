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
<input type="hidden" id="status" value="{{Session::get('status')}}">

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
										<th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($features as $item)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
										<td>
											<span class="badge badge-light">{{$item->ServicePlan->title}}</span>
										</td>
                                        <td>{!!$item->title!!}</td>
										<td>
											<form action="{{route('features.delete', $item->id)}}" method="POST">
												@method('delete')
												@csrf
												<button class="btn btn-danger mt-2" onclick="return confirm('Are you sure?')">
													<i class="fa fa-trash"></i>
												</button>
											</form>


											<a href="{{$ServiceId}}/edit/{{$item->id}}" class="btn btn-warning mt-2">
												<i class="fa fa-pen-square"></i>
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
        title: `Oh yeah!`,
        message: `${status}`,
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
