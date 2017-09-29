<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Represents Gherkin Outline Example.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ExampleNode implements ScenarioInterface
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var string[]
     */
    private $tags;

    /**
     * @var \Behat\Gherkin\Node\StepNode[]
     */
    private $outlineSteps;

    /**
     * @var string[]
     */
    private $tokens;

    /**
     * @var integer
     */
    private $line;

    /**
     * @var null|\Behat\Gherkin\Node\StepNode[]
     */
    private $steps;

    /**
     * Initializes outline.
     *
     * @param string $title
     * @param string[] $tags
     * @param \Behat\Gherkin\Node\StepNode[] $outlineSteps
     * @param string[] $tokens
     * @param integer $line
     */
    public function __construct($title, array $tags, $outlineSteps, array $tokens, $line)
    {
        $this->title = $title;
        $this->tags = $tags;
        $this->outlineSteps = $outlineSteps;
        $this->tokens = $tokens;
        $this->line = $line;
    }

    /**
     * Returns node type string
     *
     * @return string
     */
    public function getNodeType()
    {
        return 'Example';
    }

    /**
     * Returns node keyword.
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->getNodeType();
    }

    /**
     * Returns example title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Checks if outline is tagged with tag.
     *
     * @param string $tag
     *
     * @return Boolean
     */
    public function hasTag($tag)
    {
        return in_array($tag, $this->getTags());
    }

    /**
     * Checks if outline has tags (both inherited from feature and own).
     *
     * @return Boolean
     */
    public function hasTags()
    {
        return 0 < count($this->getTags());
    }

    /**
     * Returns outline tags (including inherited from feature).
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Checks if outline has steps.
     *
     * @return Boolean
     */
    public function hasSteps()
    {
        return 0 < count($this->outlineSteps);
    }

    /**
     * Returns outline steps.
     *
     * @return \Behat\Gherkin\Node\StepNode[]
     */
    public function getSteps()
    {
        return $this->steps = $this->steps ? : $this->createExampleSteps();
    }

    /**
     * Returns example tokens.
     *
     * @return string[]
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Returns outline declaration line number.
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Creates steps for this example from abstract outline steps.
     *
     * @return \Behat\Gherkin\Node\StepNode[]
     */
    protected function createExampleSteps()
    {
        $steps = [];
        foreach ($this->outlineSteps as $outlineStep) {
            $keyword = $outlineStep->getKeyword();
            $keywordType = $outlineStep->getKeywordType();
            $text = $this->replaceTextTokens($outlineStep->getText());
            $args = $this->replaceArgumentsTokens($outlineStep->getArguments());
            $line = $outlineStep->getLine();

            $steps[] = new StepNode($keyword, $text, $args, $line, $keywordType);
        }

        return $steps;
    }

    /**
     * Replaces tokens in arguments with row values.
     *
     * @param \Behat\Gherkin\Node\ArgumentInterface[] $arguments
     *
     * @return \Behat\Gherkin\Node\ArgumentInterface[]
     */
    protected function replaceArgumentsTokens(array $arguments)
    {
        foreach ($arguments as $num => $argument) {
            if ($argument instanceof TableNode) {
                $arguments[$num] = $this->replaceTableArgumentTokens($argument);
            }
            if ($argument instanceof PyStringNode) {
                $arguments[$num] = $this->replacePyStringArgumentTokens($argument);
            }
        }

        return $arguments;
    }

    /**
     * Replaces tokens in table with row values.
     *
     * @param \Behat\Gherkin\Node\TableNode $argument
     *
     * @return \Behat\Gherkin\Node\TableNode
     */
    protected function replaceTableArgumentTokens(TableNode $argument)
    {
        $table = $argument->getTable();
        foreach ($table as $line => $row) {
            foreach (array_keys($row) as $col) {
                $table[$line][$col] = $this->replaceTextTokens($table[$line][$col]);
            }
        }

        return new TableNode($table);
    }

    /**
     * Replaces tokens in PyString with row values.
     *
     * @param \Behat\Gherkin\Node\PyStringNode $argument
     *
     * @return \Behat\Gherkin\Node\PyStringNode
     */
    protected function replacePyStringArgumentTokens(PyStringNode $argument)
    {
        $strings = $argument->getStrings();
        foreach ($strings as $line => $string) {
            $strings[$line] = $this->replaceTextTokens($strings[$line]);
        }

        return new PyStringNode($strings, $argument->getLine());
    }

    /**
     * Replaces tokens in text with row values.
     *
     * @param string $text
     *
     * @return string
     */
    protected function replaceTextTokens($text)
    {
        foreach ($this->tokens as $key => $val) {
            $text = str_replace('<' . $key . '>', $val, $text);
        }

        return $text;
    }

}
