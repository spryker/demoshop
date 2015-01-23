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
     * @var \ProjectA\Zed\Glossary2\Business\Glossary2Facade $glossaryFacade
     */
    private $glossaryFacade;

    /**
     * @var \ProjectA\Zed\Glossary2\Persistence\Glossary2QueryContainer $glossaryQueryContainer
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

    public function testCreateKeyInsertsSomething()
    {
        $keyQuery = $this->glossaryQueryContainer->getKeyQuery();
        $keyCountBeforeCreation = $keyQuery->count();

        $this->glossaryFacade->createKey('ATestKey');
        $keyCountAfterCreation = $keyQuery->count();
        $this->assertTrue($keyCountAfterCreation > $keyCountBeforeCreation);
    }

    public function testDeleteKeyDeletesSomething()
    {
        $keyQuery = $this->glossaryQueryContainer->getKeyQuery();

        $this->glossaryFacade->createKey('KeyToBeDeleted');

        $keyCountBeforeDeletion = $keyQuery->count();
        $this->glossaryFacade->deleteKey('KeyToBeDeleted');
        $keyCountAfterDeletion = $keyQuery->count();

        $this->assertTrue($keyCountAfterDeletion < $keyCountBeforeDeletion);
    }
}