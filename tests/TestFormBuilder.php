<?php

namespace AnvarCO\PayuLatam\Tests;


use AnvarCO\PayuLatam\Form\Builder;

class TestFormBuilder extends BootTestSuitePayU{

    public function testItCreatesTheClass()
    {
        $webCheckout = app('WebCheckoutData');
        $webCheckout->init('test@example.com', 'Description one', 'RC1', 2500)->process();
        $builder = new Builder($webCheckout);
        $this->assertInstanceOf('AnvarCO\PayuLatam\Form\Builder', $builder);
    }

}