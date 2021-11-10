@extends('dashboard.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
@endsection

@section('content')
<input type="hidden" id="status" value="{{Session::get('status')}}">

<section class="section">
    <div class="section-header">
        <h1>Payment Check</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
            </div>
            
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Order ID</th>
										<th>Transaction ID</th>
                                        <th>User ID</th>
                                        <th>Service ID</th>
										<th>Gross Amount</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $item)
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>{{$item->id}}</td>
                                        <td>{{ $item->transactionId }}</td>
										<td>{{ $item->UserId }}</td>
										<td>{{$item->ServicePlanFeatureId}}</td>
										<td>{{$item->quantity * $item->price}}</td>
										<td>
											@if ($item->status == 'pending')
											<form action="{{route('payment.update', $item->id)}}" method="POST">
												@csrf
												@method('patch')
												<button class="btn btn-warning">
													{{ucfirst(trans($item->status))}}
												</button>
											</form>
											@else
												<span class="badge badge-success">
													{{$item->status}}
												</span>
											@endif
										</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        message: 'You are logged as an Admin! :)',
        position: 'topRight'
    });
</script>

@endif
@endsection

@push('active.payments')
	active
@endpush
