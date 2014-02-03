<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo iDeal Gateway
 */
class GlobalGateway extends CreditCardGateway
{
    public function getName()
    {
        return 'Buckaroo Global';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\BuckarooPurchaseRequest', $parameters);
    }
}
