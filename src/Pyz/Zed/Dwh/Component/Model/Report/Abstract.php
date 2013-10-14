<?php

abstract class Pyz_Zed_Dwh_Component_Model_Report_Abstract extends ProjectA_Zed_Dwh_Component_Model_Report_Abstract
{

    /** Returns the start of a time dimension name dependent on the prefix */
    private function applyPrefix($prefix = '')
    {
        if ($prefix) {
            return '[' . $prefix . ' date by ';
        } else {
            return '[Date by ';
        }
    }

    /** Returns the time level for the selected time period */
    protected function getTimeLevel($prefix = '', $reversed = false)
    {
        $suffix = $reversed ? ' reversed' : '';
        switch ($this->getParamValue('time-unit')) {
            case 'Days':
                return $this->applyPrefix($prefix) . 'month' . $suffix . '].[Day]';
            case 'Weeks':
                return $this->applyPrefix($prefix) . 'week' . $suffix . '].[Week]';
            case 'Months':
                return $this->applyPrefix($prefix) . 'month' . $suffix . '].[Month]';
            case 'Quarters':
                return $this->applyPrefix($prefix) . 'month' . $suffix . '].[Quarter]';
            case 'Years':
                return $this->applyPrefix($prefix) . 'month' . $suffix . '].[Year]';
            default:
                assert(false);
        }
    }

    /** Returns the time dimension for the selected time period */
    protected function getTimeDimension($prefix = '', $reversed = false)
    {
        $suffix = $reversed ? ' reversed' : '';
        if ($this->getParamValue('time-unit') == 'Weeks') {
            return $this->applyPrefix($prefix) . 'week' . $suffix . ']';
        } else {
            return $this->applyPrefix($prefix) . 'month' . $suffix . ']';
        }
    }

    /** Returns the a set expression for the selected time period for the inclusion in a table axis */
    protected function getTimeExpressionForTableAxis($prefix = '', $reversed = false)
    {
        $n = $this->getParamValue('time-units');
        $upTo = $this->getParamValue('time-upto');
        $timeUnit= $this->getParamValue('time-unit');

        if ($timeUnit== 'Days' && $n < 8 && $upTo == 0) {
            $fn = ($reversed ? 'Head' : 'Tail');
            return '
    {' . $fn . '(' . $this->getTimeLevel($prefix, $reversed) . '.Members,8).item(' . ($reversed ? 7 : 0) . '),
     ' . $fn . '(' . $this->getTimeLevel($prefix, $reversed) . '.Members,' . $n . ')}';
        } else {
            return $this->getTimeExpressionForChart($prefix, $reversed);
        }
    }

    /** Returns the a set expression for the selected time period for the inclusion in chart */
    protected function getTimeExpressionForChart($prefix = '', $reversed = false)
    {
        $n = $this->getParamValue('time-units');
        $timeUnit = $this->getParamValue('time-unit');
        $upTo = $this->getParamValue('time-upto');
        if ($timeUnit== 'Days' && $n < 8 && $upTo == 0) {
            $n = 8;
        }
        $set = ($reversed ? 'Tail' : 'Head') . '('
            . ($reversed ? 'Head' : 'Tail') . '('
            . $this->getTimeLevel($prefix, $reversed) . '.Members, ' . ($n + $upTo) . '), '
            . $n . ')';

        switch ($timeUnit) {
            case 'Days':
                return $set;
            case 'Weeks':
                return 'Descendants(' . $set . ')';
            case 'Months':
                return $set;
            case 'Quarters':
                return 'Descendants(' . $set . ', 2, BEFORE)';
            case 'Years':
                return 'Descendants(' . $set . ', 3, BEFORE)';
            default:
                assert(false);
        }
    }


    /** Returns a member set for the the selected time period for the inclusion in a filter */
    protected function getTimeExpressionForFilter($cubeName, $prefix = '')
    {
        $n = $this->getParamValue('time-units');
        $upTo = $this->getParamValue('time-upto');
        $members = $this->getNLastLevelMembers($n + $upTo, $cubeName, $this->getTimeLevel($prefix));
        return array_slice($members, 0, $n);
    }

    /**
     * Adds time selection controls
     * @return ProjectA_Zed_Dwh_Component_Model_Report_Abstract
     */
    protected function addTimeSelection($cubeName, $prefix = '')
    {
        $timeMembers = $this->factory->createModelSchemaProcessor()->getLevelMembers($cubeName, $this->getTimeLevel($prefix));
        if ($this->getParamValue('time-upto') >= count($timeMembers))
        {
            $this->params['time-upto'] = 0;
        }
        $timeList = array_map(function ($elem) { return $elem['MEMBER_NAME']; }, $timeMembers);

        $this->addNumberSelect('time-units', 1, 20)
            ->addHtml(' ')
            ->addSelect('time-unit', array('Days', 'Weeks', 'Months', 'Quarters', 'Years'))
            ->addHtml(' up to ')
            ->addSelect('time-upto', array_reverse($timeList), true);

        return $this;
    }

}
