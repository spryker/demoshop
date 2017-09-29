<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Represents Gherkin Feature.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class FeatureNode implements KeywordNodeInterface, TaggedNodeInterface
{

    /**
     * @var null|string
     */
    private $title;

    /**
     * @var null|string
     */
    private $description;

    /**
     * @var string[]
     */
    private $tags = [];

    /**
     * @var null|\Behat\Gherkin\Node\BackgroundNode
     */
    private $background;

    /**
     * @var \Behat\Gherkin\Node\ScenarioInterface[]
     */
    private $scenarios = [];

    /**
     * @var string
     */
    private $keyword;

    /**
     * @var string
     */
    private $language;

    /**
     * @var null|string
     */
    private $file;

    /**
     * @var integer
     */
    private $line;

    /**
     * Initializes feature.
     *
     * @param null|string $title
     * @param null|string $description
     * @param string[] $tags
     * @param null|\Behat\Gherkin\Node\BackgroundNode $background
     * @param \Behat\Gherkin\Node\ScenarioInterface[] $scenarios
     * @param string $keyword
     * @param string $language
     * @param null|string $file
     * @param integer $line
     */
    public function __construct(
        $title,
        $description,
        array $tags,
        BackgroundNode $background,
        array $scenarios,
        $keyword,
        $language,
        $file,
        $line
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->background = $background;
        $this->scenarios = $scenarios;
        $this->keyword = $keyword;
        $this->language = $language;
        $this->file = $file;
        $this->line = $line;
    }

    /**
     * Returns node type string
     *
     * @return string
     */
    public function getNodeType()
    {
        return 'Feature';
    }

    /**
     * Returns feature title.
     *
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Checks if feature has a description.
     *
     * @return Boolean
     */
    public function hasDescription()
    {
        return !empty($this->description);
    }

    /**
     * Returns feature description.
     *
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Checks if feature is tagged with tag.
     *
     * @param string $tag
     *
     * @return Boolean
     */
    public function hasTag($tag)
    {
        return in_array($tag, $this->tags);
    }

    /**
     * Checks if feature has tags.
     *
     * @return Boolean
     */
    public function hasTags()
    {
        return 0 < count($this->tags);
    }

    /**
     * Returns feature tags.
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Checks if feature has background.
     *
     * @return Boolean
     */
    public function hasBackground()
    {
        return null !== $this->background;
    }

    /**
     * Returns feature background.
     *
     * @return null|\Behat\Gherkin\Node\BackgroundNode
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Checks if feature has scenarios.
     *
     * @return Boolean
     */
    public function hasScenarios()
    {
        return 0 < count($this->scenarios);
    }

    /**
     * Returns feature scenarios.
     *
     * @return \Behat\Gherkin\Node\ScenarioInterface[]
     */
    public function getScenarios()
    {
        return $this->scenarios;
    }

    /**
     * Returns feature keyword.
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Returns feature language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns feature file.
     *
     * @return null|string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns feature declaration line number.
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->line;
    }

}
