<?php

//TODO AHH, REMOVE THIS
//include_once 'vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Business/TouchFactory.php';
//include_once 'vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Business/TouchFacade.php';
//include_once 'vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/TouchFactory.php';
//include_once 'vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/TouchQueryContainer.php';

class TouchTest extends \Codeception\TestCase\Test
{
    /**
     * @var \SprykerCore\Zed\Touch\Business\TouchFacade
     */
    protected $touchFacade;

    /**
     * @var \SprykerCore\Zed\Touch\Persistence\TouchQueryContainer
     */
    protected $touchQueryContainer;


    protected function setUp()
    {
        parent::setUp();
        //not working yet, but this is the way to do it
        //$this->touchFacade = (new \ProjectA\Zed\Kernel\Business\FacadeLocator())->locate('Touch');
        //$this->touchQueryContainer = (new \ProjectA\Zed\Kernel\Persistence\QueryContainerLocator())->locate('Touch');

        // workaround till the facade locator finds the touch facade in a different namespace than ProjectA
        // (e.g. SprykerCore)
        $businessFactory = new \SprykerCore\Zed\Touch\Business\TouchFactory();
        $this->touchFacade = new \SprykerCore\Zed\Touch\Business\TouchFacade($businessFactory);

        $persistenceFactory = new \SprykerCore\Zed\Touch\Persistence\TouchFactory();
        $this->touchQueryContainer = new \SprykerCore\Zed\Touch\Persistence\TouchQueryContainer($persistenceFactory);
    }


    public function testTouchInsertsSomething()
    {
        $touchEntityQuery = $this->touchQueryContainer->getEntityTouchListQuery('ProductTranslationWhatever');

        $touchCountBeforeTouch = $touchEntityQuery->count();
        $this->touchFacade->touch('ProductTranslationWhatever', 'active', 1);
        $touchCountAfterTouch = $touchEntityQuery->count();

        $this->assertTrue($touchCountAfterTouch > $touchCountBeforeTouch);
    }
}
