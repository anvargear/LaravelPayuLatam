# Web Checkout Class

This class will alow you to generate the signature and will hold all the informtion needed to build a form for the web checkout endpoint in PayU Latam.

 ## Env file

 You need to set the following varibles in your .env file

 ```bash
    PAYU_MERCHANT_ID=500238
    PAYU_ACCOUNT=509171
    PAYU_API_KEY=6u39nqhq8ftd0hlvnjfs66eh8c
    PAYU_API_LOGIN=11959c415b33d0c
    PAYU_LANG=es
    PAYU_RESPONSE_URL=http://example.com/payu/response
    PAYU_CONFIRMATION_URL=http://example.com/payu/confirmation
 ```

 ## Example

 ```php
     use AnvarCO\PayuLatam\Form\Builder as PayuLatamForm;

     $webCheckout = app('WebCheckoutData');
     /**
      * @param $buyerEmail
      * @param $description
      * @param $referenceCode
      * @param $amount
      * @param int $tax
      * @param int $taxReturnBase
      * @return $this
      */
     $webCheckout->init('BuyerEmail@example.com', 'Description', 'Reference', 35000, 0, 0)->process();
     $form = new PayuLatamForm($webCheckout);
     echo $form->getForm();
 ```