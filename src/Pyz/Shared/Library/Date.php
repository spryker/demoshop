<?php

class Pyz_Shared_Library_Date extends \ProjectA_Shared_Library_Date
{
    /**
     * @param $date
     * @param string $format
     * @return string
     */
    public static function dateTimeConvertFrom($date, $format = 'Y-m-d H:i:s')
    {
        $context = \ProjectA_Shared_Library_Context::getInstance(null);
        return $context->dateTimeConvertFrom($date, $format);
    }
}
