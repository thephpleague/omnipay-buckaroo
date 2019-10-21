<?php

namespace Omnipay\Buckaroo;

/**
 * Buckaroo Bancontact Mr Cash Gateway
 */
class BancontactMrCashGateway extends CreditCardGateway
{
    public function getName()
    {
        return 'Buckaroo Bancontact MrCash';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Buckaroo\Message\BancontactMrCashPurchaseRequest', $parameters);
    }
}
