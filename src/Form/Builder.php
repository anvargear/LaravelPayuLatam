<?php

namespace AnvarCO\PayuLatam\Form;


use AnvarCO\PayuLatam\WebCheckoutData;

/**
 * Class Builder
 * @package AnvarCO\PayuLatam\Form
 * @author Jose Luis Fonseca <jose@ditecnologia.com>
 */
class Builder {

    /**
     * @var WebCheckoutData
     */
    private $payu;

    /**
     * @param WebCheckoutData $payu
     */
    public function __construct(WebCheckoutData $payu)
    {
        $this->payu = $payu;
    }

    /**
     * ger the form based on the theme in config
     * @return string
     */
    public function getForm()
    {
        return view('payulatam::templates.'.config('payulatam.theme','bootstrap'))->with($this->payu->toArray())->render();
    }

}