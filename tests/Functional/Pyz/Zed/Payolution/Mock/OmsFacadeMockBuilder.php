<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Functional\Pyz\Zed\Payolution\Mock;

use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\AbstractAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\CaptureAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\PreAuthorizationAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\PayolutionFacadeMockBuilder;
use Generated\Zed\Ide\FactoryAutoCompletion\OmsBusiness;
use Pyz\Zed\Oms\Business\OmsFacade;
use Pyz\Zed\Oms\OmsConfig;
use SprykerEngine\Shared\Config;
use SprykerEngine\Zed\Kernel\Business\Factory as BusinessFactory;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerEngine\Zed\Kernel\Persistence\Factory as PersistenceFactory;
use SprykerFeature\Zed\Oms\Business\OmsDependencyContainer;
use SprykerFeature\Zed\Oms\OmsDependencyProvider;
use SprykerFeature\Zed\Oms\Persistence\OmsQueryContainer;
use SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\CapturePlugin;
use SprykerFeature\Zed\PayolutionOmsConnector\PayolutionOmsConnectorDependencyProvider;
use SprykerFeature\Zed\PayoneOmsConnector\Communication\Plugin\Command\PreAuthorizePlugin;

class OmsFacadeMockBuilder
{

    /**
     * @var \PHPUnit_Framework_TestCase
     */
    private $testCase;

    /**
     * @param \PHPUnit_Framework_TestCase $testCase
     */
    public function __construct(\PHPUnit_Framework_TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    /**
     * @param \PHPUnit_Framework_TestCase $testCase
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|OmsFacade
     */
    public static function create(\PHPUnit_Framework_TestCase $testCase)
    {
        $builder = new self($testCase);

        return $builder->build();
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
        $commandCapturePlugin = $this->getPayolutionCommandCapturePlugin();
        $container[OmsDependencyProvider::COMMAND_PLUGINS] = function () use ($commandPreAuthorizePlugin, $commandCapturePlugin) {
            return [
                'PayolutionOmsConnector/PreAuthorize' => $commandPreAuthorizePlugin,
                'PayolutionOmsConnector/Capture' => $commandCapturePlugin,
            ];
        };

        $container[OmsDependencyProvider::CONDITION_PLUGINS] = function (Container $container) {
            return [
                'PayolutionOmsConnector/PreAuthorizationIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionPreAuthorizationIsApprovedPlugin(),
                'PayolutionOmsConnector/CaptureIsApproved' => $container
                    ->getLocator()
                    ->payolutionOmsConnector()
                    ->pluginConditionCaptureIsApprovedPlugin(),
            ];
        };

        return $container;
    }

    /**
     * @return PreAuthorizePlugin
     */
    private function getPayolutionCommandPreAuthorizePlugin()
    {
        $adapterMock = new PreAuthorizationAdapterMock();
        $locator = Locator::getInstance();
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($adapterMock);
        $plugin = $locator->payolutionOmsConnector()->pluginCommandPreAuthorizePlugin();
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @return CapturePlugin
     */
    private function getPayolutionCommandCapturePlugin()
    {
        $adapterMock = new CaptureAdapterMock();
        $locator = Locator::getInstance();
        $dependencyProviderContainer = $this->getPayolutionPluginDependencyProviderContainer($adapterMock);
        $plugin = $locator->payolutionOmsConnector()->pluginCommandCapturePlugin();
        $plugin->setExternalDependencies($dependencyProviderContainer);

        return $plugin;
    }

    /**
     * @param AbstractAdapterMock $adapterMock
     *
     * @return Container
     */
    private function getPayolutionPluginDependencyProviderContainer(AbstractAdapterMock $adapterMock)
    {
        $payolutionFacadeMock = PayolutionFacadeMockBuilder::build($adapterMock, $this->testCase);

        $container = new Container();
        $dependencyProvider = new PayolutionOmsConnectorDependencyProvider();
        $dependencyProvider->provideCommunicationLayerDependencies($container);
        $dependencyProvider->provideBusinessLayerDependencies($container);
        $dependencyProvider->providePersistenceLayerDependencies($container);
        $container[PayolutionOmsConnectorDependencyProvider::FACADE_PAYOLUTION] = function () use ($payolutionFacadeMock) {
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
        $dependencyContainerMock = $this->testCase->getMock(
            'SprykerFeature\Zed\Oms\Business\OmsDependencyContainer',
            $methods = [
                'createOrderStateMachineBuilder',
            ],
            $arguments = [
                $factory,
                $locator,
                $config,
            ]
        );

        // Have the state machine builder use a custom path to the XML file
        $stateMachineBuilder = $factory->createOrderStateMachineBuilder(
            $factory->createProcessEvent(),
            $factory->createProcessState(),
            $factory->createProcessTransition(),
            $factory->createProcessProcess($factory->createUtilDrawer(
                $dependencyProviderContainer[OmsDependencyProvider::COMMAND_PLUGINS],
                $dependencyProviderContainer[OmsDependencyProvider::CONDITION_PLUGINS]
            )),
            $xmlFolder = APPLICATION_ROOT_DIR . '/tests/Functional/Pyz/Zed/Payolution/'
        );
        $dependencyContainerMock
            ->expects($this->testCase->any())
            ->method('createOrderStateMachineBuilder')
            ->will($this->testCase->returnValue($stateMachineBuilder));

        return $dependencyContainerMock;
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
