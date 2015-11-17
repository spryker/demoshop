<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors;

interface ErrorResultCollectionInterface
{
    /**
     * @param ErrorResultElementInterface $resultElement
     */
    public function addResultElement(ErrorResultElementInterface $resultElement);

    /**
     * @param ErrorResultCollectionInterface $resultCollection
     */
    public function addResultCollection(ErrorResultCollectionInterface $resultCollection);

    /**
     * @return ErrorResultElementInterface[]
     */
    public function getElements();

    /**
     * @return bool
     */
    public function hasErrors();
}
