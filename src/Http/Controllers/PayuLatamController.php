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

    public function response(Request $request)
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

    protected function formatData(array $data)
    {
        return [
            'reference_sale' => (int) $data['referenceCode'],
            'state_pol' => (int) $data['transactionState'],
            'response_code_pol' => (int) $data['polResponseCode'],
            'reference_pol' => $data['reference_pol'],
            'sign' => $data['signature'],
            'payment_method' => $data['polPaymentMethod'],
            'value' => (float) $data['TX_VALUE'],
            'tax' => (float) $data['TX_TAX'],
            'transaction_date' => $data['processingDate']
        ];
    }
}