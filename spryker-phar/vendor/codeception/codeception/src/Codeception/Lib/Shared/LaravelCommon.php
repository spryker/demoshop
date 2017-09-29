<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Shared;

/**
 * Common functions for Laravel family
 *
 * @package Codeception\Lib\Shared
 */
trait LaravelCommon
{

    /**
     * Add a binding to the Laravel service container.
     * (https://laravel.com/docs/master/container)
     *
     * ``` php
     * <?php
     * $I->haveBinding('My\Interface', 'My\Implementation');
     * ?>
     * ```
     *
     * @param $abstract
     * @param $concrete
     *
     * @return void
     */
    public function haveBinding($abstract, $concrete)
    {
        $this->client->haveBinding($abstract, $concrete);
    }

    /**
     * Add a singleton binding to the Laravel service container.
     * (https://laravel.com/docs/master/container)
     *
     * ``` php
     * <?php
     * $I->haveSingleton('My\Interface', 'My\Singleton');
     * ?>
     * ```
     *
     * @param $abstract
     * @param $concrete
     *
     * @return void
     */
    public function haveSingleton($abstract, $concrete)
    {
        $this->client->haveBinding($abstract, $concrete, true);
    }

    /**
     * Add a contextual binding to the Laravel service container.
     * (https://laravel.com/docs/master/container)
     *
     * ``` php
     * <?php
     * $I->haveContextualBinding('My\Class', '$variable', 'value');
     *
     * // This is similar to the following in your Laravel application
     * $app->when('My\Class')
     *     ->needs('$variable')
     *     ->give('value');
     * ?>
     * ```
     *
     * @param $concrete
     * @param $abstract
     * @param $implementation
     *
     * @return void
     */
    public function haveContextualBinding($concrete, $abstract, $implementation)
    {
        $this->client->haveContextualBinding($concrete, $abstract, $implementation);
    }

    /**
     * Add an instance binding to the Laravel service container.
     * (https://laravel.com/docs/master/container)
     *
     * ``` php
     * <?php
     * $I->haveInstance('My\Class', new My\Class());
     * ?>
     * ```
     *
     * @param $abstract
     * @param $instance
     *
     * @return void
     */
    public function haveInstance($abstract, $instance)
    {
        $this->client->haveInstance($abstract, $instance);
    }

    /**
     * Register a handler than can be used to modify the Laravel application object after it is initialized.
     * The Laravel application object will be passed as an argument to the handler.
     *
     * ``` php
     * <?php
     * $I->haveApplicationHandler(function($app) {
     *     $app->make('config')->set(['test_value' => '10']);
     * });
     * ?>
     * ```
     *
     * @param $handler
     *
     * @return void
     */
    public function haveApplicationHandler($handler)
    {
        $this->client->haveApplicationHandler($handler);
    }

    /**
     * Clear the registered application handlers.
     *
     * ``` php
     * <?php
     * $I->clearApplicationHandlers();
     * ?>
     * ```
     *
     * @return void
     */
    public function clearApplicationHandlers()
    {
        $this->client->clearApplicationHandlers();
    }

}
