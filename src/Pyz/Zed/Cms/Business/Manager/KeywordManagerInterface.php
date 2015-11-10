<?php

namespace Pyz\Zed\Cms\Business\Manager;

use Generated\Shared\Cms\KeywordInterface;
use Generated\Shared\Transfer\KeywordTransfer;
use Orm\Zed\Cms\Persistence\KamKeyword;

interface KeywordManagerInterface
{
    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeyword(KeywordInterface $keywordTransfer);

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return KeywordTransfer
     */
    public function saveCmsKeywordAndTouch(KeywordInterface $keywordTransfer);

    /**
     * @param string $data
     */
    public function saveCmsBulkKeywordAndTouch($data);

    /**
     * @param KamKeyword $keywordEntity
     *
     * @return KeywordTransfer
     */
    public function convertKeywordEntityToTransfer(KamKeyword $keywordEntity);

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchActiveKeyword(KeywordInterface $keywordTransfer);

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchActiveKeywordWithKeyChange(KeywordInterface $keywordTransfer);

    /**
     * @param KeywordInterface $keywordTransfer
     *
     * @return bool
     */
    public function touchDeleteKeyword(KeywordInterface $keywordTransfer);

    /**
     * @param int $idKeyword
     *
     * @return bool
     */
    public function deleteKeyword($idKeyword);
}
