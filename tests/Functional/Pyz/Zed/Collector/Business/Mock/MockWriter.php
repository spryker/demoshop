<?php

namespace Functional\Pyz\Zed\Collector\Business\Mock;

use SprykerFeature\Zed\Collector\Business\Exporter\Writer\WriterInterface;

class MockWriter implements WriterInterface
{
    /**
     * @var array
     */
    private $collectedData = [];

    /**
     * @param array $dataSet
     * @param string $type
     *
     * @return bool
     */
    public function write(array $dataSet, $type = '')
    {
        $this->collectedData[] = $dataSet;
    }

    public function delete(array $dataSet)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mock_writer';
    }

    /**
     * @return mixed
     */
    public function getCollectedData()
    {
        return $this->collectedData;
    }
}
