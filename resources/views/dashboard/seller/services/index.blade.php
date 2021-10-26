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
<section class="section">
    <div class="section-header">
        <h1>My Services</h1>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('services.create') }}" class="btn btn-primary">
                            Add
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
                                        <th>Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $item)
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            {{$item->description}}
                                        </td>
                                        <td>
                                            <img alt="image" src="{{ $devHostStorage }}service/{{$item->thumbnail}}"
                                                width="300" data-toggle="tooltip" title="Wildan Ahdian">
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
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
<script src="{{asset('assets/js/page/modules-toastr.js')}}"></script>
@endsection