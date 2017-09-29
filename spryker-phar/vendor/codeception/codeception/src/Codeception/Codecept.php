<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception;

use Codeception\Subscriber\ExtensionLoader;
use Coverage\Subscriber\Local;
use Coverage\Subscriber\LocalServer;
use Coverage\Subscriber\Printer;
use Coverage\Subscriber\RemoteServer;
use Event\PrintResultEvent;
use PHPUnit\Listener;
use PHPUnit\ResultPrinter\UI;
use PHPUnit\Runner;
use PHPUnit_Framework_TestResult;
use Subscriber\AutoRebuild;
use Subscriber\BeforeAfterTest;
use Subscriber\Bootstrap;
use Subscriber\Console;
use Subscriber\Dependencies;
use Subscriber\ErrorHandler;
use Subscriber\FailFast;
use Subscriber\GracefulTermination;
use Subscriber\Module;
use Subscriber\PrepareTest;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Codecept
{

    const VERSION = "2.3.5";

    /**
     * @var \Codeception\PHPUnit\Runner
     */
    protected $runner;

    /**
     * @var \PHPUnit_Framework_TestResult
     */
    protected $result;

    /**
     * @var \Codeception\CodeCoverage
     */
    protected $coverage;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected $dispatcher;

    /**
     * @var \Codeception\Subscriber\ExtensionLoader
     */
    protected $extensionLoader;

    /**
     * @var array
     */
    protected $options = [
        'silent' => false,
        'debug' => false,
        'steps' => false,
        'html' => false,
        'xml' => false,
        'json' => false,
        'tap' => false,
        'report' => false,
        'colors' => false,
        'coverage' => false,
        'coverage-xml' => false,
        'coverage-html' => false,
        'coverage-text' => false,
        'coverage-crap4j' => false,
        'groups' => null,
        'excludeGroups' => null,
        'filter' => null,
        'env' => null,
        'fail-fast' => false,
        'ansi' => true,
        'verbosity' => 1,
        'interactive' => true,
        'no-rebuild' => false,
        'quiet' => false,
    ];

    protected $config = [];

    /**
     * @var array
     */
    protected $extensions = [];

    public function __construct($options = [])
    {
        $this->result = new PHPUnit_Framework_TestResult;
        $this->dispatcher = new EventDispatcher();
        $this->extensionLoader = new ExtensionLoader($this->dispatcher);

        $baseOptions = $this->mergeOptions($options);
        $this->extensionLoader->bootGlobalExtensions($baseOptions); // extensions may override config

        $this->config = Configuration::config();
        $this->options = $this->mergeOptions($options); // options updated from config

        $this->registerSubscribers();
        $this->registerPHPUnitListeners();
        $this->registerPrinter();
    }

    /**
     * Merges given options with default values and current configuration
     *
     * @param array $options options
     *
     * @return array
     */
    protected function mergeOptions($options)
    {
        $config = Configuration::config();
        $baseOptions = array_merge($this->options, $config['settings']);
        return array_merge($baseOptions, $options);
    }

    /**
     * @return void
     */
    protected function registerPHPUnitListeners()
    {
        $listener = new Listener($this->dispatcher);
        $this->result->addListener($listener);
    }

    /**
     * @return void
     */
    public function registerSubscribers()
    {
        // required
        $this->dispatcher->addSubscriber(new GracefulTermination());
        $this->dispatcher->addSubscriber(new ErrorHandler());
        $this->dispatcher->addSubscriber(new Dependencies());
        $this->dispatcher->addSubscriber(new Bootstrap());
        $this->dispatcher->addSubscriber(new PrepareTest());
        $this->dispatcher->addSubscriber(new Module());
        $this->dispatcher->addSubscriber(new BeforeAfterTest());

        // optional
        if (!$this->options['no-rebuild']) {
            $this->dispatcher->addSubscriber(new AutoRebuild());
        }
        if (!$this->options['silent']) {
            $this->dispatcher->addSubscriber(new Console($this->options));
        }
        if ($this->options['fail-fast']) {
            $this->dispatcher->addSubscriber(new FailFast());
        }

        if ($this->options['coverage']) {
            $this->dispatcher->addSubscriber(new Local($this->options));
            $this->dispatcher->addSubscriber(new LocalServer($this->options));
            $this->dispatcher->addSubscriber(new RemoteServer($this->options));
            $this->dispatcher->addSubscriber(new Printer($this->options));
        }
        $this->dispatcher->addSubscriber($this->extensionLoader);
        $this->extensionLoader->registerGlobalExtensions();
    }

    /**
     * @return void
     */
    public function run($suite, $test = null, array $config = null)
    {
        ini_set(
            'memory_limit',
            isset($this->config['settings']['memory_limit']) ? $this->config['settings']['memory_limit'] : '1024M'
        );

        $config = $config ?: Configuration::config();

        $settings = Configuration::suiteSettings($suite, $config);

        $selectedEnvironments = $this->options['env'];
        $environments = Configuration::suiteEnvironments($suite);

        if (!$selectedEnvironments or empty($environments)) {
            $this->runSuite($settings, $suite, $test);
            return;
        }

        foreach (array_unique($selectedEnvironments) as $envList) {
            $envArray = explode(',', $envList);
            $config = [];
            foreach ($envArray as $env) {
                if (isset($environments[$env])) {
                    $currentEnvironment = isset($config['current_environment']) ? [$config['current_environment']] : [];
                    $config = Configuration::mergeConfigs($config, $environments[$env]);
                    $currentEnvironment[] = $config['current_environment'];
                    $config['current_environment'] = implode(',', $currentEnvironment);
                }
            }
            if (empty($config)) {
                continue;
            }
            $suiteToRun = $suite;
            if (!empty($envList)) {
                $suiteToRun .= ' (' . implode(', ', $envArray) . ')';
            }
            $this->runSuite($config, $suiteToRun, $test);
        }
    }

    public function runSuite($settings, $suite, $test = null)
    {
        $suiteManager = new SuiteManager($this->dispatcher, $suite, $settings);
        $suiteManager->initialize();
        $suiteManager->loadTests($test);
        $suiteManager->run($this->runner, $this->result, $this->options);
        return $this->result;
    }

    public static function versionString()
    {
        return 'Codeception PHP Testing Framework v' . self::VERSION;
    }

    /**
     * @return void
     */
    public function printResult()
    {
        $result = $this->getResult();
        $result->flushListeners();

        $printer = $this->runner->getPrinter();
        $printer->printResult($result);

        $this->dispatcher->dispatch(Events::RESULT_PRINT_AFTER, new PrintResultEvent($result, $printer));
    }

    /**
     * @return \PHPUnit_Framework_TestResult
     */
    public function getResult()
    {
        return $this->result;
    }

    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * @return void
     */
    protected function registerPrinter()
    {
        $printer = new UI($this->dispatcher, $this->options);
        $this->runner = new Runner();
        $this->runner->setPrinter($printer);
    }

}
