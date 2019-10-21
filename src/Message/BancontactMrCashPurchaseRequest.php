<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo Bancontact Mr Cash Purchase Request
 */
class BancontactMrCashPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'bancontactmrcash';

        return $data;
    }
}
