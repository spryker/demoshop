<?php

class Sao_Zed_Yves_Module_Controller_Cronjob extends ProjectA_Zed_Yves_Module_Controller_Cronjob
{

    public function getLegacyHeaderAction()
    {
        $legacyHeaderArray = $this->facadeLegacy->getLegacyHeader();

        $summary = count($legacyHeaderArray) ? 'fetched' : 'was unable to read';

        if ($legacyHeaderArray) {
            $written = file_put_contents(Sao_Shared_Library_Legacy_Content::getHeaderFilenameWithPath(), serialize($legacyHeaderArray));

            if (!$written) {
                $summary = 'was unable to write to filesystem';
            }
        }

        $this->setSummary(array('header' => $summary));
        $errorCode = ('fetched' == $summary) ? ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS : ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_ERROR;
        $this->setReturnCode($errorCode);
    }

}
