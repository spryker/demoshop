<?php
/**
 *
 */
class Sao_Yves_Category_Component_Model_Helper
{

    /**
     * @var Sao_Yves_Category_Component_Model_Helper
     */
    private static $instance;
    /**
     * @var Sao_Yves_Category_Component_Model_Category
     */
    protected $categoryModel;

    /**
     * @var array
     */
    private $categoryParents = array();

    /**
     * @var array
     */
    private $categoryNeighbours = array();

    /**
     * @var array
     */
    private $currentCategory = array();

    /**
     * @static
     * @return Sao_Yves_Category_Component_Model_Helper
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     */
    private function __construct()
    {
        $this->categoryModel = Generated_Yves_ModelFactory::getYpCategoryModelCategory(Sao_Yves_Application_Component_Model_Factory::getStorage());
    }

    /**
     * Multiplies all available paths and delivers the tree and an array with all categories resolved
     * @param array $tree
     * @return array
     */
    public function getCategoryPaths(array $tree)
    {
        if (empty($tree)) {
            return null;
        }

        $lines = array();
        $ids = array();


        //for every root category
        foreach ($tree as $rootCategoryId => $paths) {

            $ids[] = $rootCategoryId;
            if (empty($paths)) {
                continue;
            }
            foreach ($paths as $path) {

                $line = array_merge(array($rootCategoryId), $path);
                $lines[] = $line;

                $ids = array_merge($ids, $path);
            }
        }

        return array('categories' => $this->categoryModel->getCategories($ids), 'paths' => $lines);
    }

    public function getCategoriesForProductTab(array $tree)
    {
        $result = array();
        $paths = $this->getCategoryPaths($tree);

        if ($paths) {
            foreach($paths['paths'] as $i =>  $path) {
                foreach($path as $ii => $category) {
                    if (!isset($paths['categories'][$category])) {
                        if (isset($result[$i]))
                            unset($result[$i]);
                        continue 2;
                    }
                    $category = $paths['categories'][$category];
                    if(isset($category['top_menu']) && $category['top_menu'] == 0) {
                        if(isset($result[$i])) {
                            unset($result[$i]);
                        }
                        continue(2);
                    }
                    $result[$i][] = array(
                        'name' => $category['name'],
                        'url' => $category['url'],
                    );
                }
            }
        }
        return $result;
    }

    public function getCategoryBackLinkForBrand(array $categories, $brand)
    {

        $result = array();
        
        $categories = $this->getCategoriesForProductTab($categories);

        foreach ($categories as $subcategories) {
            foreach ($subcategories as $subcategory) {
                if(trim($subcategory['name']) == $brand) {
                    return $subcategory;
                }
            }
        }

        return $result;
    }

    /**
     * @param array $line
     * @param array $paths
     * @return array|null
     */
    public function getCategoryLines(array $line, array $paths)
    {
        if (empty($paths)) {
            return null;
        }

        $lines = array();

        //paths (numeric array, every entry one path level)
        foreach ($paths as $path) {
            $lines[] = $line + $path;
        }

        return $lines;
    }

    /**
     * @param $tree
     * @return string
     */
    public function renderProductCategoryTree($tree)
    {
        $template = array();
        foreach ($tree as $key => $val) {

            $category = $this->categoryModel->getCategories(array($key));
            $category = array_shift($category);

            $run = array('label' => $category['name'], 'url' => $this->createAbsoluteUrl($category));
            if (!empty($val)) {
                $run['children'] = $this->renderSubTrees($val);
            }
            $template[] = $run;
        }

        return $template;
    }

    /**
     * @param $trees
     * @return mixed|string
     */
    protected function renderSubTrees($trees)
    {
        $template = array();
        foreach ($trees as $tree) {
            if (is_array($tree)) {

                //subcategories
                $template[] = $this->renderSubTrees($tree);

            } else {

                //show last element of the category names array
                $last = array_pop($trees);
                $category = $this->categoryModel->getCategories(array($last));
                $category = array_shift($category);

                $run['label'] = $category['name'];
                $run['url'] = $this->createAbsoluteUrl($category);

                return $run;
            }
        }

        return $template;
    }

