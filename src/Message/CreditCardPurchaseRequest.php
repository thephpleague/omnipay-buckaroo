<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo Credit Card Purchase Request
 */
class CreditCardPurchaseRequest extends AbstractRequest
{

    public function setBrand($brand)
    {
        $this->setParameter('brand', $brand);
    }

    public function getData()
    {
        $data = parent::getData();
        $data['Brq_payment_method'] = $this->getBrand();

        return $data;
    }

    public function getBrand()
    {
        return $this->getParameter('brand');
    }
}
