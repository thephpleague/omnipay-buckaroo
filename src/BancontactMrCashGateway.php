<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo BancontactMrCash Gateway
 */
class BancontactMrCashGateway extends CreditCardGateway
{
    public function getName()
    {
        return 'Buckaroo BancontactMrCash';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\BancontactMrCashPurchaseRequest', $parameters);
    }
}
