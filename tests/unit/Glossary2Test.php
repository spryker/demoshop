<?php
/**
 * Created by PhpStorm.
 * User: lmanzke
 * Date: 22.01.15
 * Time: 16:12
 */

class Glossary2Test extends \Codeception\TestCase\Test
{
    private $bundleName = 'Glossary2';
    /**
     * @var GlossaryFacade $glossaryFacade
     */
    private $glossaryFacade;

    /**
     * @var GlossaryQueryContainer $glossaryQueryContainer
     */
    private $glossaryQueryContainer;
    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $facadeLocator = new \ProjectA\Zed\Kernel\Business\FacadeLocator();
        $queryContainerLocator = new \ProjectA\Zed\Kernel\Persistence\QueryContainerLocator();
        $this->glossaryFacade = $facadeLocator->locate($this->bundleName);
        $this->glossaryQueryContainer = $queryContainerLocator->locate($this->bundleName);
    }

    /**
     *
     */
    public function testCreateKeyInsertsSomething()
    {
        $keyQuery = $this->glossaryQueryContainer->getKeyQuery();
        $beforeKeyCount = $keyQuery->count();

        $this->glossaryFacade->createKey('ATestKey');
        $afterKeyCount = $keyQuery->count();
        $this->assertTrue($afterKeyCount > $beforeKeyCount);
    }
}