<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Command\Composer;

use DateTime;
use Spryker\Command\CommandInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\Process\Process;

class ComposerInstallCommand implements CommandInterface
{

    /**
     * @param \Symfony\Component\Console\Style\StyleInterface $style
     *
     * @return voi
     */
    public function execute(StyleInterface $style)
    {
        $style->section('Setting up composer.');

        $pathToComposerPhar = SPRYKER_ROOT . '/composer.phar';

        if (!file_exists($pathToComposerPhar)) {
            $style->note('Composer not installed, start download...');

            $process = new Process('curl -sS https://getcomposer.org/installer | php', SPRYKER_ROOT);
            $process->run(function ($type, $buffer) use ($style) {
                if (Process::ERR === $type) {
                    $style->error($buffer);
                }
            });

            $style->success('Downloaded Composer.');
        }

        $fileMTime = (new DateTime())->setTimestamp(filemtime($pathToComposerPhar));
        $thirtyDaysAgo = new DateTime('- 30 days');

        if ($fileMTime < $thirtyDaysAgo) {
            $style->note('Composer is older then 30 days, update composer... ');

            $process = new Process($pathToComposerPhar . ' self-update');
            $process->run(function ($type, $buffer) use ($style) {
                if (Process::ERR === $type) {
                    $style->error($buffer);
                }
            });
            $style->success('Updated Composer.');
        }

        $style->success('Composer setup completed.');
    }

}
