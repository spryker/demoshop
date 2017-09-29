<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

use ArrayIterator;
use Behat\Gherkin\Exception\NodeException;
use IteratorAggregate;

/**
 * Represents Gherkin Table argument.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class TableNode implements ArgumentInterface, IteratorAggregate
{

    /**
     * @var array
     */
    private $table;

    /**
     * @var array
     */
    private $maxLineLength = [];

    /**
     * Initializes table.
     *
     * @param array $table Table in form of [$rowLineNumber => [$val1, $val2, $val3]]
     *
     * @throws \Behat\Gherkin\Exception\NodeException If the number of columns is not the same in each row
     */
    public function __construct(array $table)
    {
        $this->table = $table;
        $columnCount = null;

        foreach ($this->getRows() as $row) {
            if ($columnCount === null) {
                $columnCount = count($row);
            }

            if (count($row) !== $columnCount) {
                throw new NodeException('Table does not have same number of columns in every row.');
            }

            foreach ($row as $column => $string) {
                if (!isset($this->maxLineLength[$column])) {
                    $this->maxLineLength[$column] = 0;
                }

                $this->maxLineLength[$column] = max($this->maxLineLength[$column], mb_strlen($string, 'utf8'));
            }
        }
    }

    /**
     * Returns node type.
     *
     * @return string
     */
    public function getNodeType()
    {
        return 'Table';
    }

    /**
     * Returns table hash, formed by columns (ColumnsHash).
     *
     * @return array
     */
    public function getHash()
    {
        return $this->getColumnsHash();
    }

    /**
     * Returns table hash, formed by columns.
     *
     * @return array
     */
    public function getColumnsHash()
    {
        $rows = $this->getRows();
        $keys = array_shift($rows);

        $hash = [];
        foreach ($rows as $row) {
            $hash[] = array_combine($keys, $row);
        }

        return $hash;
    }

    /**
     * Returns table hash, formed by rows.
     *
     * @return array
     */
    public function getRowsHash()
    {
        $hash = [];

        foreach ($this->getRows() as $row) {
            $hash[array_shift($row)] = (1 == count($row)) ? $row[0] : $row;
        }

        return $hash;
    }

    /**
     * Returns numerated table lines.
     * Line numbers are keys, lines are values.
     *
     * @return array
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Returns table rows.
     *
     * @return array
     */
    public function getRows()
    {
        return array_values($this->table);
    }

    /**
     * Returns table definition lines.
     *
     * @return array
     */
    public function getLines()
    {
        return array_keys($this->table);
    }

    /**
     * Returns specific row in a table.
     *
     * @param integer $index Row number
     *
     * @throws \Behat\Gherkin\Exception\NodeException If row with specified index does not exist
     *
     * @return array
     */
    public function getRow($index)
    {
        $rows = $this->getRows();

        if (!isset($rows[$index])) {
            throw new NodeException(sprintf('Rows #%d does not exist in table.', $index));
        }

        return $rows[$index];
    }

    /**
     * Returns specific column in a table.
     *
     * @param integer $index Column number
     *
     * @throws \Behat\Gherkin\Exception\NodeException If column with specified index does not exist
     *
     * @return array
     */
    public function getColumn($index)
    {
        if ($index >= count($this->getRow(0))) {
            throw new NodeException(sprintf('Column #%d does not exist in table.', $index));
        }

        $rows = $this->getRows();
        $column = [];

        foreach ($rows as $row) {
            $column[] = $row[$index];
        }

        return $column;
    }

    /**
     * Returns line number at which specific row was defined.
     *
     * @param integer $index
     *
     * @throws \Behat\Gherkin\Exception\NodeException If row with specified index does not exist
     *
     * @return integer
     */
    public function getRowLine($index)
    {
        $lines = array_keys($this->table);

        if (!isset($lines[$index])) {
            throw new NodeException(sprintf('Rows #%d does not exist in table.', $index));
        }

        return $lines[$index];
    }

    /**
     * Converts row into delimited string.
     *
     * @param integer $rowNum Row number
     *
     * @return string
     */
    public function getRowAsString($rowNum)
    {
        $values = [];
        foreach ($this->getRow($rowNum) as $column => $value) {
            $values[] = $this->padRight(' ' . $value . ' ', $this->maxLineLength[$column] + 2);
        }

        return sprintf('|%s|', implode('|', $values));
    }

    /**
     * Converts row into delimited string.
     *
     * @param integer $rowNum Row number
     * @param callable $wrapper Wrapper function
     *
     * @return string
     */
    public function getRowAsStringWithWrappedValues($rowNum, $wrapper)
    {
        $values = [];
        foreach ($this->getRow($rowNum) as $column => $value) {
            $value = $this->padRight(' ' . $value . ' ', $this->maxLineLength[$column] + 2);

            $values[] = call_user_func($wrapper, $value, $column);
        }

        return sprintf('|%s|', implode('|', $values));
    }

    /**
     * Converts entire table into string
     *
     * @return string
     */
    public function getTableAsString()
    {
        $lines = [];
        for ($i = 0; $i < count($this->getRows()); $i++) {
            $lines[] = $this->getRowAsString($i);
        }

        return implode("\n", $lines);
    }

    /**
     * Returns line number at which table was started.
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->getRowLine(0);
    }

    /**
     * Converts table into string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTableAsString();
    }

    /**
     * Retrieves a hash iterator.
     *
     * @return \Iterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->getHash());
    }

    /**
     * Pads string right.
     *
     * @param string $text Text to pad
     * @param integer $length Length
     *
     * @return string
     */
    protected function padRight($text, $length)
    {
        while ($length > mb_strlen($text, 'utf8')) {
            $text = $text . ' ';
        }

        return $text;
    }

}
