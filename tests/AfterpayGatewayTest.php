<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class AfterpayGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new AfterpayGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Buckaroo\Message\AfterpayPurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
