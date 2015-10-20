<?php

namespace Pyz\Zed\Setup\Communication\Console;

use SprykerEngine\Zed\Kernel\BundleNameFinder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ClientMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\PropelMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeBundleAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeFactoryAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ConsoleMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ConstructableMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\EntityMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\FacadeMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\GeneratedInterfaceMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\PluginMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\QueryContainerMethodTagBuilder;
use SprykerFeature\Zed\Setup\Communication\Console\GenerateZedIdeAutoCompletionConsole as SprykerGenerateZedIdeAutoCompletionConsole;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateZedIdeAutoCompletionConsole extends SprykerGenerateZedIdeAutoCompletionConsole
{
    const MULTI_CORE_VENDOR_PATH_PATTERN = APPLICATION_VENDOR_DIR . '/*/spryker/Bundles/*/src';

    /**
     * @return array
     */
    protected function getZedDefaultOptions()
    {
        $options = [
            IdeAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Zed\Ide',
            IdeAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Zed/Ide/',
            IdeAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => $this->getMultiCoreBundleFinder(),
        ];

        return $options;
    }

    protected function generateZedBundleInterface()
    {
        $options = $this->getZedDefaultOptions();
        $options[IdeBundleAutoCompletionGenerator::OPTION_KEY_INTERFACE_NAME] = 'BundleAutoCompletion';

        $generator = new IdeBundleAutoCompletionGenerator($options);
        $generator
            ->addMethodTagBuilder(new FacadeMethodTagBuilder([
               FacadeMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
            ->addMethodTagBuilder(new QueryContainerMethodTagBuilder([
                QueryContainerMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
            ->addMethodTagBuilder(new EntityMethodTagBuilder([
                EntityMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
            ->addMethodTagBuilder(new ConsoleMethodTagBuilder([
                ClientMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
            ->addMethodTagBuilder(new ClientMethodTagBuilder([
                ClientMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
            ->addMethodTagBuilder(new PluginMethodTagBuilder([
                PluginMethodTagBuilder::OPTION_KEY_APPLICATION => 'Zed',
                PluginMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN
            ]))
        ;

        $generator->create('');

        $this->info('Generate Zed IdeBundleAutoCompletion file');
    }

    protected function generateZedFactoryInterface()
    {
        $businessMethodTagGenerator = new ConstructableMethodTagBuilder([
            ConstructableMethodTagBuilder::OPTION_KEY_PATH_PATTERN => 'Business/',
            ConstructableMethodTagBuilder::OPTION_KEY_APPLICATION => 'Zed',
            ConstructableMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
        ]);
        $communicationMethodTagGenerator = new ConstructableMethodTagBuilder([
            ConstructableMethodTagBuilder::OPTION_KEY_PATH_PATTERN => 'Communication/',
            ConstructableMethodTagBuilder::OPTION_KEY_APPLICATION => 'Zed',
            ConstructableMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
        ]);
        $persistenceMethodTagGenerator = new PropelMethodTagBuilder([
            ConstructableMethodTagBuilder::OPTION_KEY_PATH_PATTERN => 'Persistence/',
            ConstructableMethodTagBuilder::OPTION_KEY_APPLICATION => 'Zed',
            ConstructableMethodTagBuilder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
        ]);
        $options = [
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => $this->getMultiCoreBundleFinder(),
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Zed\Ide\FactoryAutoCompletion',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Zed/Ide/',
        ];

        $generator = new IdeFactoryAutoCompletionGenerator($options);
        $generator
            ->addMethodTagBuilder($businessMethodTagGenerator)
            ->addMethodTagBuilder($communicationMethodTagGenerator)
            ->addMethodTagBuilder($persistenceMethodTagGenerator)
        ;
        $generator->create('');

        $this->info('Generate Zed IdeFactoryAutoCompletion file');
    }

    /**
     * @return BundleNameFinder
     */
    protected function getMultiCoreBundleFinder()
    {
        $options = [
            BundleNameFinder::OPTION_KEY_VENDOR_PATH_PATTERN => self::MULTI_CORE_VENDOR_PATH_PATTERN,
        ];

        return new BundleNameFinder($options);
    }

}
