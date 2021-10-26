<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServicesController extends Controller
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
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken')
        ])->get($devHost . 'services');
        $services = json_decode($response->body());
        if ($response->successful()){
            return view('dashboard/seller/services/index', compact(['services', 'devHostStorage']));
        }
        return redirect()->route('auth.index')->with('status', $services->message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $devHost = env("HOST_API_DEV", "");
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken')
        ])->get($devHost . 'services');
        $services = json_decode($response->body());
        $service = (object) ['id' => 'Here we go'];

        if ($response->successful()){
            return view('dashboard/seller/services/create', compact('service'));
        }
        return redirect()->route('auth.index')->with('status', $services->message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
