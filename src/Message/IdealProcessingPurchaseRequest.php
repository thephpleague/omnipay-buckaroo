<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo iDeal Processing Purchase Request
 */
class IdealProcessingPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'idealprocessing';

        if ($this->getIssuer()) {
            $data['Brq_service_idealprocessing_issuer'] = $this->getIssuer();
        }

        return $data;
    }
}
