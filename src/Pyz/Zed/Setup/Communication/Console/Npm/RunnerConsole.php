<?php

namespace Pyz\Zed\Setup\Communication\Console\Npm;

use SprykerFeature\Zed\Setup\Communication\Console\Npm\RunnerConsole as SprykerRunnerConsole;

class RunnerConsole extends SprykerRunnerConsole
{

    /**
     * @var array
     */
    protected $commands = [
        self::OPTION_TASK_BUILD_ALL => 'spy-setup',
        self::OPTION_TASK_BUILD_CORE => 'spy-setup core',
        self::OPTION_TASK_BUILD_ZED => 'spy-setup zed',
        self::OPTION_TASK_BUILD_YVES => 'spy-setup yves',
    ];

}
