<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Library_Grid_Renderer_Html extends ProjectA_Zed_Library_Grid_Renderer_Html
{
    /**
     * @return string
     */
    protected function renderSearchForm()
    {
        $userParams = ProjectA_Zed_Library_Url::getUserParams();
        $output = '<li class="search"><form method="GET"><div id="search_container"><table id="grid_search_table">';
        foreach ($userParams as $userParamKey => $userParamValue) {
            // HOTFIX page param don't need to be in the hidden inputs from the search form -- S.L.
            if (!is_array($userParamKey) && !is_array($userParamValue) && $userParamKey != 'page') {
                $output .= '<input type="hidden" name="' . $userParamKey . '" value="' . $userParamValue . '" />';
            }
        }
        $searchConfiguration = ProjectA_Zed_Library_Grid_Helper::getSearchConfiguration();
        $searchableColumns = $this->grid->getSearchableColumns();
        $idCount = 0;
        $filter = new Zend_Filter_Word_UnderscoreToCamelCase();
        foreach ($searchableColumns as $columnName) {
            $columnPhpName = $filter->filter($columnName);
            $operandSetName = $this->getOperandSetName($columnPhpName);
            $defaultValue = '';
            $defaultValue2 = '';
            // this is the only difference to the core, it simply sets contains as default
            // as only strings will have the contains, all others are not changed, should be put into core later on
            $defaultOperandValue = self::OPERAND_CONTAINS;
            if ($searchConfiguration && array_key_exists($columnName, $searchConfiguration)) {
                $defaultValue = $searchConfiguration[$columnName]['value'];
                $defaultValue2 = isset($searchConfiguration[$columnName]['value2']) ? $searchConfiguration[$columnName]['value2'] : '';
                $defaultOperandValue = $searchConfiguration[$columnName]['operand'];
            }
            $defaultValue  = ProjectA_Zed_Library_Security_Html::escape($defaultValue);
            $defaultValue2 = ProjectA_Zed_Library_Security_Html::escape($defaultValue2);

            //$output .= '<tr><td colspan="3"><span class="search_field_name">' . $columnName . '</span></td></tr>';
            $output .= '<tr>';

            $output .= '<td class="right_valign"><span class="search_field_name">' . $columnName . '</span></td>';

            $output .= '<td>';
            $selectId = 'operand_select_' . $idCount;
            $output .= $this->getOperandSet($operandSetName, $columnName, $selectId, $defaultOperandValue);
            $output .= '</td>';

            $output .= '<td>';
            if ($this->hasDbColumn($columnPhpName) && $this->isEnumColumn($columnPhpName)) {
                $output .= $this->createEnumSelectBox($this->getValueSet($columnPhpName), $columnName, $defaultValue);
            } elseif ($this->hasDbColumn($columnPhpName) && $this->isBooleanColumn($columnPhpName)) {
                $output .= $this->createBooleanSelectBox($this->getValueSet($columnPhpName), $columnName, $defaultValue);
            } else {
                $output .= '<input id="search_input_' . $idCount . '" type="search" class="' . $this->getUiClassType($operandSetName) . '" name="search[' . $columnName . '][value]" value="' . $defaultValue . '" placeholder="' . $this->translate(ProjectA_Zed_Library_Grid_Helper::getStringWithoutSingleQuotes($columnName)) . '"  style=""/>';
            }
            $output .= '</td>';

            $output .= '<td id="search_td_v2_' . $idCount . '">';
            if ($defaultOperandValue == self::OPERAND_BETWEEN) {
                $display = '';
            } else {
                $display = 'display:none;';
            }
            $output .= '<input id="search_input_v2_' . $idCount . '" type="search" class="' . $this->getUiClassType($operandSetName) . '" name="search[' . $columnName . '][value2]" value="' . $defaultValue2 . '" placeholder="' . $this->translate(ProjectA_Zed_Library_Grid_Helper::getStringWithoutSingleQuotes($columnName)) . '"  style="' . $display . '" />';
            $output .= '</td>';
            $idCount++;
        }
        $output .= '</table></div><div style="clear:both;"></div>';
        $output .= $this->getOperandDescription();
        $output .= '<input type="submit" value="submit" /></form></li>';
        return $output;
    }
}
