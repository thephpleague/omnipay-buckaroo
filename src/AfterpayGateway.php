<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo Afterpay Gateway
 */
class AfterpayGateway extends CreditCardGateway
{
    public function getName()
    {
        return 'Buckaroo Afterpay';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\AfterpayPurchaseRequest', $parameters);
    }
}
