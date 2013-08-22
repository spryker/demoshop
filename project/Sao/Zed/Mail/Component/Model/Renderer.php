<?php
/**
 * @version $Id$
 * @property Sao_Zed_Mail_Component_Factory $factory
 */
abstract class Sao_Zed_Mail_Component_Model_Renderer implements
     ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const PLACEHOLDER_PREFIX = '{%';
    const PLACEHOLDER_POSTFIX = '}';
    const PLACEHOLDER_VARIABLE_DELIMITER = '.';

    /**
     * @param $content
     * @param array $replaceVariables
     * @param null $type
     * @return string
     */
    abstract public function render($content, $replaceVariables = array(), $type = null);

    /**
     * @param $replaceVariables
     * @return array
     */
    protected function createPreparedReplaceVariables($replaceVariables)
    {
        $preparedReplaceVariables = array();
        foreach ($replaceVariables as $key => $val) {
            $preparedReplaceVariables[] = self::PLACEHOLDER_PREFIX . $key . self::PLACEHOLDER_POSTFIX;
        }
        return $preparedReplaceVariables;
    }

    /**
     * read array value from a multidimensional array
     *
     * sample:
     * $array = array(
     *   'level1' => array(
     *      'level2' => 'value'
     *   )
     * );
     * $value = $this->getRecursiveArrayValueForKey('level.level2', $array)
     *
     * @param $key
     * @param array $values
     * @return string
     */
    protected function getValueForKeyFromMultidimensionalArray($key, array $values)
    {
        //no values at all, nothing to check
        if (empty($values)) {
            return '';
        }

        //check for value recursively
        $keys = explode(self::PLACEHOLDER_VARIABLE_DELIMITER, $key);
        if (count($keys) > 1) {
            $values = isset($values[$keys[0]]) ? $values[$keys[0]] : array();
            array_shift($keys);
            $key = implode(self::PLACEHOLDER_VARIABLE_DELIMITER, $keys);
            return $this->getValueForKeyFromMultidimensionalArray($key, $values);
        }
        return isset($values[$keys[0]]) ? $values[$keys[0]] : '';
    }
}
