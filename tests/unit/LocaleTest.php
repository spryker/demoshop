<?php

class LocaleTest extends Codeception\TestCase\Test
{
    /**
     * @var \SprykerCore\Zed\Locale\Business\LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var \SprykerCore\Zed\Locale\Persistence\LocaleQueryContainer
     */
    protected $localeQueryContainer;

    protected function setUp()
    {
        parent::setUp();
        $this->localeFacade = (new \ProjectA\Zed\Kernel\Business\FacadeLocator())->locate('Locale');
        $this->localeQueryContainer = (new \ProjectA\Zed\Kernel\Persistence\QueryContainerLocator())->locate('Locale');
    }


    public function testCreateLocaleInsertsSomething()
    {
        $localeQuery = $this->localeQueryContainer->getSpecialLocaleQuery('xy_ab');
        $this->assertEquals(0, $localeQuery->count());

        $this->localeFacade->createLocale('xy_ab');

        $this->assertEquals(1, $localeQuery->count());
    }

    public function testDeleteLocaleDeletesSoftly()
    {
        $localeQuery = $this->localeQueryContainer->getSpecialLocaleQuery('ab_xy');
        $this->localeFacade->createLocale('ab_xy');

        $this->assertTrue($localeQuery->findOne()->getIsActive());
        $this->localeFacade->deleteLocale('ab_xy');
        $this->assertFalse($localeQuery->findOne()->getIsActive());
    }
}
