<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo BancontactMrCash Purchase Request
 */
class BancontactMrCashPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'BancontactMrCash';

        return $data;
    }
}
