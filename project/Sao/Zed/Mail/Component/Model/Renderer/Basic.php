<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Renderer_Basic extends Sao_Zed_Mail_Component_Model_Renderer
{
    /**
     * @param $content
     * @param array $replaceVariables
     * @param null $type
     * @return string
     */
    public function render($content, $replaceVariables = array(), $type = null)
    {
        $preparedReplaceVariables = $this->createPreparedReplaceVariables($replaceVariables);

        preg_match_all('/{%(.*)}/isU', $content, $matches);

        $foundPlaceholders = $matches[0];
        $foundPlaceholdersVariables = $matches[1];

        if (!empty($foundPlaceholders)) {
            while ($current = current($foundPlaceholders)) {
                $key = key($foundPlaceholders);
                $replaceVariablesKey = $foundPlaceholdersVariables[$key];
                $value = $this->getValueForKeyFromMultidimensionalArray($replaceVariablesKey, $replaceVariables);
                next($foundPlaceholders);
                if ($value && !is_array($value)) {
                    $content = str_replace($current, $value, $content);
                } elseif (empty($value)) {
                    $content = str_replace($current, 'Unknown', $content);
                }
            }
        }

        return $content;
    }
}
