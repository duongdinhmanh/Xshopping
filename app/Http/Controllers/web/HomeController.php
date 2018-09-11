<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\slide;
use App\category;
use App\pannel;
use App\products;
use App\images;
use App\Http\Requests;
use Session;
use App\User;
use Hash;
use DB;
use Auth;
use Mail;
use Cart;
use App\orders;
use App\order_detail;
use App\customers;
class HomeController extends Controller
{
    public function change_lang($lang){
       Session::put('website_language', $lang);
        return redirect()->back();
    }

   
}
