<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $devHost = env("HOST_API_DEV", "");
        $devHostStorage = env("HOST_STORAGE_DEV", "");
        $UserId = $request->session()->get('UserId');

		$response = Http::get($devHost . 'purchasing');
        $purchasingDecode = json_decode($response->body());
		$orders = $purchasingDecode->data;

		$responseServicePlan = Http::get($devHost . 'services/plans/features');
		$responseServicePlan = json_decode($responseServicePlan->body());
		$features = $responseServicePlan->data;
		
        if ($response->successful()){
            return view('dashboard/seller/orders/index', compact(['orders', 'features' ,'devHostStorage', 'UserId']));
        } else {
			return $purchasingDecode->message;
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = json_decode($request->result_data);
		dd($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
