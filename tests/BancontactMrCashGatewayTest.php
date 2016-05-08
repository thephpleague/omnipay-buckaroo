<?php

namespace Omnipay\Buckaroo;

use Omnipay\Tests\GatewayTestCase;

class BancontactMrCashGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new BancontactMrCashGateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Buckaroo\Message\BancontactMrCashPurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }
}
