<?php

use Spryker\Command\Composer\ComposerInstallCommand;
use Spryker\Configuration\Command\Command;
use Spryker\Configuration\Configuration;
use Spryker\Configuration\Section\Section;
use Spryker\Configuration\Stage\Stage;
use Symfony\Component\Console\Style\StyleInterface;

$composerInstallCommand = (new Command('composer installation'))->setExecutable(new ComposerInstallCommand());
$sectionComposer = (new Section('composer'))->addCommand($composerInstallCommand);

return (new Configuration())
    ->addStage((new Stage('development'))
        ->addSection((new Section('composer'))
            ->addCommand((new Command('composer installation'))
                ->setExecutable(new ComposerInstallCommand())
            )
            ->addCommand((new Command('callable command'))
                ->setExecutable(function (StyleInterface $style) {
                    $style->text('I am a callable');
                })
            )
            ->addCommand((new Command('cli command line call'))
                ->setExecutable('ls -la')
            )
        )
    );
