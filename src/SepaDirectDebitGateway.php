<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo iDeal Gateway
 */
class SepaDirectDebitGateway extends BuckarooGateway
{
    public function getName()
    {
        return 'Buckaroo SepaDirectDebit';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\SepaDirectDebitPurchaseRequest', $parameters);
    }
}
