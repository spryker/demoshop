<?php

namespace Pyz\Zed\Setup\Communication\Console;

use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Zed\Console\Business\Model\Console;
use SprykerEngine\Zed\Kernel\BundleNameFinder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeBundleAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\IdeFactoryAutoCompletionGenerator;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ConstructableMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\GeneratedInterfaceMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\ClientMethodTagBuilder;
use SprykerEngine\Zed\Kernel\IdeAutoCompletion\MethodTagBuilder\YvesPluginMethodTagBuilder;
use SprykerFeature\Zed\Setup\Communication\Console\GenerateYvesIdeAutoCompletionConsole as SprykerGenerateYvesIdeAutoCompletionConsole;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateYvesIdeAutoCompletionConsole extends SprykerGenerateYvesIdeAutoCompletionConsole
{

    const COMMAND_NAME = 'setup:generate-yves-ide-auto-completion';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('This Command will generate the bundle ide auto completion interface for Yves.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generateYvesInterface();
        $this->generateYvesBundleInterface();
        $this->generateYvesFactoryInterface();
    }

    protected function generateYvesInterface()
    {
        $options = $this->getYvesDefaultOptions();

        $generator = new IdeAutoCompletionGenerator($options, $this);
        $generator
            ->addMethodTagBuilder(new GeneratedInterfaceMethodTagBuilder(
                [
                    GeneratedInterfaceMethodTagBuilder::OPTION_METHOD_STRING_PATTERN => ' * @method \\Generated\Yves\Ide\{{bundle}} {{methodName}}()',
                ]
            ))
        ;

        $generator->create();

        $this->info('Generated Yves IdeAutoCompletion file');
    }

    /**
     * @return array
     */
    protected function getYvesDefaultOptions()
    {
        $options = [
            IdeAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Yves\Ide',
            IdeAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Yves/Ide/',
            IdeAutoCompletionGenerator::OPTION_KEY_APPLICATION => 'Yves',
            IdeAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => new BundleNameFinder(
                [
                    IdeAutoCompletionGenerator::OPTION_KEY_APPLICATION => '*',
                    BundleNameFinder::OPTION_KEY_BUNDLE_PROJECT_PATH_PATTERN => $this->getProjectNamespace() . '/',
                ]
            ),
        ];

        return $options;
    }

    protected function generateYvesBundleInterface()
    {
        $options = $this->getYvesDefaultOptions();
        $options[IdeBundleAutoCompletionGenerator::OPTION_KEY_INTERFACE_NAME] = 'BundleAutoCompletion';

        $generator = new IdeBundleAutoCompletionGenerator($options);
        $generator
            ->addMethodTagBuilder(new YvesPluginMethodTagBuilder())
            ->addMethodTagBuilder(new ClientMethodTagBuilder())
        ;

        $generator->create();

        $this->info('Generated Yves IdeBundleAutoCompletion file');
    }

    protected function generateYvesFactoryInterface()
    {
        $methodTagGenerator = new ConstructableMethodTagBuilder([
            ConstructableMethodTagBuilder::OPTION_KEY_PATH_PATTERN => 'Communication/',
            ConstructableMethodTagBuilder::OPTION_KEY_APPLICATION => 'Yves',
            ConstructableMethodTagBuilder::OPTION_KEY_CLASS_NAME_PART_LEVEL => 4
        ]);

        $options = [
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_NAMESPACE => 'Generated\Yves\Ide\FactoryAutoCompletion',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_LOCATION_DIR => APPLICATION_SOURCE_DIR . '/Generated/Yves/Ide/',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_HAS_LAYERS => true,
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_APPLICATION => 'Yves',
            IdeFactoryAutoCompletionGenerator::OPTION_KEY_BUNDLE_NAME_FINDER => new BundleNameFinder(
                [
                    BundleNameFinder::OPTION_KEY_APPLICATION => '*',
                    BundleNameFinder::OPTION_KEY_BUNDLE_PROJECT_PATH_PATTERN => $this->getProjectNamespace() . '/',
                ]
            ),
        ];

        $generator = new IdeFactoryAutoCompletionGenerator($options);
        $generator->addMethodTagBuilder($methodTagGenerator);

        $generator->create();

        $this->info('Generated Yves IdeFactoryAutoCompletion file');
    }

    /**
     * @throws \Exception
     *
     * @return string
     */
    private function getProjectNamespace()
    {
        return Config::get(SystemConfig::PROJECT_NAMESPACES)[0];
    }

}
