<?php
use Guzzle\Common\Event;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use Guzzle\Parser\ParserRegistry;
use Guzzle\Plugin\Cookie\Cookie;
use Guzzle\Plugin\Cookie\CookieJar\ArrayCookieJar;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class Sao_Shared_Library_Legacy_Guzzle_Plugin_LegacyCookies
 * Fork of \Guzzle\Plugin\Cookie\CookiePlugin that automatically adds the cookies from the legacy platform
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Library_Legacy_Guzzle_Plugin_LegacyCookies implements EventSubscriberInterface
{
    /**
     * All cookies matching this pattern are triggered as session-cookies
     *
     * @const
     */
    const COOKIE_SESSION_REGEX = '/^saatchisc/';

    /** @var string|null */
    protected $sessionName;

    /**
     * @var string|null
     */
    protected $sessionId;

    /**
     * @see \Guzzle\Plugin\Cookie\CookiePlugin::$cookieJar
     */
    protected $cookieJar;

    /**
     * @param string      $domain
     * @param string      $sessionName
     * @param string      $sessionId
     * @param string|null $cart_cookie
     *
     * @throws Exception
     *
     * @see \Guzzle\Plugin\Cookie\CookiePlugin::__construct
     */
    public function __construct($domain, $sessionName, $sessionId, $cart_cookie = null)
    {
        assert('is_string($domain)') && assert('is_string($sessionName)') && assert('is_string($sessionId)')
            && assert(
            'is_string($cart_cookie) || is_null($cart_cookie)'
        );

        if (!preg_match(static::COOKIE_SESSION_REGEX, $sessionName)) {
            throw new Exception(
                'Session-name mismatch. Expected ' . static::COOKIE_SESSION_REGEX . ', but got ' . $sessionName);
        }

        $this->sessionName = $sessionName;
        $this->sessionId = $sessionId;

        $cookieJar = new ArrayCookieJar();
        $cookieJar->add(
            new Cookie(array('name' => $this->sessionName, 'value' => $this->sessionId, 'domain' => $domain))
        );
        if ($cart_cookie) {
            $cookieJar->add(new Cookie(array('name' => 'cart_cookie', 'value' => $cart_cookie, 'domain' => $domain)));
        }
        $this->cookieJar = $cookieJar;
    }

    /**
     * @see \Guzzle\Plugin\Cookie\CookiePlugin::getSubscribedEvents
     */
    public static function getSubscribedEvents()
    {
        return array(
            'request.before_send' => array('onRequestBeforeSend', 125),
            'request.sent'        => array('onRequestSent', 125)
        );
    }

    /**
     * @see \Guzzle\Plugin\Cookie\CookiePlugin::onRequestBeforeSend
     */
    public function onRequestBeforeSend(Event $event)
    {
        /** @var $request Guzzle\Http\Message\EntityEnclosingRequest */
        $request = $event['request'];
        if (!$request->getParams()->get('cookies.disable')) {
            $request->removeHeader('Cookie');
            // Find cookies that match this request
            foreach ($this->cookieJar->getMatchingCookies($request) as $cookie) {
                /** @var $cookie Cookie */
                $request->addCookie($cookie->getName(), $cookie->getValue());
            }
        }
    }

    /**
     * @see \Guzzle\Plugin\Cookie\CookiePlugin::onRequestSent
     */
    public function onRequestSent(Event $event)
    {
        $this->validateSessionCookieFromResponse($event['response'], $event['request']);
        $this->cookieJar->addCookiesFromResponse($event['response']);
    }

    /**
     * Checks if outgoing and incoming session-cookie match
     *
     * @param Guzzle\Http\Message\Response $response
     * @param Guzzle\Http\Message\Request $request
     * @return void
     * @throws Exception
     */
    protected function validateSessionCookieFromResponse(Response $response, Request $request)
    {
        if (!$this->sessionName) {
            return;
        }

        if (!($cookieHeader = $response->getHeader('Set-Cookie'))) {
            return;
        }

        /* @var Guzzle\Parser\Cookie\CookieParser $parser */
        $parser = ParserRegistry::getInstance()->getParser('cookie');
        foreach ($cookieHeader as $cookie) {
            if ($parsed = $request
                ? $parser->parseCookie($cookie, $request->getHost(), $request->getPath())
                : $parser->parseCookie($cookie)
            ) {
                // Break up cookie v2 into multiple cookies
                foreach ($parsed['cookies'] as $key => $value) {
                    if (preg_match(static::COOKIE_SESSION_REGEX, $key) && $this->sessionName != $key) {
                        throw new Exception(
                            'Session-name mismatch. Expected: ' . $this->sessionName . '=' . $this->sessionId
                            . ', but got back ' . $key . '=' . $value . ' from ' . $request->getHost());
                    }
                }
            }
        }
    }

}
