<?php

namespace AnvarCO\PayuLatam\Events;

use Illuminate\Http\Request;


/**
 * Class ConfirmationArrived
 * @package AnvarCO\PayuLatam\Events
 */
class ConfirmationArrived {

    /**
     * @var Request
     */
    public $confirmationRequest;

    /**
     * @param Request $confirmationRequest
     */
    function __construct(Request $confirmationRequest)
    {
        $this->confirmationRequest = $confirmationRequest;
    }


}