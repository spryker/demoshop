<?php

class Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
{

    public function toArray()
    {
        $result = array();
        $objectVars = get_object_vars($this);
        foreach ($objectVars as $key => $value) {
            if (is_object($value)) {
                $result[$key] = $value->toArray();
            } elseif (is_array($value)) {
                foreach ($value as $k => $entry) {
                    if (is_object($entry)) {
                        $result[$k] = $entry->toArray();
                    } else {
                        $result[$k] = $entry;
                    }
                }
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

}
