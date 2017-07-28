<?php

namespace Pyz\Client\HelloWorld;

use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Generated\Shared\Transfer\GreetingTransfer;

class HelloWorldZedStub implements HelloWorldZedStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    private $client;

    public function __construct(ZedRequestClientInterface $client)
    {
        $this->client = $client;
    }

    public function getGreeting()
    {
        return $this->client->call(
            '/hello-world/gateway/greeting',
            new GreetingTransfer()
        );
    }
}

