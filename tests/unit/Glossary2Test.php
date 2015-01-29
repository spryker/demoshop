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
        $keyQuery = $this->glossaryQueryContainer->getKeyListQuery();
        $keyCountBeforeCreation = $keyQuery->count();

        $this->glossaryFacade->createKey('ATestKey');
        $keyCountAfterCreation = $keyQuery->count();
        $this->assertTrue($keyCountAfterCreation > $keyCountBeforeCreation);
    }

    public function testDeleteKeyDeletesSomething()
    {
        $specificKeyQuery = $this->glossaryQueryContainer->getKeyNameQuery('KeyToBeDeleted');

        $this->glossaryFacade->createKey('KeyToBeDeleted');
        $this->assertTrue($specificKeyQuery->findOne()->getIsActive());

        $this->glossaryFacade->deleteKey('KeyToBeDeleted');

        $this->assertFalse($specificKeyQuery->findOne()->getIsActive());
    }

    public function testSynchronizeFilesWritesToDatabase()
    {
        /*
         * This test is not yet final.
         * Current Problem:
         * It might work, but can also fail, as we know nothing about the preconditions (the database state)
         * The method tests the sync between a config file with static files and the db
         * It should not insert new records if these are already synced.
         * However, this test knows nothing about the state.
         * Possible Solution: A nice way to use another key file source (or other input) under the hood,
         * i.e. by providing an overriding implementation of the file parser for the test
         * Currently one could manually switch the concrete implementation in the glossary dependency container
         */

        $keyQuery = $this->glossaryQueryContainer->getKeyListQuery();

        $keyCountBeforeSynchronization = $keyQuery->count();
        $this->glossaryFacade->synchronize();
        $keyCountAfterSynchronization = $keyQuery->count();

        $this->assertTrue($keyCountAfterSynchronization > $keyCountBeforeSynchronization);
    }

    public function testCreateTranslationInsertsSomething()
    {
        $translationQuery = $this->glossaryQueryContainer->getTranslationListQuery();
        $this->glossaryFacade->createKey('AKey');

        $translationCountBeforeCreation = $translationQuery->count();
        $this->glossaryFacade->createTranslation('AKey', 'Local', 'ATranslation', true);
        $translationCountAfterCreation = $translationQuery->count();

        $this->assertTrue($translationCountAfterCreation > $translationCountBeforeCreation);
    }

    public function testUpdateTranslationUpdatesSomething()
    {
        $specificTranslationQuery = $this->glossaryQueryContainer->getTranslationQuery('AnotherKey', 'Local');
        $this->glossaryFacade->createKey('AnotherKey');
        $this->glossaryFacade->createTranslation('AnotherKey', 'Local', 'Some Translation', true);

        $this->assertEquals('Some Translation', $specificTranslationQuery->findOne()->getValue());

        $this->glossaryFacade->updateTranslation('AnotherKey', 'Local', 'Some other Translation', true);

        $this->assertEquals('Some other Translation', $specificTranslationQuery->findOne()->getValue());
    }

    public function testDeleteTranslationDeletesSoftly()
    {
        $specificTranslationQuery = $this->glossaryQueryContainer->getTranslationQuery('KeyWithTranslation', 'de_DE');
        $this->glossaryFacade->createKey('KeyWithTranslation');
        $this->glossaryFacade->createTranslation('KeyWithTranslation', 'de_DE', 'A Translation...', true);
        $this->assertTrue($specificTranslationQuery->findOne()->getIsActive());

        $this->glossaryFacade->deleteTranslation('KeyWithTranslation', 'de_DE');

        $this->assertFalse($specificTranslationQuery->findOne()->getIsActive());
    }
}
