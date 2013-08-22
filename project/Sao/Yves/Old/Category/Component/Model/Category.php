<?php
class Sao_Yves_Category_Component_Model_Category extends ProjectA_Yves_Model_Component_Model_Category
{
    public function getCategoryDescription(array $category)
    {
        if (isset($category['description'])) {
            return $category['description'];
        }

        return null;
    }

    public function getCategoryInformation(array $category)
    {
        if (isset($category['information'])) {
            return $category['information'];
        }

        return null;
    }
    
    public function getCategoryLinks(array $category)
    {
        if (isset($category['links'])) {
            return $category['links'];
        }
        
        return null;
    }


    /**
     * @param array $siblings
     * @param int $colCount
     * @return array
     */
    public function getSiblingsColumnFormatted(array $siblings, $colCount)
    {
        $elementsPerColumn = ceil(count($siblings)/$colCount);
        $subSub = array_chunk($siblings, $elementsPerColumn);
        return $subSub;
    }

    /**
     * @param $category
     * @return bool
     */
    public function showInLeftMenu($category)
    {
        if (isset($category['attributes']['left_menu']) && $category['attributes']['left_menu'] == "0") {
            return false;
        } else {
            return true;
        }
    }
}