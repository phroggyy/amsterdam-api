<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\GraphApi;

class PhotosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private $fb;

	/**
	 * PhotosController constructor.
	 * @param $fb
	 */
	public function __construct()
	{
		$this->fb = new GraphApi(env('FB_ID'), env('FB_SECRET'));
	}


	public function index()
	{
		$curlResponse = $this->fb->curl_get('amsterdam2015/albums?fields=id,name,description,link,cover_photo,count');
		$albums = $curlResponse->data;
		foreach($albums as $album) {
			// I don't know if $album is actually an array or an object, check with dd
			$album->cover_pic = $this->fb->curl_get($album->cover_photo . '?fields=source')->source;
		}
		echo json_encode($albums);
	}


	/**
	 * Display the specified resource.
	 * The provided id is an album id, probably retrieved using the index() function
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$response = $this->fb->curl_get($id . '/photos?fields=images,description');
		$images = $response->data;
		echo json_encode($images);
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
