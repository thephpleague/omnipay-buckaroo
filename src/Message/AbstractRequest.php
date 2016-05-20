<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public $testEndpoint = 'https://testcheckout.buckaroo.nl/html/';
    public $liveEndpoint = 'https://checkout.buckaroo.nl/html/';

    public function getWebsiteKey()
    {
        return $this->getParameter('websiteKey');
    }

    public function setWebsiteKey($value)
    {
        return $this->setParameter('websiteKey', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getCulture()
    {
        return $this->getParameter('culture');
    }

    public function setCulture($value)
    {
        return $this->setParameter('culture', $value);
    }

    public function getRejectUrl()
    {
        return $this->getParameter('rejectUrl');
    }

    public function setRejectUrl($value)
    {
        return $this->setParameter('rejectUrl', $value);
    }

    public function getErrorUrl()
    {
        return $this->getParameter('errorUrl');
    }

    public function setErrorUrl($value)
    {
        return $this->setParameter('errorUrl', $value);
    }

    /**
     * Sets the request cancel URL.
     *
     * @param string $value
     * @return AbstractRequest Provides a fluent interface
     */
    public function setCancelUrl($value)
    {
        return $this->setParameter('cancelUrl', $value);
    }

    public function getData()
    {
        $this->validate('websiteKey', 'secretKey', 'amount', 'returnUrl');

        $data = array();
        $data['Brq_websitekey'] = $this->getWebsiteKey();
        $data['Brq_amount'] = $this->getAmount();
        $data['Brq_currency'] = $this->getCurrency();
        $data['Brq_invoicenumber'] = $this->getTransactionId();
        $data['Brq_description'] = $this->getDescription();
        $data['Brq_return'] = $this->getReturnUrl();
        $data['Brq_returncancel'] = $this->getCancelUrl();
        $data['Brq_returnreject'] = $this->getRejectUrl();
        $data['Brq_returnerror'] = $this->getErrorUrl();
        $data['Brq_culture'] = $this->getCulture();


        return $data;
    }

    public function generateSignature($data)
    {
        uksort($data, 'strcasecmp');

        $str = '';
        foreach ($data as $key => $value) {
            if (strcasecmp($key, 'Brq_signature') === 0) {
                continue;
            }
            $str .= $key.'='.$value;
        }

        return sha1($str.$this->getSecretKey());
    }

    public function sendData($data)
    {
        $data['Brq_signature'] = $this->generateSignature($data);

        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
