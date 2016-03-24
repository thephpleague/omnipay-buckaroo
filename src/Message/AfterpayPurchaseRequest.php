<?php

namespace Omnipay\Buckaroo\Message;

/**
 * Buckaroo BancontactMrCash Purchase Request
 */
class AfterpayPurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();
        
        $data['Brq_payment_method'] = 'afterpaydigiaccept';
        $data['Brq_service_afterpaydigiaccept_action'] = 'Pay';
        $data['Brq_returnerror'] = $this->getErrorUrl();
        $data['Brq_returnreject'] = $this->getRejectUrl();
        $data['Brq_culture'] = $this->getParameter('culture');
        $data['Brq_service_afterpaydigiaccept_BillingGender'] = $this->getParameter('gender');
        $data['Brq_service_afterpaydigiaccept_BillingInitials'] = $this->getParameter('initials');
        $data['Brq_service_afterpaydigiaccept_BillingLastName'] = $this->getParameter('lastname');
        $data['Brq_service_afterpaydigiaccept_BillingBirthDate'] = $this->getParameter('birthdate');
        $data['Brq_service_afterpaydigiaccept_BillingStreet'] = $this->getParameter('street');
        $data['Brq_service_afterpaydigiaccept_BillingHouseNumber'] = $this->getParameter('housenumber');
        $data['Brq_service_afterpaydigiaccept_BillingPostalCode'] = $this->getParameter('postalcode');
        $data['Brq_service_afterpaydigiaccept_BillingCity'] = $this->getParameter('city');
        $data['Brq_service_afterpaydigiaccept_BillingCountry'] = $this->getParameter('country');
        $data['Brq_service_afterpaydigiaccept_BillingEmail'] = $this->getParameter('email');
        $data['Brq_service_afterpaydigiaccept_BillingPhoneNumber'] = $this->getParameter('phone');
        $data['Brq_service_afterpaydigiaccept_BillingLanguage'] = $this->getParameter('language');
        $data['Brq_service_afterpaydigiaccept_CustomerIPAddress'] = $this->getClientIp();
        $data['Brq_service_afterpaydigiaccept_ArticleDescription_1'] = $this->getParameter('articleDescription');
        $data['Brq_service_afterpaydigiaccept_ArticleId_1'] = $this->getParameter('articleId');
        $data['Brq_service_afterpaydigiaccept_ArticleQuantity_1'] = $this->getParameter('articleQuantity');
        $data['Brq_service_afterpaydigiaccept_ArticleUnitprice_1'] = $this->getParameter('articleUnitPrice');
        $data['Brq_service_afterpaydigiaccept_ArticleVatcategory_1'] = $this->getParameter('articleVatCategory');
        
        return $data;
    }

    /** Setters */
    public function setGender($gender)
    {
        $this->setParameter('gender', $gender);
    }

    public function setCulture($culture)
    {
        $this->setParameter('culture', $culture);
    }

    /**
     * @param mixed $initials
     */
    public function setInitials($initials)
    {
        $this->setParameter('initials',$initials);
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->setParameter('lastname',$lastname);
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->setParameter('birthdate',$birthdate);
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->setParameter('street',$street);
    }

    /**
     * @param mixed $housenumber
     */
    public function setHousenumber($housenumber)
    {
        $this->setParameter('housenumber',intval($housenumber));
    }

    /**
     * @param mixed $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->setParameter('postalcode',$postalcode);
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->setParameter('city',$city);
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->setParameter('country',$country);
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->setParameter('email',$email);
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->setParameter('phone',$phone);
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->setParameter('language',$language);
    }

    /**
     * @param mixed $articleDescription
     */
    public function setArticleDescription($articleDescription)
    {
        $this->setParameter('articleDescription',$articleDescription);
    }

    /**
     * @param mixed $articleId
     */
    public function setArticleId($articleId)
    {
        $this->setParameter('articleId',$articleId);
    }

    /**
     * @param mixed $articleQuantity
     */
    public function setArticleQuantity($articleQuantity)
    {
        $this->setParameter('articleQuantity',$articleQuantity);
    }

    /**
     * @param mixed $articleUnitPrice
     */
    public function setArticleUnitPrice($articleUnitPrice)
    {
        $this->setParameter('articleUnitPrice',$articleUnitPrice);
    }

    /**
     * @param mixed $articleVatCategory
     */
    public function setArticleVatCategory($articleVatCategory)
    {
        $this->setParameter('articleVatCategory',$articleVatCategory);
    }
}
