<?php

namespace Pyz\Zed\Cms\Business\Manager;

use Generated\Shared\Cms\KeywordInterface;
use Generated\Shared\Transfer\KeywordTransfer;
use Orm\Zed\Cms\Persistence\Base\KamKeywordQuery;
use Orm\Zed\Cms\Persistence\KamKeyword;
use Pyz\Shared\Cms\CmsConfig;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainerInterface;

class KeywordManager implements KeywordManagerInterface
{

    /**
     * @var CmsQueryContainerInterface
     */
    protected $cmsQueryContainer;

    /**
     * @var CmsToTouchInterface
     */
    protected $touchFacade;

    /**
     * @param CmsQueryContainerInterface $cmsQueryContainer
     * @param CmsToTouchInterface $touchFacade
     */
    public function __construct(CmsQueryContainerInterface $cmsQueryContainer, CmsToTouchInterface $touchFacade)
    {
        $this->cmsQueryContainer = $cmsQueryContainer;
        $this->touchFacade = $touchFacade;
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeyword(KeywordInterface $keywordTransfer)
    {
        if (null !== $this->getKeywordById($keywordTransfer->getIdKeyword())) {
            $keywordEntity = $this->updateCmsKeyword($keywordTransfer);
        } else {
            $keywordEntity = $this->createCmsKeyword($keywordTransfer);
        }

        return $this->convertKeywordEntityToTransfer($keywordEntity);
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KamKeyword
     */
    private function createCmsKeyword(KeywordInterface $keywordTransfer)
    {
        $keywordEntity = new KamKeyword();
        $keywordEntity->fromArray($keywordTransfer->toArray());
        $keywordEntity->save();

        return $keywordEntity;
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KamKeyword
     */
    private function updateCmsKeyword(KeywordInterface $keywordTransfer)
    {
        $keywordEntity = $this->getKeywordById($keywordTransfer->getIdKeyword());
        $keywordEntity->fromArray($keywordTransfer->toArray());
        $keywordEntity->save();

        return $keywordEntity;
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeywordAndTouch(KeywordInterface $keywordTransfer)
    {
        $newAdsGroupId = $keywordTransfer->getAdsGroupId();
        $keywordEntity = $this->getKeywordById($keywordTransfer->getIdKeyword());
        $oldAdsGroupId = null;

        if ($keywordEntity !== null) {
            $oldAdsGroupId = $keywordEntity->getAdsGroupId();
        }

        $keywordTransfer = $this->saveCmsKeyword($keywordTransfer);

        if ($newAdsGroupId !== $oldAdsGroupId) {
            $this->touchActiveKeywordWithKeyChange($keywordTransfer);
        } else {
            $this->touchActiveKeyword($keywordTransfer);
        }

        return $keywordTransfer;
    }

    /**
     * @param string $data
     */
    public function saveCmsBulkKeywordAndTouch($data)
    {
        $keywordList = explode(PHP_EOL, $data);
        foreach ($keywordList as $keywordRow) {
            $keywordRow = trim(preg_replace('/\s+/', ' ', $keywordRow));
            $keywordItems = explode(';', $keywordRow);

            if (count($keywordItems) === 2) {
                $keywordQuery = $this->cmsQueryContainer->queryKeywordByAdsGroupId($keywordItems[0]);
                $keywordTransfer = $this->createKeywordTransfer($keywordQuery, $keywordItems);

                $this->saveCmsKeywordAndTouch($keywordTransfer);
            }
        }
    }

    /**
     * @param KamKeyword $keywordEntity
     *
     * @return KeywordTransfer
     */
    public function convertKeywordEntityToTransfer(KamKeyword $keywordEntity)
    {
        $keywordTransfer = new KeywordTransfer();
        $keywordTransfer->fromArray($keywordEntity->toArray(), true);

        return $keywordTransfer;
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchActiveKeyword(KeywordInterface $keywordTransfer)
    {
        $this->touchFacade->touchActive(CmsConfig::RESOURCE_TYPE_KEYWORD, $keywordTransfer->getIdKeyword());
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchActiveKeywordWithKeyChange(KeywordInterface $keywordTransfer)
    {
        $this->touchFacade->touchActive(CmsConfig::RESOURCE_TYPE_KEYWORD, $keywordTransfer->getIdKeyword(), true);
    }

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchDeleteKeyword(KeywordInterface $keywordTransfer)
    {
        $this->touchFacade->touchDeleted(CmsConfig::RESOURCE_TYPE_KEYWORD, $keywordTransfer->getIdKeyword());
    }

    /**
     * @param int $idKeyword
     *
     * @return bool
     */
    public function deleteKeyword($idKeyword)
    {
        $keywordEntity = $this->getKeywordById($idKeyword);
        $this->touchDeleteKeyword($this->convertKeywordEntityToTransfer($keywordEntity));

        $rowDeleted = $keywordEntity->delete();

        return $rowDeleted > 0;
    }

    /**
     * @param $idKeyword
     *
     * @return KamKeyword
     */
    private function getKeywordById($idKeyword)
    {
        return $this->cmsQueryContainer->queryKeywordById($idKeyword)
            ->findOne()
            ;
    }

    /**
     * @param KamKeywordQuery $keywordQuery
     * @param array $keywordItems
     *
     * @return KeywordTransfer
     */
    private function createKeywordTransfer(KamKeywordQuery $keywordQuery, array $keywordItems)
    {
        $keywordEntity = $keywordQuery->findOne();
        $keywordTransfer = new KeywordTransfer();
        if ($keywordEntity !== null) {
            $keywordTransfer->setIdKeyword($keywordEntity->getIdKeyword());
        }
        $keywordTransfer->setAdsGroupId($keywordItems[0]);
        $keywordTransfer->setDisplayText($keywordItems[1]);

        return $keywordTransfer;
    }

}
