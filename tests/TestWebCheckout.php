<?php

namespace AnvarCO\PayuLatam\Tests;

class TestWebCheckout extends BootTestSuitePayU
{

    public function testItCreatesInstanceOfClass()
    {
        $webCheckout = app('WebCheckoutData');
        $this->assertInstanceOf('AnvarCO\PayuLatam\WebCheckoutData', $webCheckout);
    }

    public function testItInitsTheVars()
    {
        $webCheckout = app('WebCheckoutData');
        $webCheckout->init('test@example.com', 'Description one', 'RC1', 2500);
        $this->assertArrayHasKey('buyerEmail', $webCheckout->toArray());
        $this->assertArrayHasKey('description', $webCheckout->toArray());
        $this->assertArrayHasKey('referenceCode', $webCheckout->toArray());
        $this->assertArrayHasKey('amount', $webCheckout->toArray());
    }

    public function testItSetsTheSignature()
    {
        $webCheckout = app('WebCheckoutData');
        $webCheckout->init('test@example.com', 'Description one', 'RC1', 2500)->process();
        // Signature Expected
        $sig = md5('123~123~RC1~2500~COP');
        //data Generated
        $generated = $webCheckout->toArray();
        $this->assertEquals($sig, $generated['signature']);
    }

}