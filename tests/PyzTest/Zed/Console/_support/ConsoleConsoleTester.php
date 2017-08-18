<?php
namespace PyzTest\Zed\Console;

use Codeception\Actor;
use Symfony\Component\Process\Process;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class ConsoleConsoleTester extends Actor
{

    use _generated\ConsoleConsoleTesterActions;

    /**
     * @return string
     */
    public function runConsoleApplication()
    {
        $cmd = 'vendor/bin/console';
        $process = new Process($cmd);
        $process->run();
        $output = $process->getOutput();

        return $output;
    }

}
