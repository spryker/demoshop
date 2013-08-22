<?php

/**
 * Class Sao_Yves_Library_Form_Html
 * Helper class for form/html
 *
 * @author Stefan Sorge
 */
class Sao_Yves_Library_Form_Html
{
    /**
     * Returns the rendered error as HTML-string
     *
     * @param ProjectA_Yves_Library_Form_Model $form
     * @param string        $attribute
     *
     * @return string
     */
    static public function getError(ProjectA_Yves_Library_Form_Model $form, $attribute)
    {
        if (!$form->getError($attribute)) {
            return '';
        }
        return ProjectA_Yves_Library_Yii::app()->getController()->renderPartial(
            'layouts/partials/form/attribute-error',
            array('form' => $form, 'attribute' => $attribute, 'error' => $form->getError($attribute))
        );
    }

    /**
     * Returns the HTML-id of the element
     *
     * @param ProjectA_Yves_Library_Form_Model $form
     * @param string        $attribute
     *
     * @return string
     */
    static public function getId(ProjectA_Yves_Library_Form_Model $form, $attribute)
    {
        return sprintf('%s_%s', CHtml::encode(get_class($form)), CHtml::encode($attribute));
    }

    /**
     * Shortcut for handling json-powered data-attributes
     *
     * @todo maybe move to more general class, than "Form" - it's an all-over tool ;-)
     * @todo the $name should follow those specs:
     *       http://www.w3.org/html/wg/drafts/html/master/dom.html#embedding-custom-non-visible-data-with-the-data-*-attributes
     *
     * @param string $name
     * @param mixed  $data
     *
     * @return string
     */
    static public function getJsonDataAttr($name, $data)
    {
        return sprintf('data-%s="%s"', $name, CHtml::encode(json_encode($data)));
    }

    /**
     * @param string $value
     *
     * @return string
     */
    static public function getValueAttr($value)
    {
        return sprintf('value="%s"', CHtml::encode($value));
    }

    /**
     * @param string $value1
     * @param string $value2
     *
     * @return string
     */
    static public function getSelectedIf($value1, $value2)
    {
        if ($value1 != $value2) {
            return '';
        }
        return 'selected';
    }

    /**
     * @param string $value1
     * @param string $value2
     *
     * @return string
     */
    static public function getCheckedIf($value1, $value2)
    {
        if ($value1 != $value2) {
            return '';
        }
        return 'checked';
    }

    /**
     * @param mixed  $error
     * @param string $id
     * @param string $glue
     *
     * @return string
     */
    static public function getErrorLabelIf($error, $id, $glue = '<br>')
    {
        if (!$error || !count($error)) {
            return '';
        }

        if (!is_array($error)) {
            $error = array($error);
        }

        $error = array_map(array('CHtml', 'encode'), $error);
        $error = implode($glue, $error);

        return sprintf('<label class="label-error" for="%s">%s</label>', CHtml::encode($id), $error);
    }

}
