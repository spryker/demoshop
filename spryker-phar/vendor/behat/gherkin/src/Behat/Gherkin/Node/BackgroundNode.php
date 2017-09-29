<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Represents Gherkin Background.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class BackgroundNode implements ScenarioLikeInterface
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Behat\Gherkin\Node\StepNode[]
     */
    private $steps = [];

    /**
     * @var string
     */
    private $keyword;

    /**
     * @var integer
     */
    private $line;

    /**
     * Initializes background.
     *
     * @param null|string $title
     * @param \Behat\Gherkin\Node\StepNode[] $steps
     * @param string $keyword
     * @param integer $line
     */
    public function __construct($title, array $steps, $keyword, $line)
    {
        $this->title = $title;
        $this->steps = $steps;
        $this->keyword = $keyword;
        $this->line = $line;
    }

    /**
     * Returns node type string
     *
     * @return string
     */
    public function getNodeType()
    {
        return 'Background';
    }

    /**
     * Returns background title.
     *
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Checks if background has steps.
     *
     * @return Boolean
     */
    public function hasSteps()
    {
        return 0 < count($this->steps);
    }

    /**
     * Returns background steps.
     *
     * @return \Behat\Gherkin\Node\StepNode[]
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Returns background keyword.
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Returns background declaration line number.
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->line;
    }

}
