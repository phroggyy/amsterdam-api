<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

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
		dd($request);
		//if $request->input['pub'];
		return $next($request);
	}

}
