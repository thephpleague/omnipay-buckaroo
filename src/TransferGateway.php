<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo Transfer Gateway
 */
class TransferGateway extends CreditCardGateway
{
    public function getName()
    {
        return 'Buckaroo Transfer';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\TransferPurchaseRequest', $parameters);
    }
}
