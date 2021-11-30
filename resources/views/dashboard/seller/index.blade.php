@extends('dashboard.partials.app')

@section('css')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

<style>
    li.media {
        padding: 10px;
    }

    .media:hover {
        background: rgb(241, 241, 241);
    }
</style>
@endsection

@section('content')
<input type="hidden" id="status" value="{{Session::get('status')}}">
{{-- <input type="hidden" id="UserId" value="{{Session::get('UserId')}}"> --}}
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
    </div>

    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <!-- <h4>Disabled &amp; Active State</h4>

                <form id="payment-form" method="post" action="{{route('orders.store')}}">
                    @csrf
                    <input type="hidden" name="result_type" id="result-type" value=""></div>
                    <input type="hidden" name="result_data" id="result-data" value=""></div>
                </form> -->
            </div>
            <div class="card-body">
                {{-- <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item {{ $page == 1 ? 'active' : '' }}"><a class="page-link" href="#">1</a></li>
                        <li class="page-item {{ $page == 2 ? 'active' : '' }}">
                            <a class="page-link" href="{{route('index')}}?page=2">2 <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card chat-box card-success" id="mychatbox2">
                            <div class="card-header">
                                <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i>
                                    Chat with Ryan</h4>
                            </div>
                            <div class="card-body chat-content">
                            </div>
                            <div class="card-footer chat-form">
                                <form id="chat-form2">
                                    <input type="text" class="form-control" placeholder="Type a message">
                                    <button class="btn btn-primary">
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav> --}}
            </div>
        </div>
    </div>

    {{-- <div class="section-body">
        <h2 class="section-title">Chat Boxes</h2>
        <p class="section-lead">The chat component and is equipped with a JavaScript API, making it easy
            for you to integrate with Back-end.</p>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Who's Online?</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border" id="preview-messages">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-8">
                <div class="card chat-box card-success" id="mychatbox2" style="display: none">
                    <div class="card-header">
                        <h4 id="chat-name"><i class="fas fa-circle text-success mr-2" title="Online"
                                data-toggle="tooltip"></i> Chat
                            with Ryan</h4>
                    </div>
                    <div class="card-body chat-content" id="chat-content">
                    </div>
                    <div class="card-footer chat-form" id="container-form">
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
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
