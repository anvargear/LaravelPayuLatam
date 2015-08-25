<?php

namespace AnvarCO\PayuLatam\Events;


use AnvarCO\PayuLatam\Confirmation\PayUConfirmation;

/**
 * Class ConfirmationSaved
 * @package AnvarCO\PayuLatam\Events
 */
class ConfirmationSaved {

    /**
     * @var
     */
    public $confirmation;

    /**
     * @param PayUConfirmation $model
     */
    public function __construct(PayUConfirmation $model)
    {
        $this->confirmation = $model;
    }

}