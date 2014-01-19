<?php

namespace Omnipay\Buckaroo\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Buckaroo Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    const SUCCESS = '190';

    public function isSuccessful()
    {
        return static::SUCCESS === $this->getCode();
    }

    public function getCode()
    {
        if (isset($this->data['Brq_statuscode'])) {
            return $this->data['Brq_statuscode'];
        }
    }

    public function getMessage()
    {
        if (isset($this->data['Brq_statusmessage'])) {
            return $this->data['Brq_statusmessage'];
        }
    }

    public function getTransactionReference()
    {
        if (isset($this->data['Brq_payment'])) {
            return $this->data['Brq_payment'];
        }
    }
}
