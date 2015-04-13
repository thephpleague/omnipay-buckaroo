<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo CreditCard Gateway
 */
class CreditCardGateway extends BuckarooGateway
{
    public function getName()
    {
        return 'Buckaroo CreditCard';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\CreditCardPurchaseRequest', $parameters);
    }
}
