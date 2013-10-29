<?php
namespace Pyz\Yves\Catalog\Component\Model;

use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use ProjectA\Yves\Catalog\Component\Model\AbstractSearch;
use Solarium\QueryType\Select\Query\Component\FacetSet;

/**
 * @package ProjectA\Yves\Catalog\Component\Model
 */
class FulltextSearch extends AbstractSearch
{

}
