<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception;

use ArrayAccess;
use Codeception\Exception\ModuleException;
use Codeception\Lib\Interfaces\RequiresPackage;
use Codeception\Lib\ModuleContainer;
use Codeception\Util\Shared\Asserts;
use Exception\ModuleConfigException;
use Exception\ModuleException as ExceptionModuleException;

/**
 * Basic class for Modules and Helpers.
 * You must extend from it while implementing own helpers.
 *
 * Public methods of this class start with `_` prefix in order to ignore them in actor classes.
 * Module contains **HOOKS** which allow to handle test execution routine.
 *
 */
abstract class Module
{

    use Asserts;

    /**
     * @var \Codeception\Lib\ModuleContainer
     */
    protected $moduleContainer;

    /**
     * By setting it to false module wan't inherit methods of parent class.
     *
     * @var bool
     */
    public static $includeInheritedActions = true;

    /**
     * Allows to explicitly set what methods have this class.
     *
     * @var array
     */
    public static $onlyActions = [];

    /**
     * Allows to explicitly exclude actions from module.
     *
     * @var array
     */
    public static $excludeActions = [];

    /**
     * Allows to rename actions
     *
     * @var array
     */
    public static $aliases = [];

    protected $storage = [];

    protected $config = [];

    protected $backupConfig = [];

    protected $requiredFields = [];

    /**
     * Module constructor.
     *
     * Requires module container (to provide access between modules of suite) and config.
     *
     * @param \Codeception\Lib\ModuleContainer $moduleContainer
     * @param null $config
     */
    public function __construct(ModuleContainer $moduleContainer, $config = null)
    {
        $this->moduleContainer = $moduleContainer;

        $this->backupConfig = $this->config;
        if (is_array($config)) {
            $this->_setConfig($config);
        }
    }

    /**
     * Allows to define initial module config.
     * Can be used in `_beforeSuite` hook of Helpers or Extensions
     *
     * ```php
     * <?php
     * public function _beforeSuite($settings = []) {
     *     $this->getModule('otherModule')->_setConfig($this->myOtherConfig);
     * }
     * ```
     *
     * @param $config
     *
     * @return void
     */
    public function _setConfig($config)
    {
        $this->config = $this->backupConfig = array_merge($this->config, $config);
        $this->validateConfig();
    }

    /**
     * Allows to redefine config for a specific test.
     * Config is restored at the end of a test.
     *
     * ```php
     * <?php
     * // cleanup DB only for specific group of tests
     * public function _before(Test $test) {
     *     if (in_array('cleanup', $test->getMetadata()->getGroups()) {
     *         $this->getModule('Db')->_reconfigure(['cleanup' => true]);
     *     }
     * }
     * ```
     *
     * @param $config
     *
     * @return void
     */
    public function _reconfigure($config)
    {
        $this->config = array_merge($this->backupConfig, $config);
        $this->onReconfigure();
        $this->validateConfig();
    }

    /**
     * HOOK to be executed when config changes with `_reconfigure`.
     *
     * @return void
     */
    protected function onReconfigure()
    {
        // update client on reconfigurations
    }

    /**
     * Reverts config changed by `_reconfigure`
     *
     * @return void
     */
    public function _resetConfig()
    {
        $this->config = $this->backupConfig;
    }

    /**
     * Validates current config for required fields and required packages.
     *
     * @throws Exception\ModuleConfigException
     * @throws \Codeception\Exception\ModuleException
     *
     * @return void
     */
    protected function validateConfig()
    {
        $fields = array_keys($this->config);
        if (array_intersect($this->requiredFields, $fields) != $this->requiredFields) {
            throw new ModuleConfigException(
                get_class($this),
                "\nOptions: " . implode(', ', $this->requiredFields) . " are required\n" .
                "Please, update the configuration and set all the required fields\n\n"
            );
        }
        if ($this instanceof RequiresPackage) {
            $errorMessage = '';
            foreach ($this->_requires() as $className => $package) {
                if (class_exists($className)) {
                    continue;
                }
                $errorMessage .= "Class $className can't be loaded, please add $package to composer.json\n";
            }
            if ($errorMessage) {
                throw new ModuleException($this, $errorMessage);
            }
        }
    }

