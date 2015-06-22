<?php namespace AnvarCO\Payulatam\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class PayuLatamController extends Controller
{
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//dd(Config::get("payulatam.message"));
		return view('payulatam::payulatam');
	}
}