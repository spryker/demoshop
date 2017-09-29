<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Node;

use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_TestCase;

class TableNodeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Behat\Gherkin\Exception\NodeException
     *
     * @return void
     */
    public function testConstructorExpectsSameNumberOfColumnsInEachRow()
    {
        new TableNode([
            ['username', 'password'],
            ['everzet'],
            ['antono', 'pa$sword'],
        ]);
    }

    /**
     * @return void
     */
    public function testHashTable()
    {
        $table = new TableNode([
            ['username', 'password'],
            ['everzet', 'qwerty'],
            ['antono', 'pa$sword'],
        ]);

        $this->assertEquals(
            [
                ['username' => 'everzet', 'password' => 'qwerty'], ['username' => 'antono', 'password' => 'pa$sword'],
            ],
            $table->getHash()
        );

        $table = new TableNode([
            ['username', 'password'],
            ['', 'qwerty'],
            ['antono', ''],
            ['', ''],
        ]);

        $this->assertEquals(
            [
                ['username' => '', 'password' => 'qwerty'],
                ['username' => 'antono', 'password' => ''],
                ['username' => '', 'password' => ''],
            ],
            $table->getHash()
        );
    }

    /**
     * @return void
     */
    public function testIterator()
    {
        $table = new TableNode([
            ['username', 'password'],
            ['', 'qwerty'],
            ['antono', ''],
            ['', ''],
        ]);

        $this->assertEquals(
            [
                ['username' => '', 'password' => 'qwerty'],
                ['username' => 'antono', 'password' => ''],
                ['username' => '', 'password' => ''],
            ],
            iterator_to_array($table)
        );
    }

    /**
     * @return void
     */
    public function testRowsHashTable()
    {
        $table = new TableNode([
            ['username', 'everzet'],
            ['password', 'qwerty'],
            ['uid', '35'],
        ]);

        $this->assertEquals(
            ['username' => 'everzet', 'password' => 'qwerty', 'uid' => '35'],
            $table->getRowsHash()
        );
    }

    /**
     * @return void
     */
    public function testLongRowsHashTable()
    {
        $table = new TableNode([
            ['username', 'everzet', 'marcello'],
            ['password', 'qwerty', '12345'],
            ['uid', '35', '22'],
        ]);

        $this->assertEquals([
            'username' => ['everzet', 'marcello'],
            'password' => ['qwerty', '12345'],
            'uid' => ['35', '22'],
        ], $table->getRowsHash());
    }

    /**
     * @return void
     */
    public function testGetRows()
    {
        $table = new TableNode([
            ['username', 'password'],
            ['everzet', 'qwerty'],
            ['antono', 'pa$sword'],
        ]);

        $this->assertEquals([
            ['username', 'password'],
            ['everzet', 'qwerty'],
            ['antono', 'pa$sword'],
        ], $table->getRows());
    }

    /**
     * @return void
     */
    public function testGetLines()
    {
        $table = new TableNode([
            5 => ['username', 'password'],
            10 => ['everzet', 'qwerty'],
            13 => ['antono', 'pa$sword'],
        ]);

        $this->assertEquals([5, 10, 13], $table->getLines());
    }

    /**
     * @return void
     */
    public function testGetRow()
    {
        $table = new TableNode([
            ['username', 'password'],
            ['everzet', 'qwerty'],
            ['antono', 'pa$sword'],
        ]);

        $this->assertEquals(['username', 'password'], $table->getRow(0));
        $this->assertEquals(['antono', 'pa$sword'], $table->getRow(2));
    }

    /**
     * @return void
     */
    public function testGetColumn()
    {
        $table = new TableNode([
            ['username', 'password'],
            ['everzet', 'qwerty'],
            ['antono', 'pa$sword'],
        ]);

        $this->assertEquals(['username', 'everzet', 'antono'], $table->getColumn(0));
        $this->assertEquals(['password', 'qwerty', 'pa$sword'], $table->getColumn(1));

        $table = new TableNode([
            ['username'],
            ['everzet'],
            ['antono'],
        ]);

        $this->assertEquals(['username', 'everzet', 'antono'], $table->getColumn(0));
    }

    /**
     * @return void
     */
    public function testGetRowWithLineNumbers()
    {
        $table = new TableNode([
            5 => ['username', 'password'],
            10 => ['everzet', 'qwerty'],
            13 => ['antono', 'pa$sword'],
        ]);

        $this->assertEquals(['username', 'password'], $table->getRow(0));
        $this->assertEquals(['antono', 'pa$sword'], $table->getRow(2));
    }

    /**
     * @return void
     */
    public function testGetTable()
    {
        $table = new TableNode($a = [
            5 => ['username', 'password'],
            10 => ['everzet', 'qwerty'],
            13 => ['antono', 'pa$sword'],
        ]);

        $this->assertEquals($a, $table->getTable());
    }

    /**
     * @return void
     */
    public function testGetRowLine()
    {
        $table = new TableNode([
            5 => ['username', 'password'],
            10 => ['everzet', 'qwerty'],
            13 => ['antono', 'pa$sword'],
        ]);

        $this->assertEquals(5, $table->getRowLine(0));
        $this->assertEquals(13, $table->getRowLine(2));
    }

    /**
     * @return void
     */
    public function testGetRowAsString()
    {
        $table = new TableNode([
            5 => ['username', 'password'],
            10 => ['everzet', 'qwerty'],
            13 => ['antono', 'pa$sword'],
        ]);

        $this->assertEquals('| username | password |', $table->getRowAsString(0));
        $this->assertEquals('| antono   | pa$sword |', $table->getRowAsString(2));
    }

    /**
     * @return void
     */
    public function testGetTableAsString()
    {
        $table = new TableNode([
            5 => ['id', 'username', 'password'],
            10 => ['42', 'everzet', 'qwerty'],
            13 => ['2', 'antono', 'pa$sword'],
        ]);

        $expected = <<<TABLE
| id | username | password |
| 42 | everzet  | qwerty   |
| 2  | antono   | pa\$sword |
TABLE;
        $this->assertEquals($expected, $table->getTableAsString());
    }

}
