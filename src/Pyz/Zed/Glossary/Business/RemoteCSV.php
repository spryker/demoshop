<?php

namespace Pyz\Zed\Glossary\Business;

use Guzzle\Http\Client as GuzzleClient;
use League\Csv\Reader;
use Pyz\Zed\Glossary\Business\Exception\RemoteUrlException;

class RemoteCSV implements ResourceReaderInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     * @throws RemoteUrlException
     */
    public function getContent()
    {
        $guzzleClient = new GuzzleClient();
        $response = $guzzleClient->get($this->url)->send();

        if ($response->isError() === true) {
            throw new RemoteUrlException($response->getReasonPhrase());
        }

        $csvData = $response->getBody(true);
        $csv = Reader::createFromString($csvData)->fetchAll();

        return $csv;

    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->url;
    }
}
