<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Renderer_Condition extends Sao_Zed_Mail_Component_Model_Renderer
{
    const PATTERN_NAME_FROM = 'from';
    const PATTERN_NAME_COMMAND = 'command';
    const PATTERN_NAME_VALUE_RIGHT = 'valueRight';
    const PATTERN_NAME_CONTENT_IF = 'content_if';
    const PATTERN_NAME_CONTENT_ELSE = 'content_else';

    const COMMAND_EQUALS = '==';
    const COMMAND_NOT_EQUALS = '!=';
    const COMMAND_NOT_EQUALS_1 = '<>';
    const COMMAND_LOWER_THAN = '<';
    const COMMAND_LOWER_EQUALS_THAN = '<=';
    const COMMAND_GREATER_THAN = '>';
    const COMMAND_GREATER_EQUALS_THAN = '>=';

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
                    '/{%%if (?<%s>.*)(&nbsp;| )(?<%s>.*)(&nbsp;| )(?<%s>.*)}(?<%s>.*)({%%endif}|{%%else}(?<%s>.*){%%endif})/isUm',
                    self::PATTERN_NAME_FROM,
                    self::PATTERN_NAME_COMMAND,
                    self::PATTERN_NAME_VALUE_RIGHT,
                    self::PATTERN_NAME_CONTENT_IF,
                    self::PATTERN_NAME_CONTENT_ELSE
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
        $fromValue = $this->getValueForKeyFromMultidimensionalArray($from, $replaceVariables);
        $command = $matches[self::PATTERN_NAME_COMMAND];
        $valueRight = $matches[self::PATTERN_NAME_VALUE_RIGHT];
        $contentIf = $matches[self::PATTERN_NAME_CONTENT_IF];
        $contentElse = '';
        if (isset($matches[self::PATTERN_NAME_CONTENT_ELSE])) {
            $contentElse = $matches[self::PATTERN_NAME_CONTENT_ELSE];
        }

        $newContent = $contentElse;
        if ($this->checkCondition($command, $fromValue, $valueRight)) {
            $newContent = $contentIf;
        }

        return $newContent;
    }

    protected function checkCondition($command, $valueLeft, $valueRight)
    {
        //important do decode html entities here, because WYSIWYG-Editor will add entities on save
        $command = html_entity_decode($command);
        switch($command) {
            case self::COMMAND_EQUALS:
                return $valueLeft == $valueRight;
                break;
            case self::COMMAND_NOT_EQUALS:
            case self::COMMAND_NOT_EQUALS_1:
                return $valueLeft != $valueRight;
                break;
            case self::COMMAND_LOWER_THAN:
                return $valueLeft < $valueRight;
                break;
            case self::COMMAND_LOWER_EQUALS_THAN:
                return $valueLeft <= $valueRight;
                break;
            case self::COMMAND_GREATER_THAN:
                return $valueLeft > $valueRight;
                break;
            case self::COMMAND_GREATER_EQUALS_THAN:
                return $valueLeft >= $valueRight;
                break;
            default:
                return false;
        }
    }
}
