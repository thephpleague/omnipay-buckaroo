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

    /**
     * @return string url rejectUrl
     */
    public function getRejectUrl()
    {
        return $this->getParameter('rejectUrl');
    }

    /**
     * sets the Reject URL which is used by buckaroo when
     * the payment is rejected.
     *
     * @param $value
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setRejectUrl($value)
    {
        return $this->setParameter('rejectUrl', $value);
    }

    /**
     * returns the error URL
     *
     * @return string errorUrl
     */
    public function getErrorUrl()
    {
        return $this->getParameter('errorUrl');
    }

    /**
     * sets the error URL which is used by buckaroo when
     * the payment results in an error
     *
     * @param $value
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setErrorUrl($value)
    {
        return $this->setParameter('errorUrl', $value);
    }

    /**
     * returns the push URL
     *
     * @return string pushUrl
     */
    public function getPushUrl()
    {
        return $this->getParameter('pushUrl');
    }

    /**
     * sets the push URL which is used by buckaroo when
     * the payment results is sent via push
     *
     * @param $value
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setPushUrl($value)
    {
        return $this->setParameter('pushUrl', $value);
    }

    /**
     * returns the push failure URL
     *
     * @return string pushfailureUrl
     */
    public function getPushFailureUrl()
    {
        return $this->getParameter('pushfailureUrl');
    }

    /**
     * sets the push failure URL which is used by buckaroo when
     * the payment error results is sent via push
     *
     * @param $value
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setPushFailureUrl($value)
    {
        return $this->setParameter('pushfailureUrl', $value);
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
        $data['Brq_push'] = $this->getPushUrl();
        $data['Brq_pushfailure'] = $this->getPushFailureUrl();

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
            $str .= $key.'='.urldecode($value);
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
