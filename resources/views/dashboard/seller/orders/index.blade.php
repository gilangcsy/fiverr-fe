@extends('dashboard.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
@endsection

@section('content')
<input type="hidden" id="status" value="{{Session::get('status')}}">
<section class="section">
    <div class="section-header">
        <h1>My Orders</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
										<th>ID</th>
										<th>Service</th>
                                        <th>Description</th>
                                        <th>Payment Status</th>
                                        <th>Email User</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach ($features as $feature)
										@if ($feature->Service->UserId == $UserId)
											@foreach ($orders as $item)
												@if($item->ServicePlanFeatureId == $feature->id)
													<tr>
														<td>
															{{$loop->iteration}}
														</td>
														<td>{{$item->id}}</td>
														<td>
															{{$feature->Service->title}}
														</td>
														<td>{!!$item->description!!}</td>
														<td>
															<span class="badge badge-primary">
																{{$item->status}}
															</span></td>
														<td>
															{{$item->UserId}}
														</td>
													</tr>
												@endif
											@endforeach
										@endif
									@endforeach
                                </tbody>
                            </table>
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
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
@if (Session::has('status'))
<script>
	let status = document.getElementById('status').value
    iziToast.success({
        title: `Oh yeah!`,
        message: `${status}`,
        position: 'topRight'
    });

</script>

@endif
@endsection
@push('active.orders')
    active
@endpush