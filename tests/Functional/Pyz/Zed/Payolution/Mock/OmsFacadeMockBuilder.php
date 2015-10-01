<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Functional\Pyz\Zed\Payolution\Mock;

use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\AbstractAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\CaptureAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\PreAuthorizationAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\ReAuthorizationAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\RefundAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\ReversalAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\PayolutionFacadeMockBuilder;
use Generated\Zed\Ide\FactoryAutoCompletion\OmsBusiness;
use Pyz\Zed\Oms\Business\OmsFacade;
use Pyz\Zed\Oms\OmsConfig;
use Pyz\Zed\Oms\OmsDependencyProvider;
use SprykerEngine\Shared\Config;
use SprykerEngine\Zed\Kernel\Business\Factory as BusinessFactory;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerEngine\Zed\Kernel\Persistence\Factory as PersistenceFactory;
use SprykerFeature\Zed\Oms\Business\OmsDependencyContainer;
use SprykerFeature\Zed\Oms\Persistence\OmsQueryContainer;
use SprykerFeature\Zed\Payolution\Business\Api\Adapter\AdapterInterface;
use SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\Guzzle;
use SprykerFeature\Zed\Payolution\PayolutionConfig;
use SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\CapturePlugin;
use SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\ReAuthorizePlugin;
use SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\RefundPlugin;
use SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\RevertPlugin;
use SprykerFeature\Zed\PayolutionOmsConnector\PayolutionOmsConnectorDependencyProvider;
use SprykerFeature\Zed\PayoneOmsConnector\Communication\Plugin\Command\PreAuthorizePlugin;

class OmsFacadeMockBuilder
{

    /**
     * @var \PHPUnit_Framework_TestCase
     */
    private $testCase;

    /**
     * @var bool
     */
    private $isLiveMode = false;

    /**
     * @var bool[]
     */
    private $expectSuccess = [
        'preAuthorization' => true,
        'reAuthorization' => true,
        'reversal' => true,
        'capture' => true,
        'refund' => true,
    ];

    /**
     * @param \PHPUnit_Framework_TestCase $testCase
     * @param bool $isLiveMode
     */
    public function __construct(\PHPUnit_Framework_TestCase $testCase, $isLiveMode = false)
    {
        $this->testCase = $testCase;
        $this->isLiveMode = (bool) $isLiveMode;
    }

