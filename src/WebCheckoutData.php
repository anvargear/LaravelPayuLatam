<?php

namespace AnvarCO\PayuLatam;


/**
 * Class WebCheckoutData
 * @package AnvarCO\PayuLatam
 * @author Jose Luis Fonseca <jose@ditecnologia.com>
 */
class WebCheckoutData
{

    /**
     * @var
     */
    private $merchantId;
    /**
     * @var
     */
    private $accountId;
    /**
     * @var
     */
    private $apiKey;
    /**
     * @var
     */
    private $apiLogin;
    /**
     * @var
     */
    private $lang;
    /**
     * @var
     */
    private $currency;
    /**
     * @var bool
     */
    private $test = true;
    /**
     * @var
     */
    private $responseUrl;
    /**
     * @var
     */
    private $confirmationUrl;
    /**
     * @var
     */
    private $buyerEmail;
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $referenceCode;
    /**
     * @var
     */
    private $amount;
    /**
     * @var
     */
    private $tax;
    /**
     * @var
     */
    private $taxReturnBase;
    /**
     * @var null
     */
    private $signature = null;
    /**
     * @var string
     */
    private $url = "https://stg.gateway.payulatam.com/ppp-web-gateway/";

    /**
     *
     */
    public function __construct()
    {
        $this->setVariables();
    }

    /**
     * Set the variables to generate the form
     * @param $buyerEmail
     * @param $description
     * @param $referenceCode
     * @param $amount
     * @param int $tax
     * @param int $taxReturnBase
     * @return $this
     */
    public function init($buyerEmail, $description, $referenceCode, $amount, $tax = 0, $taxReturnBase = 0)
    {
        $this->buyerEmail = $buyerEmail;
        $this->description = $description;
        $this->referenceCode = $referenceCode;
        $this->amount = $amount;
        $this->tax = $tax;
        $this->taxReturnBase = $taxReturnBase;

        return $this;
    }

    /**
     * Generate the signature and return the object for a builder
     * @return $this
     */
    public function process()
    {
        $this->setSignature();

        return $this;
    }

    /**
     * Get the data required for PayU Web checkout as array
     * @return array
     */
    public function toArray()
    {
        return [
            'merchantId' => $this->merchantId,
            'accountId' => $this->accountId,
            'description' => $this->description,
            'referenceCode' => $this->referenceCode,
            'currency' => $this->currency,
            'amount' => $this->amount,
            'tax' => $this->tax,
            'taxReturnBase' => $this->taxReturnBase,
            'signature' => $this->signature,
            'isTest' => (int)$this->test,
            'buyerEmail' => $this->buyerEmail,
            'responseUrl' => $this->responseUrl,
            'confirmationUrl' => $this->confirmationUrl,
            'url' => $this->url
        ];
    }

    /**
     * Generate the signature based in the given data
     * @return $this
     */
    protected function setSignature()
    {
        $this->signature = md5($this->apiKey . '~' . $this->merchantId . '~' . $this->referenceCode . '~' . $this->amount . '~' . $this->currency);

        return $this;
    }

    /**
     * Set the initial variables from config
     */
    private function setVariables()
    {
        $this->merchantId = config('payulatam.merchantId', '500238');
        $this->accountId = config('payulatam.accountId', '500538');
        $this->apiKey = config('payulatam.apiKey', '6u39nqhq8ftd0hlvnjfs66eh8c');
        $this->apiLogin = config('payulatam.apiLogin', '11959c415b33d0c');
        $this->lang = config('payulatam.language', 'es');
        $this->currency = config('payulatam.currency', 'COP');
        $this->test = config('payulatam.test', true);
        $this->responseUrl = config('payulatam.responseUrl', '');
        $this->confirmationUrl = config('payulatam.confirmationUrl', '');
        if (empty($this->test)) {
            $this->url = "https://gateway.payulatam.com/ppp-web-gateway/";
        }
    }

}