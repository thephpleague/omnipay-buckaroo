<?php

namespace Omnipay\Buckaroo\Message;

use Omnipay\Tests\TestCase;

class TransferPurchaseRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new TransferPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
            array(
                'websiteKey' => 'web',
                'secretKey' => 'secret',
                'amount' => '12.00',
                'returnUrl' => 'https://www.example.com/return',
            )
        );
    }

    public function testGetData()
    {
        $data = $this->request->getData();

        $this->assertSame('transfer', $data['Brq_payment_method']);
    }
}
