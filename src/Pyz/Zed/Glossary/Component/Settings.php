<?php
namespace Pyz\Zed\Glossary\Component;

class Settings extends \ProjectA_Zed_Glossary_Component_Settings
{
    public function getDumpFilePathName()
    {
        return __DIR__ . '/../File/initial_translation.yml';
    }
}
