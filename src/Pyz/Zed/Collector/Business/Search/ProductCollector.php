<?php

namespace Pyz\Zed\Collector\Business\Search;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;
use Spryker\Zed\Collector\Business\Collector\Search\AbstractSearchPropelCollector;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

class ProductCollector extends AbstractSearchPropelCollector
{

    /**
     * @var CategoryQueryContainer
     */
    protected $categoryQueryContainer;

    /**
     * @var ProductSearchFacade
     */
    protected $productSearchFacade;

    /**
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param ProductSearchFacade $productSearchFacade
     */
    public function __construct(CategoryQueryContainer $categoryQueryContainer, ProductSearchFacade $productSearchFacade)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productSearchFacade = $productSearchFacade;
    }

    protected function collectItem($touchKey, array $collectItemData)
    {
        return $collectItemData;
    }

    protected function collectResourceType()
    {
        return 'abstract_product';
    }

    /**
     * @param array $collectedSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function collectData(array $collectedSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $collectedSet = $this->processData($collectedSet, $locale, $touchUpdaterSet);

        return parent::collectData($collectedSet, $locale, $touchUpdaterSet);
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $processedResultSet = $this->buildProducts($resultSet, $locale);

        $processedResultSet = $this->productSearchFacade->enrichProductsWithSearchAttributes(
            $resultSet,
            $processedResultSet
        );

        foreach ($resultSet as $index => $productRawData) {
            if (isset($processedResultSet[$index])) {
                // Product availability
                $processedResultSet[$index]['available'] = $productRawData['quantity'] > 0;
                $isAvailable = (bool) (
                    $productRawData['is_never_out_of_stock'] ||
                    $productRawData['quantity'] > 0
                );
                $processedResultSet[$index]['search-result-data']['available'] = $isAvailable;
                $processedResultSet[$index]['bool-facet']['available'] = $isAvailable;

                // Category
                $processedResultSet[$index]['category'] = [
                    'direct-parents' => explode(',', $productRawData['node_id']),
                    'all-parents' => explode(',', $productRawData['category_parent_ids']),
                ];
            }
        }

        return $processedResultSet;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function buildProducts(array &$resultSet, $locale)
    {
        $processedResultSet = [];

        $processedResultSet = $this->productSearchFacade->createSearchProducts($resultSet, $processedResultSet, $locale);

        $keys = array_keys($processedResultSet);
        $resultSet = array_combine($keys, $resultSet);

        return $processedResultSet;
    }

}
