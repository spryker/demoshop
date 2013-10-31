<?php

/**
 * Loads the order status mapping into the postgres database
 * @author martin.loetzsch@project-a.com
 */
class Pyz_Zed_Dwh_Component_Model_Import_Command_LoadOrderStatusMapping extends \ProjectA_Zed_Dwh_Component_Model_Import_Command_Psql
    implements \Generated\Zed\DwhOrderStatusMapping\Component\Dependency\DwhOrderStatusMappingFacadeInterface
{
    use \Generated\Zed\DwhOrderStatusMapping\Component\Dependency\DwhOrderStatusMappingFacadeTrait;

    protected function getSql()
    {
        $mapping = $this->facadeDwhOrderStatusMapping->getMapping();

        $sql = 'INSERT INTO tmp.order_item_status_mapping
            (status_perspective_name, status_group_name, status_name)
    VALUES';
        $rows = array();

        foreach ($mapping as $statusName => $perspectives) {
            foreach ($perspectives as $perspectiveName => $groupName) {
                $rows[] = PHP_EOL . '    (\'' . $statusName . '\', \'' . $groupName . '\', \''
                    . $perspectiveName . '\')';
            }
        }
        return $sql  . implode(',', $rows) . ';';
    }

    /**
     * Runs the command
     * @param \ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log A logger
     * @return boolean False when the command failed
     */
    public function run(\ProjectA_Zed_Dwh_Component_Model_Import_Log_Abstract $log)
    {
        $log->addMessage($this->job, 'loading status mappings');
        return parent::run($log);
    }

    /** @return string The name of the command */
    public function getName()
    {
        return "load order status mapping";
    }

    /**
     * Returns a description of the command for displaying it in the frontend
     * @return array A list of 'section' => 'content' tuples
     */
    public function getDescription()
    {
        return array('class' => __CLASS__,
            'computed sql' => '<pre class="brush: sql;">' . $this->getSql() . '</pre>');
    }
}
