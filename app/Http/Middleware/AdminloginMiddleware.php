<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class AdminloginMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// Dung middleware de check loi url ... con Phan Request la de bat loi form khi input

		if (Auth::check()) {
			$user = Auth::user();
			if ($user->role == 1 && $user->status == 1) {
				return $next($request);
			} else {
				return redirect()->route('Login');
				//******** sau do khai bao middleware trong kernel.php *********
			}

		} else {
			return redirect()->route('Login');
		}

	}

}
