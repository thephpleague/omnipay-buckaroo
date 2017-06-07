<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo iDeal Purchase Request
 */
class BuckarooPurchaseRequest extends AbstractRequest
{
	public function getPaymentMethod()
    {
        return $this->getParameter('paymentMethod');
    }

    public function setPaymentMethod($value)
    {
        return $this->setParameter('paymentMethod', $value);
    }

    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = $this->getPaymentMethod();

        return $data;
    }
}
