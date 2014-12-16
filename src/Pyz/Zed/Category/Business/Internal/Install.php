<?php
namespace Pyz\Zed\Category\Business\Internal;

/**
 * @property \Generated\Zed\Category\Business\CategoryFactory $factory
 */
class Install extends \ProjectA_Zed_Category_Business_Internal_Install
{
    /**
     * @var array
     */
    protected $categories = [
        'Chairs',
        'Tables',
        'Sofas & Couches',
        'Cabinets',
        'Lamps',
    ];

    /**
     *
     */
    public function install()
    {
        //do the parental stuff
        parent::install();

        //install simple categories all on same level from array
        //later on we might want to install them more sophisticated, e.g. a whole tree
        $this->installCategories();
    }

    protected function installCategories()
    {
        foreach ($this->categories as $category) {
            $categoryNameQuery = new \ProjectA_Zed_Category_Persistence_PacCategoryNameQuery();
            $categoryNameQuery->filterByName($category);
            $categoryName = $categoryNameQuery->findOneOrCreate();
            if ($categoryName->isNew()) {
                $categoryName->save();
                $this->factory->createModelCategory()->createNode($categoryName, $this->rootCategory, $this->defaultScope);
            }
        }
    }
}
