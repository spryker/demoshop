<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin;

use InvalidArgumentException as PhpInvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfProviderAdapter;
use Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\InvalidArgumentException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener as BaseUsernamePasswordFormAuthenticationListener;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\Security\Http\Session\SessionAuthenticationStrategyInterface;

/**
 * Most of this class is taken from \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener
 * This implementation simply adjusts the parts of the code that are currently causing issues with incompatibilities
 * of Symfony-HttpFoundation and Symfony-Security. This is a temporary workaround that will be removed as soon
 * as the incompatibility issues have been resolved.
 */
class UsernamePasswordFormAuthenticationListener extends BaseUsernamePasswordFormAuthenticationListener
{

    /**
     * @var null|\Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfProviderAdapter|\Symfony\Component\Security\Csrf\CsrfTokenManagerInterface
     */
    private $csrfTokenManager;

    /**
     * {@inheritdoc}
     * @throws \Symfony\Component\Security\Core\Exception\InvalidArgumentException
     */
    public function __construct(
        TokenStorageInterface $securityContext,
        AuthenticationManagerInterface $authenticationManager,
        SessionAuthenticationStrategyInterface $sessionStrategy,
        HttpUtils $httpUtils,
        $providerKey,
        AuthenticationSuccessHandlerInterface $successHandler,
        AuthenticationFailureHandlerInterface $failureHandler,
        array $options = [],
        LoggerInterface $logger = null,
        EventDispatcherInterface $dispatcher = null,
        $csrfTokenManager = null
    ) {
        if ($csrfTokenManager instanceof CsrfProviderInterface) {
            $csrfTokenManager = new CsrfProviderAdapter($csrfTokenManager);
        } elseif (null !== $csrfTokenManager && !$csrfTokenManager instanceof CsrfTokenManagerInterface) {
            throw new InvalidArgumentException(
                'The CSRF token manager should be an instance of CsrfProviderInterface or CsrfTokenManagerInterface.'
            );
        }

        parent::__construct(
            $securityContext,
            $authenticationManager,
            $sessionStrategy,
            $httpUtils,
            $providerKey,
            $successHandler,
            $failureHandler,
            $options,
            $logger,
            $dispatcher,
            $csrfTokenManager
        );

        $this->csrfTokenManager = $csrfTokenManager;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @throws \Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
     */
    protected function attemptAuthentication(Request $request)
    {
        $getParams = $request->query->all();
        $postParams = $request->request->all();
        $params = array_merge($getParams, $postParams);

        if (null !== $this->csrfTokenManager) {
            $csrfToken = $this->findRequestParameterDeep($params, $this->options['csrf_parameter']);

            if (false === $this->csrfTokenManager->isTokenValid(new CsrfToken($this->options['intention'], $csrfToken))) {
                throw new InvalidCsrfTokenException('Invalid CSRF token.');
            }
        }

        if ($this->options['post_only']) {
            $params = $postParams;
        }

        $username = trim($this->findRequestParameterDeep($params, $this->options['username_parameter']));
        $password = $this->findRequestParameterDeep($params, $this->options['password_parameter']);

        $request->getSession()->set(Security::LAST_USERNAME, $username);

        return $this->authenticationManager->authenticate(new UsernamePasswordToken($username, $password, $this->providerKey));
    }

    /**
     * This is a copy from \Symfony\Component\HttpFoundation\ParameterBag::get() that circumvents the
     * deprecation notification for deep parameter look-ups.
     *
     * @param array $params
     * @param string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed|null
     */
    protected function findRequestParameterDeep(array $params, $key)
    {
        if (false === $pos = strpos($key, '[')) {
            return array_key_exists($key, $params) ? $params[$key] : null;
        }

        $root = substr($key, 0, $pos);
        if (!array_key_exists($root, $params)) {
            return null;
        }

        $value = $params[$root];
        $currentKey = null;
        for ($i = $pos, $c = strlen($key); $i < $c; ++$i) {
            $char = $key[$i];

            if ('[' === $char) {
                if (null !== $currentKey) {
                    throw new PhpInvalidArgumentException(sprintf('Malformed path. Unexpected "[" at position %d.', $i));
                }

                $currentKey = '';
            } elseif (']' === $char) {
                if (null === $currentKey) {
                    throw new PhpInvalidArgumentException(sprintf('Malformed path. Unexpected "]" at position %d.', $i));
                }

                if (!is_array($value) || !array_key_exists($currentKey, $value)) {
                    return null;
                }

                $value = $value[$currentKey];
                $currentKey = null;
            } else {
                if (null === $currentKey) {
                    throw new PhpInvalidArgumentException(sprintf('Malformed path. Unexpected "%s" at position %d.', $char, $i));
                }

                $currentKey .= $char;
            }
        }

        if (null !== $currentKey) {
            throw new PhpInvalidArgumentException(sprintf('Malformed path. Path must end with "]".'));
        }

        return $value;
    }

}
