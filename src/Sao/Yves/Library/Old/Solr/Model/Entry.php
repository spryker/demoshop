<?php

class Sao_Yves_Library_Solr_Model_Entry extends ProjectA_Yves_Library_Solr_Model_Entry
{

    /**
     * @return Sao_Yves_Library_Solr_Model_Entry_Stmt
     */
    public function getEntryStmt()
    {
        return Generated_Yves_ModelFactory::getYpSolrModelEntryStmt($this->store->facetQuery());
    }

    /**
     * @return Sao_Yves_Library_Solr_Model_Entry_Stmt
     */
    public function getEntryFulltextStmt()
    {
        return Generated_Yves_ModelFactory::getYpSolrModelEntryStmt($this->store->fulltextQuery());
    }
}