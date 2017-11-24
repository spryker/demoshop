<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

// FORM REFACTORER
$finder = new class
{
    /**
     * @var array
     */
    protected $refactoredModules = [
    ];

    /**
     * @var string
     */
    protected $pathToZedForms = __DIR__ . '/vendor/spryker/spryker/Bundles/*/src/Spryker/Zed/';

    /**
     * @var string
     */
    protected $moduleRoot = __DIR__ . '/vendor/spryker/spryker/Bundles/';

    /**
     * @return void
     */
    public function printModuleNames()
    {
        $moduleNames = [];
        foreach ($this->getFinder($this->pathToZedForms) as $file) {
            $relPathNameParts = explode(DIRECTORY_SEPARATOR, $file->getRelativePathname());
            $module = array_shift($relPathNameParts);
            if (!isset($moduleNames[$module])) {
                echo $module . PHP_EOL;
                $moduleNames[$module] = $module;
            }
        }
    }

    /**
     * @param string $module
     *
     * @return void
     */
    public function refactorZedFormsInCoreModule(string $module)
    {
        foreach ($this->getFinder($this->pathToZedForms . $module) as $file) {
            $form = str_replace('.php', '', $file->getFilename());
            $content = $file->getContents();
            if (!$this->validateZedFormInCore($module, $form, $content)) {
                $this->refactorForm($file);
            }

            $content = $file->getContents();

            echo $file->getPathName() . PHP_EOL;
            $searchAndReplace = [
                'use Symfony\Component\Form\AbstractType;' => 'use Spryker\Zed\Kernel\Communication\Form\AbstractType',
                'new Select2ComboBoxType()' => 'Select2ComboBoxType::class',
            ];
            $replacedContent = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
            $replacedContent = preg_replace('/add\((.*), \'text\'/', 'add($1, TextType::class', $replacedContent);

            echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($replacedContent) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
        }
    }

    /**
     * @param \Symfony\Component\Finder\SplFileInfo $file
     *
     * @return void
     */
    protected function refactorForm(SplFileInfo $file)
    {
        $content = $file->getContents();
        $searchAndReplace = [
            'use Symfony\Component\Form\AbstractType;' => 'use Spryker\Zed\Kernel\Communication\Form\AbstractType;',
            'new Select2ComboBoxType()' => 'Select2ComboBoxType::class',
        ];
        $replacedContent = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
        $replacedContent = preg_replace('/add\((.*), \'text\'/', 'add($1, TextType::class', $replacedContent);
        $replacedContent = preg_replace('/add\((.*), \'textarea\'/', 'add($1, TextareaType::class', $replacedContent);
        $replacedContent = preg_replace('/add\((.*), \'hidden\'/', 'add($1, HiddenType::class', $replacedContent);
        $replacedContent = preg_replace('/add\((.*), \'checkbox\'/', 'add($1, CheckboxType::class', $replacedContent);
        $replacedContent = preg_replace('/add\((.*), \'money\'/', 'add($1, MoneyType::class', $replacedContent);

        $filesystem = new Filesystem();
        $filesystem->dumpFile($file->getPathname(), $replacedContent);
    }

    /**
     * @param string $module
     * @param string $form
     * @param string $content
     *
     * @return bool
     */
    public function validateZedFormInCore(string $module, string $form, string $content)
    {
        $isValid = true;
        if (!$this->validateFactoryContainsNoNewForm($module, $form)) {
            $isValid = false;
        }
        if (!$this->validateFormContainsNoGetName($form, $content)) {
            $isValid = false;
        }

        return $isValid;
    }

    /**
     * @param string $module
     * @param string $form
     *
     * @return bool
     */
    protected function validateFactoryContainsNoNewForm($module, $form)
    {
        $isValid = true;
        $pathToFactory = sprintf('%1$s%2$s/src/Spryker/Zed/%2$s/Communication/%2$sCommunicationFactory.php', $this->moduleRoot, $module);
        $factoryContent = file_get_contents($pathToFactory);
        $search = 'new ' . $form;
        if (preg_match('/' . $search . '/', $factoryContent)) {
            $factoryName = sprintf('%sCommunicationFactory', $module);
            echo($factoryName . ' contains ' . $search) . PHP_EOL;

            $isValid = false;
        }

        return $isValid;
    }

    /**
     * @param string $form
     * @param string $content
     *
     * @return bool
     */
    protected function validateFormContainsNoGetName(string $form, string $content)
    {
        $isValid = true;
        if (preg_match('/getName\(/', $content)) {
            echo($form . ' contains getName() method, remove it.') . PHP_EOL;

            $isValid = false;
        }

        return $isValid;
    }

    /**
     * @param string $form
     * @param string $content
     *
     * @return bool
     */
    protected function validateFormContainsNoConstruct(string $form, string $content)
    {
        $isValid = true;
        if (preg_match('/__construct\(/', $content)) {
            echo($form . ' contains getName() method, remove it.') . PHP_EOL;

            $isValid = false;
        }

        return $isValid;
    }

    /**
     * @param string $directory
     *
     * @return \Symfony\Component\Finder\Finder|\Symfony\Component\Finder\SplFileInfo[]
     */
    protected function getFinder($directory)
    {
        $symfonyFinder = new Finder();

        return $symfonyFinder->in($directory)->name('*.php')->contains('/extends AbstractType/')->contains('/implements FormTypeInterface/');
    }
};

//$finder->printModuleNames();
$finder->refactorZedFormsInCoreModule('Acl');

// Run for Mudle test with coverage
// If not fully covered, add test
// If fully covered, refactor and validate
