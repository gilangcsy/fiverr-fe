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

		$ServiceId = $id;

		$devHost = env("HOST_API_DEV", "");

		$response = Http::get($devHost . 'services/plans/features', [
			'ServiceId' => $ServiceId
		]);

		$features = json_decode($response->body());
		$features = $features->data;

		if ($response->successful()){
			return view('dashboard/seller/features/index', compact(['features', 'ServiceId']));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $feature = (object) [
			'id' => '',
			'title' => '',
			'price' => '',
			'ServiceId' => $id,
		];
		
		return view('dashboard/seller/features/create', compact('feature'));
        
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
        	'price' => $request->price,
        	'ServiceId' => $request->ServiceId,
        ]);

		$features = json_decode($response);

		if ($response->successful()){
			return redirect()->route('features.index', $request->ServiceId)->with('status', 'Features Added Successfully');
		} else {
			return $features->message;
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
    public function edit(Request $request, $ServiceId ,$id)
    {
        $devHost = env("HOST_API_DEV", "");
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken')
        ])->get($devHost . 'services/plans/features', [
			'id' => $id
		]);
        $features = json_decode($response->body());

		foreach($features->data as $item) {
			$feature = (object) [
				'id' => $item->id,
				'title' => $item->title,
				'price' => $item->price,
				'ServicePlanId' => $item->ServicePlanId
			];
		}

        if ($response->successful()){
            return view('dashboard/seller/features/edit', compact(['feature', 'ServiceId']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $ServicePlanId)
    {
    	$devHost = env("HOST_API_DEV", "");
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken')
        ])->patch($devHost . 'services/plans/features/' . $ServicePlanId, [
			'title' => $request->title,
			'ServicePlanId' => $request->ServicePlanId,
			'price' => $request->price
		]);

		if ($response->successful()){
			return redirect()->route('features.index', $id)->with('status', 'Features Updated Successfully');
		} else {
			return back()->withInput();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $devHost = env("HOST_API_DEV", "");

        $response = Http::withHeaders([
			'x-access-token' => $request->session()->get('accessToken')
		])->delete($devHost . 'services/plans/features/' . $id);


        if ($response->successful()){
            return back()->with('status', 'Feature deleted successfully! :)');
        } else {
			return back()->with('status', $response->message);
		}
    }
}
