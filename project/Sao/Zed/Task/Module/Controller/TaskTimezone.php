<?php

class Sao_Zed_Task_Module_Controller_TaskTimezone extends ProjectA_Zed_Library_Controller_Cronjob
{
    const PARAM_TIMEZONE_FROM = 'timezone-from';
    const PARAM_TIMEZONE_TO = 'timezone-to';

    const CONFIG_KEY = 'timezone_task_is_active';

    public function convertToUtcAction() {
        $this->checkIsActive();
        if (!$this->hasParam(self::PARAM_TIMEZONE_FROM) || !strlen($tzFrom = $this->getParam(self::PARAM_TIMEZONE_FROM))) {
            echo self::PARAM_TIMEZONE_FROM, ' parameter is missing', "\n";
            exit;
        }
        $tzTo = "UTC";

        ProjectA_Zed_Library_Stopwatch::start();
        $summary = $this->convertTimezone($tzFrom, $tzTo);
        ProjectA_Zed_Library_Stopwatch::stop();

        $this->setSummary($summary);
        $this->setReturnCode(ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }

    public function convertFromUtcAction() {
        $this->checkIsActive();
        if (!$this->hasParam(self::PARAM_TIMEZONE_TO) || !strlen($tzTo = $this->getParam(self::PARAM_TIMEZONE_TO))) {
            echo self::PARAM_TIMEZONE_TO, ' parameter is missing', "\n";
            exit;
        }
        $tzFrom = "UTC";

        ProjectA_Zed_Library_Stopwatch::start();
        $summary = $this->convertTimezone($tzFrom, $tzTo);
        ProjectA_Zed_Library_Stopwatch::stop();

        $this->setSummary($summary);
        $this->setReturnCode(ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }

    protected function convertTimezone($from, $to) {
        $dbName = ProjectA_Shared_Library_Config::get('db')['database'];

        $db = Propel::getConnection();
        $rows = $db->query('
            SELECT `table_name`, `column_name`, `data_type`
            FROM `information_schema`.`columns`
            WHERE `table_schema`='.$db->quote($dbName).'
            AND `data_type` IN ("datetime")'
        )->fetchAll(PropelPDO::FETCH_ASSOC);
        $byTable = array();
        foreach ($rows as $v) {
            if (!isset($byTable[$v['table_name']]))
                $byTable[$v['table_name']] = array();
            $byTable[$v['table_name']][] = $v;
        }

        $updateCount = 0;
        $db->beginTransaction();
        try {
            foreach ($byTable as $k => $v) {
                $columns = array();
                foreach ($v as $vv) {
                    $columns[] = '`'.$vv['column_name'].'`=CONVERT_TZ(`'.$vv['column_name'].'`, '.$db->quote($from).', '.$db->quote($to).')';
                }
                $query = 'UPDATE `'.$k.'` SET '.implode(', ', $columns).';';
                $db->query($query);
                ++$updateCount;
            }

            // Special case for pac_salesrule_condition serialized column
            $conditions = ProjectA_Zed_Salesrule_Persistence_PacSalesruleConditionQuery::create()->findByCondition(ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::$conditionFacadeGetter);
            /** @var ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition $condition */
            foreach ($conditions as $condition) {
                $configuration = json_decode($condition->getConfiguration(), true);
                if (isset($configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_START_DATE])) {
                    $configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_START_DATE] =
                        $this->convertDateTime($configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_START_DATE], $from, $to);
                    ++$updateCount;
                }
                if (isset($configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_END_DATE])) {
                    $configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_END_DATE] =
                        $this->convertDateTime($configuration[ProjectA_Zed_Salesrule_Component_Model_Conditions_DateBetween::CONFIG_KEY_END_DATE], $from, $to);
                    ++$updateCount;
                }
                $condition->setConfiguration(json_encode($configuration));
                $condition->save();
            }

            $db->commit();
        } catch (Exception $e) {
            $db->rollBack();
            throw $e;
        }
        return array('tzFrom' => $from, 'tzTo' => $to, 'updateCount' => $updateCount);
    }

    protected function convertDateTime($dateTime, $tzFrom, $tzTo, $format = 'Y-m-d H:i:s') {
        $dateTime = new DateTime($dateTime, new DateTimeZone($tzFrom));
        $dateTime->setTimezone(new DateTimeZone($tzTo));
        return $dateTime->format($format);
    }

    protected function checkIsActive() {
        $config = ProjectA_Shared_Library_Config::get();
        if (!isset($config[self::CONFIG_KEY]) || !$config[self::CONFIG_KEY]) {
            echo 'This task is disabled', "\n";
            exit;
        }
    }
}
