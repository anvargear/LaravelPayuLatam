<?php

namespace AnvarCO\PayuLatam\Tests;

class BootTestSuitePayU extends \Orchestra\Testbench\TestCase{

    protected function getPackageProviders($app)
    {
        return ['AnvarCO\PayuLatam\PayuLatamServiceProvider'];
    }

    /**
     * Testing Laravel application.
     */
    public function testBoot()
    {
        $this->assertArrayHasKey('data', ['data' => 'foo']);
    }

}