<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Renderer_Loop extends Sao_Zed_Mail_Component_Model_Renderer
{
    const PATTERN_NAME_FROM = 'from';
    const PATTERN_NAME_TO = 'to';
    const PATTERN_NAME_CONTENT = 'content';

    /**
     * @param $content
     * @param array $replaceVariables
     * @param null $type
     * @return mixed|string
     */
    public function render($content, $replaceVariables = array(), $type = null)
    {
        $callback = function ($matches) use ($replaceVariables) {
            return $this->renderLoop($matches, $replaceVariables);
        };
        $content =
            preg_replace_callback(
                sprintf(
                    '/{%%foreach data=(?<%s>.*) item=(?<%s>.*)}(?<%s>.*){%%endforeach}/isUm',
                    self::PATTERN_NAME_FROM,
                    self::PATTERN_NAME_TO,
                    self::PATTERN_NAME_CONTENT
                ),
                $callback,
                $content
            );

        return $content;
    }

    /**
     * @param $matches
     * @param array $replaceVariables
     * @return string
     */
    public function renderLoop($matches, $replaceVariables = array())
    {
        $from = $matches[self::PATTERN_NAME_FROM];
        $to = $matches[self::PATTERN_NAME_TO];
        $content = $matches[self::PATTERN_NAME_CONTENT];
        $fromValue = $this->getValueForKeyFromMultidimensionalArray($from, $replaceVariables);

        //nothing to loop, return origin
        if (empty($fromValue) || !is_array($fromValue)) {
            return $content;
        }

        //fully render each new block
        $newContent = '';
        foreach ($fromValue as $value) {
            $newReplaceVariables = array_merge($replaceVariables, array($to => $value));
            $newContent .= $this->factory->getModelTemplate()->render($content, $newReplaceVariables);
        }
        return $newContent;
    }
}
