<?php

class Pyz_Zed_Mcm_Component_Model_AnalyticsUrlSnippet extends \ProjectA_Zed_Mcm_Component_Model_AnalyticsUrlSnippet
{

    public function getUrlSnippetWithAnalyticsParameters($params)
    {

        $campaignId = $params['campaign'];

        $channelName = (new \ProjectA_Zed_Mcm_Persistence_PacMcmChannelQuery())->findOneByIdMcmChannel($params['channel'])->getName();
        $partnerName = (new \ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery())->findOneByIdMcmPartner($params['partner'])->getName();
        $publicationName = (new \ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery())->findOneByIdMcmPublication($params['publication'])->getName();

        return '?wmc=' . $campaignId . '&utm_medium='. $this->processString($channelName)
        . '&utm_source=' . $this->processString($partnerName)
        . '&utm_campaign=' . $this->processString($campaignId)
        . '&utm_content=' . $this->processString($publicationName);

    }
}
