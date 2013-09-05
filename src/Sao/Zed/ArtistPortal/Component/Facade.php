<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * @property Generated_Zed_ArtistPortal_Component_Factory $factory
 */
class Sao_Zed_ArtistPortal_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{

    /**
     * @param array $data
     * @return array
     */
    public function processProducts(array $data)
    {
        return $this->factory->getModelInboundProduct()->processProducts($data);
    }

    /**
     * @param $file
     * @param bool $verbose
     * @param bool $rawShellImport
     * @param int $skipRows
     */
    public function importProduct($file, $verbose = false, $rawShellImport = false, $skipRows = 0)
    {
        $this->factory->getModelInboundProductImport()->importFile($file, $verbose, $rawShellImport, $skipRows);
    }

}
