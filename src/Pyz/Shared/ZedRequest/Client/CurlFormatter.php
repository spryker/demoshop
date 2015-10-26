<?php

namespace Pyz\Shared\ZedRequest\Client;

use Guzzle\Http\Message\EntityEnclosingRequest;
use Guzzle\Http\Message\Header;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Url;
use Guzzle\Plugin\Cookie\Cookie;
use Guzzle\Plugin\Cookie\CookiePlugin;
use GuzzleHttp\Cookie\CookieJar;

/**
 * Class CurlFormatter it formats a Guzzle request to a cURL shell command
 */
class CurlFormatter
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var int
     */
    protected $currentLineLength;

    /**
     * @var string[]
     */
    protected $options;

    /**
     * @var int
     */
    protected $commandLineLength;

    /**
     * @param int $commandLineLength = 100
     */
    function __construct($commandLineLength = 100)
    {
        $this->commandLineLength = $commandLineLength;
    }

    /**
     * @param RequestInterface $request
     * @return string
     */
    public function format(RequestInterface $request)
    {
        $this->command = 'curl';
        $this->currentLineLength = strlen($this->command);
        $this->options = [];

        $this->extractArguments($request);
        $this->addOptionsToCommand();

        return $this->command;
    }

    /**
     * @param int $commandLineLength
     */
    public function setCommandLineLength($commandLineLength)
    {
        $this->commandLineLength = $commandLineLength;
    }

    /**
     * @param $name
     * @param null $value
     */
    protected function addOption($name, $value = null)
    {
        if (isset($this->options[$name])) {
            if (!is_array($this->options[$name])) {
                $this->options[$name] = (array)$this->options[$name];
            }

            $this->options[$name][] = $value;
        } else {
            $this->options[$name] = $value;
        }

    }

    /**
     * @param $part
     */
    protected function addCommandPart($part)
    {
        $this->command .= ' ';

        if ($this->commandLineLength > 0 && $this->currentLineLength + strlen($part) > $this->commandLineLength) {
            $this->currentLineLength = 0;
            $this->command .= "\\\n  ";
        }

        $this->command .= $part;
        $this->currentLineLength += strlen($part) + 2;
    }

    /**
     * @param RequestInterface $request
     */
    protected function extractHttpMethodArgument(RequestInterface $request)
    {
        if ('GET' !== $request->getMethod()) {
            if ('HEAD' === $request->getMethod()) {
                $this->addOption('-head');
            } else {
                $this->addOption('X', $request->getMethod());
            }
        }
    }

    /**
     * @param RequestInterface $request
     */
    protected function extractBodyArgument(RequestInterface $request)
    {


        if ($request->getMethod() === 'POST' && $contents = (string)$request->getBody()) {
            $this->addOption('d', escapeshellarg($contents));
        }

        //if get request has data Add G otherwise curl will make a post request
        if (!empty($this->options['d']) && ('GET' === $request->getMethod())) {
            $this->addOption('G');
        }
    }

    /**
     * @param RequestInterface $request
     */
    protected function extractCookiesArgument(RequestInterface $request)
    {

        $listeners = $request->getEventDispatcher()->getListeners('request.before_send');
        foreach ($listeners as $listener) {
            if ($listener[0] instanceof CookiePlugin) {
                $values = [];
                $scheme = $request->getScheme();
                $host   = $request->getHost();
                $path   = $request->getPath();
                /** @var SetCookie $cookie */
                foreach ($listener[0]->getCookieJar() as $cookie) {
                    if ($cookie->matchesPath($path) && $cookie->matchesDomain($host) &&
                        ! $cookie->isExpired() && ( ! $cookie->getSecure() || $scheme == 'https')) {
                        $values[] = $cookie->getName() . '=' . CookieJar::getCookieValue($cookie->getValue());
                    }
                }
                if ($values) {
                    $this->addOption('b', escapeshellarg(implode('; ', $values)));
                }
            }
        }
    }

    /**
     * @param RequestInterface $request
     */
    protected function extractHeadersArgument(RequestInterface $request)
    {
        $url = Url::factory($request->getUrl());

        /** @var Header $header */
        foreach ($request->getHeaders() as $header) {
            $name = strtolower($header->getName());
            $headerArray = $header->toArray();
            if ('host' === $name && (string)$headerArray[0] === $url->getHost()) {
                continue;
            }

            if ('user-agent' === $name) {
                $this->addOption('A', escapeshellarg($headerArray[0]));
                continue;
            }

            if ('cookie' === $name) {
                continue;
            }

            foreach ($headerArray as $headerValue) {
                $this->addOption('H', escapeshellarg("{$name}: {$headerValue}"));
            }
        }
    }

    protected function addOptionsToCommand()
    {
        ksort($this->options);

        if ($this->options) {
            foreach ($this->options as $name => $value) {
                if (is_array($value)) {
                    foreach ($value as $subValue) {
                        $this->addCommandPart("-{$name} {$subValue}");
                    }
                } else {
                    $this->addCommandPart("-{$name} {$value}");
                }
            }
        }
    }

    /**
     * @param RequestInterface $request
     */
    protected function extractArguments(RequestInterface $request)
    {
        $this->extractHttpMethodArgument($request);
        $this->extractBodyArgument($request);
        $this->extractCookiesArgument($request);
        $this->extractHeadersArgument($request);
        $this->extractUrlArgument($request);
    }

    /**
     * @param RequestInterface $request
     * @return Url
     */
    protected function extractUrlArgument(RequestInterface $request)
    {
        $url = Url::factory($request->getUrl());
        $url->setFragment(null);

        if (!$url->getScheme()) {
            $url = Url::factory('http://' . (string)$url);
        }

        $this->addCommandPart(escapeshellarg((string)$url));
    }
}