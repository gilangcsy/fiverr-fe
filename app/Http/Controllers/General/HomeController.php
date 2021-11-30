<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('public/index');
    }

	public function explore(Request $request)
    {
		$devHost = env("HOST_API_DEV", "");
        $devHostStorage = env("HOST_STORAGE_DEV", "");

		$response = Http::get($devHost . 'services');
		
        $services = json_decode($response->body());
		$services = $services->data;
		
        if ($response->successful()){
            return view('public/explore', compact(['services', 'devHostStorage']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
		$devHost = env("HOST_API_DEV", "");
        $devHostStorage = env("HOST_STORAGE_DEV", "");

		$response = Http::get($devHost . 'services/plans/features', [
			'id' => $id
		]);
		
        $service = json_decode($response->body());
		$service = $service->data;
		
        if ($response->successful()){
            return view('public/checkout', compact(['service', 'devHostStorage']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$devHost = env("HOST_API_DEV", "");
		$UserId = $request->session()->get('UserId');
		$result = json_decode($request->result_data, true);
		if($result['status_code'] == "201") {
			$response = Http::post($devHost . 'purchasing/store', [
				'id' => $result['order_id'],
				'quantity' => $request->quantity,
				'description' => $request->description,
				'ServicePlanFeatureId' => $request->ServicePlanFeatureId,
				'UserId' => $UserId,
				'vaNumber' => $result['va_numbers'][0]['va_number'],
				'bank' => $result['va_numbers'][0]['bank'],
				'status' => $result['transaction_status'],
				'transactionId' => $result['transaction_id']
			]);
	
			$checkout = json_decode($response);
	
			if ($response->successful()){
				return redirect()->route('home.index')->with('status', 'Checkout Has Been Successfully! :)');
			} else {
				return $checkout->message;
			}
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $devHost = env("HOST_API_DEV", "");
        $devHostStorage = env("HOST_STORAGE_DEV", "");

		$response = Http::get($devHost . 'services/plans/features', [
			'ServiceId' => $id
		]);
		
        $service = json_decode($response->body());
		$service = $service->data;
        
        if ($response->successful()){
            return view('public/detail', compact(['service', 'devHostStorage']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
