<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Renderer_Partial extends Sao_Zed_Mail_Component_Model_Renderer
{
    const PATTERN_NAME_TEMPLATE = 'template';
    const PATTERN_NAME_FROM = 'from';

    /**
     * @param string $content
     * @param array $replaceVariables
     * @param null $type
     * @return string
     */
    public function render($content, $replaceVariables = array(), $type = null)
    {
        $callback = function ($matches) use ($replaceVariables, $type) {
            return $this->renderPartial($matches, $replaceVariables, $type);
        };
        $content =
            preg_replace_callback(
                sprintf(
                    '/{%%render template=(?<%s>.*)(data=(?<%s>.*)| |)}/isU',
                    self::PATTERN_NAME_TEMPLATE,
                    self::PATTERN_NAME_FROM
                ),
                $callback,
                $content
            );

        return $content;
    }

    /**
     * @param $matches
     * @param array $replaceVariables
     * @param null $type
     * @return string
     */
    public function renderPartial($matches, $replaceVariables = array(), $type = null)
    {
        $from = isset($matches[self::PATTERN_NAME_FROM]) ? $matches[self::PATTERN_NAME_FROM] : null;
        if ($from) {
            $newReplaceVariables = $this->getValueForKeyFromMultidimensionalArray($from, $replaceVariables);
        } else {
            $newReplaceVariables = $replaceVariables;
        }

        $template = $matches[self::PATTERN_NAME_TEMPLATE];
        $templateEntity = $this->factory->getEntityTemplateQuery()->findOneByName($template);
        if (!$templateEntity) {
            //in case we don`t find the template just return the original string
            return $matches[0];
        }

        return $this->factory->getModelTemplate()->renderTemplate($templateEntity, $newReplaceVariables, $type);
    }
}
