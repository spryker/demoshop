<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors;

class ErrorResultCollection implements ErrorResultCollectionInterface
{

    /**
     * @var ErrorResultElementInterface[]
     */
    private $resultCollection = array();

    /**
     * @param ErrorResultElementInterface $resultElement
     */
    public function addResultElement(ErrorResultElementInterface $resultElement)
    {
        $this->resultCollection[] = $resultElement;
    }

    /**
     * @param ErrorResultCollectionInterface $resultCollection
     */
    public function addResultCollection(ErrorResultCollectionInterface $resultCollection)
    {
        $this->resultCollection = array_merge($this->resultCollection, $resultCollection->getElements());
    }

    /**
     * @return ErrorResultElementInterface[]
     */
    public function getElements()
    {
        return $this->resultCollection;
    }

    /**
     * @return bool
     */
    public function hasErrors()
    {
        return count($this->resultCollection) > 0;
    }
}
