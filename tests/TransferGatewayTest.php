<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class TransferGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new TransferGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Buckaroo\Message\TransferPurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
