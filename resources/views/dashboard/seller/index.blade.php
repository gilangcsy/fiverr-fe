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
<input type="hidden" id="UserId" value="{{Session::get('UserId')}}">
<input type="text" id="UserChatId" value="0">
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    {{-- <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Disabled &amp; Active State {{$page}}</h4>
    </div>
    <div class="card-body">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item {{ $page == 1 ? 'active' : '' }}"><a class="page-link" href="#">1</a></li>
                <li class="page-item {{ $page == 2 ? 'active' : '' }}">
                    <a class="page-link" href="{{route('index')}}?page=2">2 <span class="sr-only">(current)</span></a>
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
        </nav>
    </div>
    </div>
    </div> --}}

    <div class="section-body">
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
                    <div class="card-footer chat-form">
                        <form id="chat-form">
                            <input id="" type="text" class="form-control" placeholder="Type a message">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
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


<script src="http://localhost:3000/socket.io/socket.io.js"></script>


<script>
    const socket = io("http://localhost:3000");
    const form = document.querySelector('#chat-form');
    const messages = document.querySelector('#chat-content');
    const previewMessages = document.querySelector('#preview-messages');
	const detailChat = document.getElementById("UserChatId").value

	UserId = document.getElementById("UserId").value;


	function createPreviewMessage(msg) {
        let li = document.createElement('li');
        let img = document.createElement('img');

        li.className = `media`;
        li.innerHTML = `
			<a onclick="detailMessage(${msg.UserId})">
			<img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png">
					<div class="media-body">
                        <div class="mt-0 mb-1 font-weight-bold">${msg.fullName}</div>
                        <div class="text-small text-truncate font-600-bold" style="max-width:150px;">${msg.text}</div>
                    </div>
			</a>
			`
        previewMessages.appendChild(li);
    }

	function createPreviewMessages(msgs) {
        msgs.forEach(createPreviewMessage);
    }

	fetch(`http://localhost:3000/api/message/previews/${UserId}`)
        .then(res => res.json())
        .then(createPreviewMessages);

    // form.addEventListener("submit", (e) => {
    //     e.preventDefault();
    //     socket.emit('chat message', JSON.stringify({
    //         id: '_' + Math.random().toString(36).substr(2, 9),
    //         text: document.querySelector('#m').value,
    //         ToUserId: document.getElementById("UserId").value;
    //     }));
    //     e.target.reset();
    // });

	socket.on('preview message', function (msgs) {
        console.log(msgs);
        previewMessages.innerHTML = '';
        createPreviewMessages(msgs);
    });

	function detailMessage(id) {
		messages.innerHTML = ``;
		document.getElementById("mychatbox2").style = "block";

		function createMessage(msg) {
        let div = document.createElement('div');
        let img = document.createElement('img');

        div.className = `chat-item ${msg.UserId == document.getElementById("UserId").value ? 'chat-right' : 'chat-left'}`;
        div.innerHTML = `
				<img src="../dist/img/avatar/avatar-2.png">
				<div class="chat-details">
					<div class="chat-text">
						${msg.text}
					</div>
					<div class="chat-time">09:09</div>
				</div>
			`
        messages.appendChild(div);
    }

    function createMessages(msgs) {
        msgs.forEach(createMessage);
    }

	fetch(`http://localhost:3000/api/message/detail/${id}/${UserId}`)
        .then(res => res.json())
        .then(createMessages);

		socket.on('chat message', function (msgs) {
		console.log(msgs);
        messages.innerHTML = '';
        createMessages(msgs);
    });
	}

</script>
@endsection
