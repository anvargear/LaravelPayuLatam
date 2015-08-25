<?php namespace AnvarCO\Payulatam\Http\Controllers;

use AnvarCO\PayuLatam\Confirmation\PayUConfirmation;
use AnvarCO\PayuLatam\Events\ConfirmationArrived;
use AnvarCO\PayuLatam\Events\ConfirmationSaved;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Log;


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
        Log::info('New post request from PayU');
        event(new ConfirmationArrived($request));
        $confirmation = PayUConfirmation::create($request->all());
        Log::info('Confirmation created: '.$confirmation->id);
        event(new ConfirmationSaved($confirmation));
        Log::info('Event fired');
        return response()->json(['ok' => true]);
    }
}