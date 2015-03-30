<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Vimeo\Vimeo;

class VideoController extends Controller {

	private $vimeo;

	/**
	 * VideoController constructor.
	 * @param $vimeo
	 */
	public function __construct()
	{
		$clientId = '14321efccb44b30e24fd45ef7156c40501bdb330';
		$clientSecret = '0c0e12d6f0d388a355c49ca0e8118544645f2cea';
		$this->vimeo = new Vimeo($clientId, $clientSecret);

		if (!isset($_SESSION['token'])) {
			// Set credentials
			// These should actually be saved in a cookie to not constantly reauth
			$token = $vimeo->clientCredentials();
			$_SESSION['token'] = $token;
		}
		$this->vimeo->setToken($_SESSION['token']['body']['access_token'])
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$response = $this->vimeo->request('/users/23320497/videos', [], 'GET');
		echo json_encode($response['body']['data']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
