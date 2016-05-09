<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo Visa Purchase Request
 */
class VisaPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'visa';

        return $data;
    }
}
