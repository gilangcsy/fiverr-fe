<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-3vy4BJZCS1KVIJMp"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($service as $item)
                <div class="card">
                    <h5 class="card-header">Checkout Summary</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->Service->title}}</h5>
                        <p class="card-text">
							Price : {{$item->price}} / qty
						</p>
						<form id="payment-form" method="post" action="{{route('home.store')}}">
							@csrf
							<input type="hidden" id="ServicePlanFeatureId" name="ServicePlanFeatureId" value="{{$item->id}}">
							<input type="hidden" name="result_type" id="result-type" value=""></div>
							<input type="hidden" name="result_data" id="result-data" value=""></div>
							Quantity
							<select name="quantity" id="quantity">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>

							<input type="text" placeholder="notes" name="descirption"></div>
						</form>
						<button class="btn btn-primary" id="pay-button">Continue Checkout!</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>



	<script type="text/javascript">
    function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
    }

	function getOption() {
		selectElement = document.querySelector('#quantity');
		return selectElement.options[selectElement.selectedIndex].value;
	}

    var payButton = document.getElementById('pay-button');
	const id = document.getElementById('ServicePlanFeatureId').value;

    payButton.addEventListener('click', function (event) {
        event.preventDefault();
		const qty = getOption();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:3000/api/v1/purchasing',
            data: {
                ServicePlanFeatureId: id,
                quantity: qty
            },
            cache: false,

            success: function(data) {
                snap.pay(data,
                {
                    onSuccess: function (result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function (result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function (result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>
</body>

</html>
