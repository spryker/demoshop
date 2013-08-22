<?php
class Sao_Yves_Library_Base_ThemeManager extends CThemeManager
{
    const DEFAULT_THEME = 'tirendo';
    
    public function getBaseTheme()
    {
        return $this->getBasePath() . self::DEFAULT_THEME . '/';    
    }
    
    public function getBasePath()
    {
        return APPLICATION_PROJECT . '/Yves/application/themes/';    
    }
}