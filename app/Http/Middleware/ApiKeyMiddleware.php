<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;
use App\Api_key;

class ApiKeyMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$serverKey = $request->input['key'];
		var_dump($request);
		die;
		dd($serverKey);
		$serverSecret = Api_key::all()->where('key', $serverKey)->lists('secret');
		dd($serverSecret);
		if ($request->input['secret'] = bcrypt($serverKey . $serverSecret)) {
			return $next($request);
		}
 	}

}
