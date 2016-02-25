<?php

namespace Pyz\Zed\Installer\Business\ProgressBar;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class ProgressBarBuilder
{
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var string
     */
    protected $barTitle;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param int $count
     * @param string $barTitle
     */
    public function __construct(OutputInterface $output, $count, $barTitle)
    {
        $this->output = $output;
        $this->count = $count;
        $this->barTitle = $barTitle;
    }

    /**
     * @return void
     */
    protected function setupFormat()
    {
        ProgressBar::setFormatDefinition('normal', ' <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>%percent%% (%current%/%max%) %elapsed:6s%</fg=yellow>');
        ProgressBar::setFormatDefinition('normal_nomax', ' <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>(%max%)</fg=yellow>');
        ProgressBar::setFormatDefinition('verbose', " <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>[%bar%] %percent%% (%current%/%max%) %elapsed:6s% %memory:6s%</fg=yellow>\x0D");
        ProgressBar::setFormatDefinition('verbose_nomax', ' <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>(%max%)</fg=yellow>');
        ProgressBar::setFormatDefinition('very_verbose', " <fg=yellow>*</fg=yellow> <fg=green>%barTitle:-20s%</fg=green> %bar% <fg=yellow>%percent%% (%current%/%max%) %memory% (%elapsed%/%remaining%)</fg=yellow>\x0D");
        ProgressBar::setFormatDefinition('very_verbose_nomax', ' <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>(%max%)</fg=yellow>');
        ProgressBar::setFormatDefinition('debug', " <fg=yellow>*</fg=yellow> <fg=green>%barTitle:-20s%</fg=green> %bar% <fg=yellow>%percent:20s%% [%current%/%max%] Memory: %memory%, Elapsed: %elapsed%, Remaining: %remaining%</fg=yellow>\x0D");
        ProgressBar::setFormatDefinition('debug_nomax', ' <fg=yellow>*</fg=yellow> <fg=green>%barTitle%</fg=green> <fg=yellow>(%max%)</fg=yellow>');
    }

    /**
     * @return \Symfony\Component\Console\Helper\ProgressBar
     */
    public function build()
    {
        $this->setupFormat();
        $progressBar = new ProgressBar($this->output, $this->count);
        $progressBar->setMessage($this->barTitle, 'barTitle');
        $progressBar->setBarWidth(20);

        if ($this->output->getVerbosity() > OutputInterface::VERBOSITY_VERBOSE) {
            $progressBar->setBarCharacter($done = "\033[32m●\033[0m");
            $progressBar->setEmptyBarCharacter($empty = "\033[31m●\033[0m");
            $progressBar->setProgressCharacter($progress = "\033[32m►\033[0m");
            $progressBar->setBarWidth(50);
        }

        return $progressBar;
    }
}
