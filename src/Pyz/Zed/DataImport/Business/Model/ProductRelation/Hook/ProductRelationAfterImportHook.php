<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductRelation\Hook;

use Pyz\Zed\DataImport\Business\Exception\AfterImportHookException;
use Spryker\Zed\DataImport\Business\Model\DataImporterAfterImportInterface;
use Spryker\Zed\ProductRelation\Communication\Console\ProductRelationUpdaterConsole;
use Symfony\Component\Process\Process;

class ProductRelationAfterImportHook implements DataImporterAfterImportInterface
{

    /**
     * @throws \Pyz\Zed\DataImport\Business\Exception\AfterImportHookException
     *
     * @return void
     */
    public function afterImport()
    {
        $command = 'vendor/bin/console ' . ProductRelationUpdaterConsole::COMMAND_NAME;
        $process = new Process($command, APPLICATION_ROOT_DIR);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new AfterImportHookException(sprintf(
                'Failed to execute after import hook. Console command "%s" was not successful. Error: "%s"',
                $command,
                $process->getErrorOutput()
            ));
        }
    }

}