    /**
     * @param array $expectSuccess
     * @return OmsFacadeMockBuilder
     * @throws \Exception
     */
    public function setExpectSuccess(array $expectSuccess)
    {
        if (true === $this->isLiveMode) {
            foreach ($expectSuccess as $methodName => $successFlag) {
                if (false === $successFlag) {
                    throw new \Exception('Live mode doesn\'t support expected failures');
                }
            }
        }

        $this->expectSuccess = $expectSuccess;

        return $this;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|OmsFacade
     */
    public function build()
    {
        $factory = new BusinessFactory('Oms');
        $locator = Locator::getInstance();

        /** @var \PHPUnit_Framework_MockObject_MockObject|OmsFacade $mock */
        $mock = $this->testCase->getMock(
            'Pyz\Zed\Oms\Business\OmsFacade',
            $methods = [
                'getDependencyContainer',
            ],
            $arguments = [
                $factory,
                $locator,
            ]
        );

        // Dependency container got a mocked configuration
        $dependencyProviderContainer = $this->getOmsDependencyProviderContainer();
        $dependencyContainer = $this->getOmsDependencyContainer($dependencyProviderContainer);
        $mock
            ->expects($this->testCase->any())
            ->method('getDependencyContainer')
            ->will($this->testCase->returnValue($dependencyContainer));

        // Dependency provider uses custom path for state-machine XML files
        $mock->setExternalDependencies($dependencyProviderContainer);

        // Facade mock requires query-container to be set explicitly
        $queryContainer = $this->getOmsQueryContainer();
        $queryContainer->setContainer($dependencyProviderContainer);
        $queryContainer->setExternalDependencies($dependencyProviderContainer);
        $mock->setOwnQueryContainer($queryContainer);

        return $mock;
    }

    /**
     * @return Container
     */
    private function getOmsDependencyProviderContainer()
    {
        $container = new Container();
        $dependencyProvider = new OmsDependencyProvider();
        $dependencyProvider->provideBusinessLayerDependencies($container);
        $dependencyProvider->provideCommunicationLayerDependencies($container);
        $dependencyProvider->providePersistenceLayerDependencies($container);

        // Command plugins are using the Payolution facade mock to not make any real calls to the gateway
        $commandPreAuthorizePlugin = $this->getPayolutionCommandPreAuthorizePlugin();
        $commandReAuthorizePlugin = $this->getPayolutionCommandReAuthorizePlugin();
        $commandRevertPlugin = $this->getPayolutionCommandRevertPlugin();
        $commandCapturePlugin = $this->getPayolutionCommandCapturePlugin();
        $commandRefundPlugin = $this->getPayolutionCommandRefundPlugin();
        $container[OmsDependencyProvider::COMMAND_PLUGINS] = function () use (
            $commandPreAuthorizePlugin,
            $commandReAuthorizePlugin,
            $commandRevertPlugin,
            $commandCapturePlugin,
            $commandRefundPlugin
        ) {
            return [
                'PayolutionOmsConnector/PreAuthorize' => $commandPreAuthorizePlugin,
                'PayolutionOmsConnector/ReAuthorize' => $commandReAuthorizePlugin,
                'PayolutionOmsConnector/Revert' => $commandRevertPlugin,
                'PayolutionOmsConnector/Capture' => $commandCapturePlugin,
                'PayolutionOmsConnector/Refund' => $commandRefundPlugin,
            ];
        };

        $container[OmsDependencyProvider::CONDITION_PLUGINS] = function (Container $container) {
            return [
                'PayolutionOmsConnector/PreAuthorizationIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionPreAuthorizationIsApprovedPlugin(),
                'PayolutionOmsConnector/ReAuthorizationIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionReAuthorizationIsApprovedPlugin(),
                'PayolutionOmsConnector/ReversalIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionReversalIsApprovedPlugin(),
                'PayolutionOmsConnector/CaptureIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionCaptureIsApprovedPlugin(),
                'PayolutionOmsConnector/RefundIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionRefundIsApprovedPlugin(),
            ];
        };

        return $container;
    }

    /**
     * @return PreAuthorizePlugin
     */
    private function getPayolutionCommandPreAuthorizePlugin()
    {
        $locator = Locator::getInstance();
        /** @var PreAuthorizePlugin $plugin */
        $plugin = $locator->payolutionOmsConnector()->pluginCommandPreAuthorizePlugin();

        $adapterMock = new PreAuthorizationAdapterMock();
        $httpAdapter = $this->getHttpAdapter($adapterMock);
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($httpAdapter);
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @return ReAuthorizePlugin
     */
    private function getPayolutionCommandReAuthorizePlugin()
    {
        $locator = Locator::getInstance();
        /** @var ReAuthorizePlugin $plugin */
        $plugin = $locator->payolutionOmsConnector()->pluginCommandReAuthorizePlugin();

        $adapterMock = new ReAuthorizationAdapterMock();
        $httpAdapter = $this->getHttpAdapter($adapterMock);
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($httpAdapter);
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @return RevertPlugin
     */
    private function getPayolutionCommandRevertPlugin()
    {
        $locator = Locator::getInstance();
        /** @var RevertPlugin $plugin */
        $plugin = $locator->payolutionOmsConnector()->pluginCommandRevertPlugin();

        $adapterMock = new ReversalAdapterMock();
        $httpAdapter = $this->getHttpAdapter($adapterMock);
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($httpAdapter);
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @return CapturePlugin
     */
    private function getPayolutionCommandCapturePlugin()
    {
        $locator = Locator::getInstance();
        /** @var CapturePlugin $plugin */
        $plugin = $locator->payolutionOmsConnector()->pluginCommandCapturePlugin();

        $adapterMock = new CaptureAdapterMock();
        $httpAdapter = $this->getHttpAdapter($adapterMock);
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($httpAdapter);
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @return RefundPlugin
     */
    private function getPayolutionCommandRefundPlugin()
    {
        $locator = Locator::getInstance();
        /** @var RefundPlugin $plugin */
        $plugin = $locator->payolutionOmsConnector()->pluginCommandRefundPlugin();

        $adapterMock = new RefundAdapterMock();
        $httpAdapter = $this->getHttpAdapter($adapterMock);
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($httpAdapter);
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @param AbstractAdapterMock $adapterMock
     *
     * @return AdapterInterface
     */
    private function getHttpAdapter(AbstractAdapterMock $adapterMock)
    {
        if (false === $this->isLiveMode) {
            $adapterClassReflection = new \ReflectionClass($adapterMock);
            $successFlagKeyName = lcfirst(str_replace('AdapterMock', '', $adapterClassReflection->getShortName()));

            if (true === array_key_exists($successFlagKeyName, $this->expectSuccess)
                && false === $this->expectSuccess[$successFlagKeyName]
            ) {
                $adapterMock->expectFailure();
            }

            return $adapterMock;
        }

        $baseConfig = Config::getInstance();
        $locator = Locator::getInstance();
        $config = new PayolutionConfig($baseConfig, $locator);

        return new Guzzle($config->getGatewayUrl());
    }

    /**
     * @param AdapterInterface $adapter
     *
     * @return Container
     */
    private function getPayolutionPluginDependencyProviderContainer(AdapterInterface $adapter)
    {
        $payolutionFacadeMock = PayolutionFacadeMockBuilder::build($adapter, $this->testCase);

        $container = new Container();
        $dependencyProvider = new PayolutionOmsConnectorDependencyProvider();
        $dependencyProvider->provideCommunicationLayerDependencies($container);
        $dependencyProvider->provideBusinessLayerDependencies($container);
        $dependencyProvider->providePersistenceLayerDependencies($container);
        $container[PayolutionOmsConnectorDependencyProvider::FACADE_PAYOLUTION] = function () use (
            $payolutionFacadeMock
        ) {
            return $payolutionFacadeMock;
        };

        return $container;
    }

    /**
     * @param Container $dependencyProviderContainer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|OmsDependencyContainer
     */
    private function getOmsDependencyContainer(Container $dependencyProviderContainer)
    {
        /** @var OmsBusiness $factory */
        $factory = new BusinessFactory('Oms');
        $locator = Locator::getInstance();
        $config = $this->getOmsConfigMock();
        $dependencyContainer = new OmsDependencyContainer($factory, $locator, $config);

        return $dependencyContainer;

//        $dependencyContainerMock = $this->testCase->getMock(
//            'SprykerFeature\Zed\Oms\Business\OmsDependencyContainer',
//            $methods = [
//                'createOrderStateMachineBuilder',
//            ],
//            $arguments = [
//                $factory,
//                $locator,
//                $config,
//            ]
//        );
//
//        // Have the state machine builder use a custom path to the XML file
//        $stateMachineBuilder = $factory->createOrderStateMachineBuilder(
//            $factory->createProcessEvent(),
//            $factory->createProcessState(),
//            $factory->createProcessTransition(),
//            $factory->createProcessProcess($factory->createUtilDrawer(
//                $dependencyProviderContainer[OmsDependencyProvider::COMMAND_PLUGINS],
//                $dependencyProviderContainer[OmsDependencyProvider::CONDITION_PLUGINS]
//            )),
//            $xmlFolder = APPLICATION_ROOT_DIR . '/tests/Functional/Pyz/Zed/Payolution/Process/'
//        );
//        $dependencyContainerMock
//            ->expects($this->testCase->any())
//            ->method('createOrderStateMachineBuilder')
//            ->will($this->testCase->returnValue($stateMachineBuilder));
//
//        return $dependencyContainerMock;
    }

    /**
     * @return OmsConfig|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getOmsConfigMock()
    {
        $baseConfig = Config::getInstance();
        $locator = Locator::getInstance();
        $mock = $this->testCase->getMock(
            'Pyz\Zed\Oms\OmsConfig',
            $methods = [
                'selectProcess',
                'getActiveProcesses',
            ],
            $arguments = [
                $baseConfig,
                $locator,
            ]
        );

        // Let the config return our very own process
        $mock
            ->expects($this->testCase->any())
            ->method('selectProcess')
            ->will($this->testCase->returnValue('PayolutionPayment01'));
        $mock
            ->expects($this->testCase->any())
            ->method('getActiveProcesses')
            ->will($this->testCase->returnValue(['PayolutionPayment01']));

        return $mock;
    }

    /**
     * @return OmsQueryContainer
     */
    private function getOmsQueryContainer()
    {
        $factory = new PersistenceFactory('Oms');
        $locator = Locator::getInstance();
        $queryContainer = new OmsQueryContainer($factory, $locator);

        return $queryContainer;
    }

}
