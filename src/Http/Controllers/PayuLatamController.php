<?php namespace AnvarCO\Payulatam\Http\Controllers;

use AnvarCO\PayuLatam\Confirmation\PayUConfirmation;
use AnvarCO\PayuLatam\Events\ConfirmationArrived;
use AnvarCO\PayuLatam\Events\ConfirmationSaved;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


/**
 * Class PayuLatamController
 * @package AnvarCO\Payulatam\Http\Controllers
 */
class PayuLatamController extends Controller
{

    public function response()
    {
        return view('payulatam::response');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmation(Request $request)
    {
        event(new ConfirmationArrived($request));
        $confirmation = PayUConfirmation::create($request->all());
        event(new ConfirmationSaved($confirmation));
        return response()->json(['ok' => true]);
    }
}