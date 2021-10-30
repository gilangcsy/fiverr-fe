<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/index');
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
        $devHost = env("HOST_API_DEV", "");
        $response = Http::post($devHost . 'auth/login', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        $getData = json_decode($response->body());

        if ($response->successful()){
            session()->put('accessToken', $getData->credentials->accessToken);
            session()->put('roleCheck', $getData->credentials->role);
            session()->put('UserId', $getData->credentials->UserId);
            session()->put('fullName', $getData->credentials->fullName);
            return redirect()->route('index')->with('status', 'Welcome, ' . $getData->credentials->fullName);
        }
        return redirect()->route('auth.index')->with('status', $getData->message);
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
    public function destroy(Request $request)
    {
        $devHost = env("HOST_API_DEV", "");
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken'),
        ])->post($devHost . 'auth/logout', [
            'name' => 'Taylor',
        ]);

        if ($response->successful()){
            session()->forget('accessToken');
            session()->forget('sellerCheck');
            session()->forget('loginSuccess');
            return redirect()->route('auth.index');
        }
    }
}
