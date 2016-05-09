<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class VisaGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new VisaGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Buckaroo\Message\VisaPurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

    public function testPurchaseReturn()
    {
        $request = $this->gateway->completePurchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Buckaroo\Message\CompletePurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
