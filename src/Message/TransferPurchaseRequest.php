<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo Transfer Purchase Request
 */
class TransferPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'transfer';

        return $data;
    }
}
