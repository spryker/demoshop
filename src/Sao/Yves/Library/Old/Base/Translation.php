<?php
class Sao_Yves_Library_Base_Translation extends CApplicationComponent
{
    const TRANSLATION_DELIMITER = '%';

    /**
     * @var array
     */
    protected $translation = [];

    public function init()
    {
        //load yves messages
        require_once(APPLICATION_SOURCE_DIR . '/Yves/application/messages/Yves.php');
        parent::init();
    }

    /**
     * @param $string string to translate
     * @param array $data Key must match placeholder name
     * @return string
     */
    public function t($string, array $data = array())
    {
        $locale = ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale();

        $key = ProjectA_Shared_Library_Storage::getGlossarySingleKey($string, $locale);

        /** get raw translation */
        if (array_key_exists($key, $this->translation)) {
            $string = $this->translation[$key];
        } else {
            $translation = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($key);
            if (false !== $translation && is_string($translation)) {
                $this->translation[$key] = $translation;
                $string = $translation;
            } else {
                // @todo implement logging to lumberjack
            }
        }

        if (!empty($data)) {
            // replace all occurrences of placeholder in translation string
            // i.e. %SIZE% in string will get replaced by $data = array('size' => 123)
            foreach ($data as $key => $value) {
                $delimiter = self::TRANSLATION_DELIMITER . $key . self::TRANSLATION_DELIMITER;
                $string = str_ireplace($delimiter, $value, $string);
            }
        }
        return $string;
    }

    public function tReverse($string)
    {
        $string = strtolower($string);
        if (empty($this->translation)) {
            $this->loadTranslation();
        }

        if ($this->translation) {
            $flip = array_flip($this->translation);
            if (isset($flip[$string])) {
                $string = $flip[$string];
            } else {
                foreach ($this->translation as $key => $localKey) {
                    if ($string == strtolower($localKey)) {
                        $string = $key;
                        break;
                    }
                }
            }
            return $string;
        }
    }

    protected function loadTranslation()
    {
        $groupedKey = ProjectA_Shared_Library_Storage::getTranslationGroupedKey('yves');
        $this->translation = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($groupedKey);
    }
}

function t($string, array $data=array())
{
    return ProjectA_Yves_Library_Yii::app()->translation->t($string, $data);
}

