# Web Checkout Class

This class will alow you to generate the signature and will hold all the informtion needed to build a form for the web checkout endpoint in PayU Latam.

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
