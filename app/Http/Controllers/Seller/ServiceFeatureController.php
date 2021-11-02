<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as Guzzle;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
		$devHost = env("HOST_API_DEV", "");

		$response = Http::get($devHost . 'services/plans/features', [
			'ServiceId' => $id
		]);

		$features = json_decode($response->body());
		$features = $features->data;
		$ServiceId = $id;

		if ($response->successful()){
			return view('dashboard/seller/features/index', compact(['features', 'ServiceId']));
		}
		return redirect()->route('auth.index')->with('status', $features->message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $service = (object) [
			'id' => '',
			'title' => '',
			'ServiceId' => $id,
		];
		
		return view('dashboard/seller/features/create', compact('service'));
        
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
        $response = Http::post($devHost . 'services/plans/features', [
        	'title' => $request->title,
        	'ServicePlanId' => $request->ServicePlanId,
        	'ServiceId' => $request->ServiceId,
        ]);

		if ($response->successful()){
			return redirect()->route('features.index', $request->ServiceId)->with('status', 'Features Added Successfully');
		} else {
			return back()->withInput();
		}


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