    /**
     * Returns a module name for a Module, a class name for Helper
     *
     * @return string
     */
    public function _getName()
    {
        $moduleName = '\\' . get_class($this);

        if (strpos($moduleName, ModuleContainer::MODULE_NAMESPACE) === 0) {
            return substr($moduleName, strlen(ModuleContainer::MODULE_NAMESPACE));
        }

        return $moduleName;
    }

    /**
     * Checks if a module has required fields
     *
     * @return bool
     */
    public function _hasRequiredFields()
    {
        return !empty($this->requiredFields);
    }

    /**
     * **HOOK** triggered after module is created and configuration is loaded
     *
     * @return void
     */
    public function _initialize()
    {
    }

    /**
     * **HOOK** executed before suite
     *
     * @param array $settings
     *
     * @return void
     */
    public function _beforeSuite($settings = [])
    {
    }

    /**
     * **HOOK** executed after suite
     *
     * @return void
     */
    public function _afterSuite()
    {
    }

    /**
     * **HOOK** executed before step
     *
     * @param \Codeception\Step $step
     *
     * @return void
     */
    public function _beforeStep(Step $step)
    {
    }

    /**
     * **HOOK** executed after step
     *
     * @param \Codeception\Step $step
     *
     * @return void
     */
    public function _afterStep(Step $step)
    {
    }

    /**
     * **HOOK** executed before test
     *
     * @param \Codeception\TestInterface $test
     *
     * @return void
     */
    public function _before(TestInterface $test)
    {
    }

    /**
     * **HOOK** executed after test
     *
     * @param \Codeception\TestInterface $test
     *
     * @return void
     */
    public function _after(TestInterface $test)
    {
    }

    /**
     * **HOOK** executed when test fails but before `_after`
     *
     * @param \Codeception\TestInterface $test
     * @param \Exception $fail
     *
     * @return void
     */
    public function _failed(TestInterface $test, $fail)
    {
    }

    /**
     * Print debug message to the screen.
     *
     * @param $message
     *
     * @return void
     */
    protected function debug($message)
    {
        codecept_debug($message);
    }

    /**
     * Print debug message with a title
     *
     * @param $title
     * @param $message
     *
     * @return void
     */
    protected function debugSection($title, $message)
    {
        if (is_array($message) or is_object($message)) {
            $message = stripslashes(json_encode($message));
        }
        $this->debug("[$title] $message");
    }

    /**
     * Checks that module is enabled.
     *
     * @param $name
     *
     * @return bool
     */
    protected function hasModule($name)
    {
        return $this->moduleContainer->hasModule($name);
    }

    /**
     * Get all enabled modules
     *
     * @return array
     */
    protected function getModules()
    {
        return $this->moduleContainer->all();
    }

    /**
     * Get another module by its name:
     *
     * ```php
     * <?php
     * $this->getModule('WebDriver')->_findElements('.items');
     * ```
     *
     * @param $name
     *
     * @throws \Codeception\Exception\ModuleException
     *
     * @return \Codeception\Module
     */
    protected function getModule($name)
    {
        if (!$this->hasModule($name)) {
            throw new ExceptionModuleException(__CLASS__, "Module $name couldn't be connected");
        }
        return $this->moduleContainer->getModule($name);
    }

    /**
     * Get config values or specific config item.
     *
     * @param null $key
     *
     * @return array|mixed|null
     */
    public function _getConfig($key = null)
    {
        if (!$key) {
            return $this->config;
        }
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }
        return null;
    }

    protected function scalarizeArray($array)
    {
        foreach ($array as $k => $v) {
            if ($v !== null && !is_scalar($v)) {
                $array[$k] = (is_array($v) || $v instanceof ArrayAccess)
                    ? $this->scalarizeArray($v)
                    : (string)$v;
            }
        }

        return $array;
    }

}
