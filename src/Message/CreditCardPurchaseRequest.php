<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo CrediCard Purchase Request
 */
class CreditCardPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();

        if ( ! isset( $data['Brq_requestedservices'] ) || empty( $data['Brq_requestedservices'] ) ) {
        	$data['Brq_requestedservices'] = 'mastercard,visa,maestro';
        }

        return $data;
    }
}
