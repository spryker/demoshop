<?php

/**
 *
 */
class Sao_Yves_Library_Base_Pagination
{
    /**
     * @var
     */
    protected $itemCount;
    /**
     * @var
     */
    protected $itemsPerPage;
    /**
     * @var
     */
    protected $offset;


    /**
     * @param $itemCount
     * @param $itemsPerPage
     * @param $offset
     */
    public function __construct($itemCount, $itemsPerPage, $offset)
    {
        $this->itemCount = $itemCount;
        $this->itemsPerPage = $itemsPerPage;
        $this->offset = $offset;
    }

    /**
     * @return mixed
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    /**
     * @return int
     */
    public function getActivePage()
    {
        return $this->getCurrentPage();
    }

    /**
     * @return mixed
     */
    public function getVisibleItemCount()
    {
        if ($this->itemCount < $this->itemsPerPage) {
            return $this->itemCount;
        }
        return $this->itemsPerPage;
    }


    /**
     * @return array
     */
    public function getData()
    {
        $data = array();

        $interval = 2;

        $intervalStart = $this->setIntervalStart($interval);

        $intervalEnd = $this->setIntervalEnd($interval, $intervalStart);

        $data = $this->addPreviousPage($data);

        $data = $this->addNeighbourPages($data, $intervalStart, $intervalEnd);

        $data = $this->addLastPage($data, $intervalEnd);

        $data = $this->addNextPage($data);

        return $data;
    }


    /**
     * @return int
     */
    protected function getPageCount()
    {
        return (int)ceil($this->itemCount / $this->itemsPerPage);
    }

    /**
     * @return int
     */
    protected function getCurrentPage()
    {
        return (int)floor($this->offset / $this->itemsPerPage) + 1;
    }

    /**
     * @return int
     */
    protected function getPreviousPageStart()
    {
        return ($this->getCurrentPage() - 2) * $this->itemsPerPage;
    }

    /**
     * @return int
     */
    protected function getNextPageStart()
    {
        return $this->getCurrentPage() * $this->itemsPerPage;
    }

    /**
     * @return int
     */
    protected function getLastPageStart()
    {
        return ($this->getPageCount() - 1) * $this->itemsPerPage;
    }

    /**
     * @param $interval
     * @return int
     */
    protected function setIntervalStart($interval)
    {
        $intervalStart = $this->getCurrentPage() - $interval;
        $intervalStart = ($intervalStart < 1) ? 1 : $intervalStart;
        return $intervalStart;
    }

    /**
     * @param $interval
     * @param $intervalStart
     * @return int
     */
    protected function setIntervalEnd($interval, $intervalStart)
    {
        $intervalEnd = $intervalStart + $interval * 2;
        $intervalEnd = ($intervalEnd > $this->getPageCount()) ? $this->getPageCount() : $intervalEnd;
        return $intervalEnd;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function addPreviousPage(array $data)
    {
        if ($this->getCurrentPage() > 1) {
            $data[] = array('start' => $this->getPreviousPageStart(), 'text' => '&lt;');
        }
        return $data;
    }

    /**
     * @param $data
     * @param $intervalStart
     * @param $intervalEnd
     * @return array
     */
    protected function addNeighbourPages($data, $intervalStart, $intervalEnd)
    {
        for ($i = $intervalStart; $i <= $intervalEnd; $i++) {
            $startNew = $this->itemsPerPage * ($i - 1);
            $data[] = array('start' => $startNew, 'text' => $i,);
        }
        return $data;
    }

    /**
     * @param $data
     * @param $intervalEnd
     * @return array
     */
    protected function addLastPage($data, $intervalEnd)
    {
        if ($intervalEnd != $this->getPageCount()) {
            $data[] = array('start' => $this->getLastPageStart(), 'text' => '... ' . $this->getPageCount());
        }
        return $data;
    }

    /**
     * @param $data
     * @return array
     */
    protected function addNextPage($data)
    {
        if ($this->getCurrentPage() < $this->getPageCount()) {
            $data[] = array('start' => $this->getNextPageStart(), 'text' => '&gt;');
        }
        return $data;
    }
}