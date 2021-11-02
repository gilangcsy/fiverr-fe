<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as Guzzle;

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
		$UserId = $request->session()->get('UserId');

		$response = Http::get($devHost . 'services', [
			'UserId' => $UserId
		]);
		
        $services = json_decode($response->body());
		$services = $services->data;
		
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
        $service = (object) [
			'id' => '',
			'title' => '',
			'description' => '',
			'thumbnail' => '',
			'fileFormat' => '',
			'CategoryId' => '',
		];

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
		$guzzle = new Guzzle();
		$devHost = env("HOST_API_DEV", "");
		$token = $request->session()->get('accessToken');
		$headers = ['x-access-token' => $token];

		$thumbail = $request->file('thumbnail');

        try {
            $response = $guzzle->request('POST', $devHost . "services", [
				'headers' => $headers,
                'multipart' => [
					[
                        'name' => 'title',
                        'contents' => $request->title
                    ],
					[
                        'name' => 'description',
                        'contents' => $request->description
                    ],
                    [
                        'name' => 'thumbnail',
                        'Content-Type' => $thumbail->getMimeType(),
                        'contents' => fopen($thumbail->getPathname(), 'r')
                    ],
					[
                        'name' => 'fileFormat',
                        'contents' => $request->fileFormat
                    ],
					[
                        'name' => 'CategoryId',
                        'contents' => $request->CategoryId
                    ],
					[
                        'name' => 'UserId',
                        'contents' => $request->session()->get('UserId')
                    ],
                ]
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('services.index')->with('status', 'Service added auccessfully! :)');
            } else {
                return back()->withInput();
            }
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return $e->getResponse()->getBody()->getContents();
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
    public function edit(Request $request, $id)
    {
        $devHost = env("HOST_API_DEV", "");
        $response = Http::withHeaders([
            'x-access-token' => $request->session()->get('accessToken')
        ])->get($devHost . 'services', [
			'id' => $id
		]);
        $services = json_decode($response->body());

		foreach($services->data as $item) {
			$service = (object) [
				'id' => $item->id,
				'title' => $item->title,
				'description' => $item->description,
				'thumbnail' => $item->thumbnail,
				'fileFormat' => $item->fileFormat,
				'CategoryId' => $item->CategoryId,
			];
		}

        if ($response->successful()){
            return view('dashboard/seller/services/edit', compact('service'));
        }
        return redirect()->route('auth.index')->with('status', $service->message);
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
        $guzzle = new Guzzle();
		$devHost = env("HOST_API_DEV", "");
		$token = $request->session()->get('accessToken');
		$headers = ['x-access-token' => $token];

		if($request->file('thumbnail') != null) {
			$thumbail = $request->file('thumbnail');
			try {
				$response = $guzzle->request('PATCH', $devHost . "services/" . $id, [
					'headers' => $headers,
					'multipart' => [
						[
							'name' => 'title',
							'contents' => $request->title
						],
						[
							'name' => 'description',
							'contents' => $request->description
						],
						[
							'name' => 'thumbnail',
							'Content-Type' => $thumbail->getMimeType(),
							'contents' => fopen($thumbail->getPathname(), 'r')
						],
						[
							'name' => 'fileFormat',
							'contents' => $request->fileFormat
						],
						[
							'name' => 'CategoryId',
							'contents' => $request->CategoryId
						],
						[
							'name' => 'UserId',
							'contents' => $request->session()->get('UserId')
						],
					]
				]);
				if ($response->getStatusCode() == 200) {
					return redirect()->route('services.index')->with('status', 'Service updated auccessfully! :)');
				} else {
					return back()->withInput();
				}
			} catch (\GuzzleHttp\Exception\BadResponseException $e) {
				return $e->getResponse()->getBody()->getContents();
			}
		} else {
			try {
				$response = $guzzle->request('PATCH', $devHost . "services", [
					'headers' => $headers,
					'multipart' => [
						[
							'name' => 'title',
							'contents' => $request->title
						],
						[
							'name' => 'description',
							'contents' => $request->description
						],
						[
							'name' => 'fileFormat',
							'contents' => $request->fileFormat
						],
						[
							'name' => 'CategoryId',
							'contents' => $request->CategoryId
						],
						[
							'name' => 'UserId',
							'contents' => $request->session()->get('UserId')
						],
					]
				]);
				if ($response->getStatusCode() == 200) {
					return redirect()->route('services.index')->with('status', 'Service updated auccessfully! :)');
				} else {
					return back()->withInput();
				}
			} catch (\GuzzleHttp\Exception\BadResponseException $e) {
				return $e->getResponse()->getBody()->getContents();
			}
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
		])->delete($devHost . 'services/' . $id);


        if ($response->successful()){
            return redirect()->route('services.index')->with('status', 'Service deleted successfully! :)');
        }
    }

	public function message($id)
    {
        return redirect('seller')->with('ToUserId', $id);
    }
}
