<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Model_Template implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const RENDER_SUBJECT = 'Subject';
    const RENDER_TEXT = 'Text';
    const RENDER_HTML = 'Html';

    /**
     * @var array
     */
    protected static $renderTypes = array(
        self::RENDER_SUBJECT,
        self::RENDER_TEXT,
        self::RENDER_HTML
    );

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplate $template
     * @param array $replaceVariables
     * @param null $type
     * @param bool $noWrap
     * @return mixed
     */
    public function renderTemplate(Sao_Zed_Mail_Persistence_SaoMailTemplate $template, $replaceVariables = array(), $type = null, $noWrap = false)
    {
        assert(in_array($type, static::$renderTypes));

        $getMethod = 'get' . $type;
        $content = $template->{$getMethod}();

        $baseContent = $this->render($content, $replaceVariables, $type);
        $wrappedContent = $baseContent;

        if ($template->getWrap() && !$noWrap) {
            $wrapTemplate = $template->getMailTemplateWrap();
            $wrapContent = $wrapTemplate->{$getMethod}();
            $replaceVariables = array_merge($replaceVariables, array('wrapContent' => $baseContent));
            $wrappedContent = $this->render($wrapContent, $replaceVariables, $type);
        }

        return $wrappedContent;
    }

    /**
     * @param $content
     * @param array $replaceVariables
     * @param null $type
     * @return string
     */
    public function render($content, $replaceVariables = array(), $type = null)
    {
        /* @var Sao_Zed_Mail_Component_Model_Renderer $templateRenderer */
        foreach ($this->factory->getSettings()->getTemplateRenderer() as $templateRenderer) {
            $content = $templateRenderer->render($content, $replaceVariables, $type);
        }
        return $content;
    }
}
