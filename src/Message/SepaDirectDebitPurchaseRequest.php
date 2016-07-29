<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo iDeal Purchase Request
 */
class SepaDirectDebitPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = 'sepadirectdebit';

//        if ($this->getIssuer()) {
//            $data['Brq_service_sepa_direct_debit_issuer'] = $this->getIssuer();
//        }

        return $data;
    }
}
