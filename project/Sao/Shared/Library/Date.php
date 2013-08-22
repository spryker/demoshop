<?php

class Sao_Shared_Library_Date extends ProjectA_Shared_Library_Date {

    const DATE_FORMAT_SAO_LONG = 'sao_long';

    /**
     * @static
     * @param string $date
     * @param ProjectA_Shared_Library_Context|string|null $context
     * @param bool $convertTz should date/time be converted to context's timezone
     * @return string
     * @throws Exception
     */
    public static function dateSaoLong($date, $context = null, $convertTz = true)
    {
        return self::formatDate($date, self::DATE_FORMAT_SAO_LONG, $context, $convertTz);
    }

    /**
     * @param $date
     * @param string $format
     * @return string
     */
    public static function dateTimeConvertFrom($date, $format = 'Y-m-d H:i:s')
    {
        $context = ProjectA_Shared_Library_Context::getInstance(null);
        return $context->dateTimeConvertFrom($date, $format);
    }
}