    /**
     * @param $view
     * @param array $data
     * @return mixed|string
     */
    protected function render($view, $data = array())
    {
        /** @var $controller ProjectA_Yves_Library_Base_Controller */
        $controller = ProjectA_Yves_Library_Yii::app()->controller;
        return $controller->renderPartial($view, $data, true);
    }

    /**
     * @param $category
     * @return string
     */
    protected function createAbsoluteUrl($category)
    {
        return ProjectA_Yves_Library_Routing_UrlManager::createAbsoluteUrl($category['url']);
    }


    /**
     * @param $categories
     * @param $category
     * @return array
     */
    public function getCategoryParents($categories, $categoryId)
    {
        $categoryId = is_numeric($categoryId) ? $categoryId : 0;
        $this->categoryParents = array();
        return array_reverse($this->findCategoryParent($categories, $categoryId, array(), $categories));

    }

    /**
     * @param $categories
     * @param $categoryId
     * @return array
     */
    public function getCategoryNeighbours($categories, $categoryId)
    {
        $categoryId = is_numeric($categoryId) ? $categoryId : 0;
        $this->categoryNeighbours = array();
        return $categoryId != 0 ? $this->findCategoryNeighbours($categories, $categoryId) : $categories;
    }

    /**
     * @param $categories
     * @param $requiredCategoryId
     * @return array
     */
    private function findCategoryNeighbours($categories, $requiredCategoryId)
    {
        foreach ($categories as $categoryKey => $category) {
            if ($this->getCategoryIdFromKey($categoryKey) == $requiredCategoryId) {
                $this->categoryNeighbours = $categories;
                return $this->categoryNeighbours;
            } else {
                if (isset($category['siblings']) && count($category['siblings']) > 0) {
                    $this->findCategoryNeighbours($category['siblings'], $requiredCategoryId);
                }
            }
        }
        return $this->categoryNeighbours;
    }

    /**
     * @param $categories
     * @param $requiredCategoryId
     * @param array $return
     * @param $allCategories
     * @param $parentCategoryKey
     * @return array
     */
    private function findCategoryParent($categories, $requiredCategoryId, $return, $allCategories, $parentCategoryKey = null)
    {
        foreach ($categories as $categoryKey => $category) {
            if ($this->getCategoryIdFromKey($categoryKey) == $requiredCategoryId) {
                $return[$categoryKey] = array('data' => $category['data']);
                if ($parentCategoryKey == $categoryKey || !$parentCategoryKey) {
                    $this->categoryParents = $return;
                    return $this->categoryParents;
                } else {
                    $this->findCategoryParent($allCategories, $this->getCategoryIdFromKey($parentCategoryKey), $return, $allCategories, $parentCategoryKey);
                }
            } else {
                if (isset($category['siblings']) && count($category['siblings']) > 0) {
                    $this->findCategoryParent($category['siblings'], $requiredCategoryId, $return, $allCategories, $categoryKey);
                }
            }
        }
        return $this->categoryParents;
    }

    /**
     * @param $requestedCategoryId
     * @param $categories
     * @return array
     */
    public function getCategory($requestedCategoryId, $categories)
    {
        return $this->findCategory($requestedCategoryId, $categories);
    }

    /**
     * @param $requestedCategoryId
     * @param $categories
     * @return array
     */
    private function findCategory($requestedCategoryId, $categories)
    {
        foreach ($categories as $categoryKey => $category) {
            if ($this->getCategoryIdFromKey($categoryKey) == $requestedCategoryId) {
                $this->currentCategory = $categories[$categoryKey];
            }
            if (isset($category['siblings']) && count($category['siblings']) > 0) {
                $this->findCategory($requestedCategoryId, $category['siblings']);
            }
        }
        return $this->currentCategory;
    }

    /**
     * @param $key
     * @return int
     */
    public function getCategoryIdFromKey($key)
    {
        $exp = explode(ProjectA_Shared_Library_Storage::CATEGORY_KEY, $key);
        return isset($exp[1]) ? $exp[1] : 0;
    }
}