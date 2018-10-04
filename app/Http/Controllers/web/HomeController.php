<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Session;

class HomeController extends Controller {
	public function change_lang($lang) {
		Session::put('website_language', $lang);
		return redirect()->back();
	}

}
