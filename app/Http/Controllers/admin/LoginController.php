<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller {

	public function ViewLogin() {

		return view('admin.login');
	}

	public function PostLogin(Request $request) {

		$this->validate($request,
			[
				'email' => 'required|email',
				'password' => 'required|min:6',
			],
			[
				'email.required' => 'cannot be empty field',
				'email.email' => 'Email invalidate..!',
				'password.required' => 'cannot be empty field',
				'password.min' => 'Passwords must be longer than 6 characters',
			]
		);
		$login = array(
			'email' => $request->email,
			'password' => $request->password,
			'role' => 1,
			'status' => 1,
		);
		if (Auth::attempt($login)) {
			Session::put('website_language', config('app.locale'));
			// ham attempt de kiem tra thong tin dang nhap co trung voi DB
			return redirect()->route('Dashboard.index');
		} else {
			return redirect()->back()->with('danger', 'login failed, account does not exist..!');
		}
	}
	public function AdminlogOut() {
		Auth::logout();
		return redirect()->route('Login');
	}
}
