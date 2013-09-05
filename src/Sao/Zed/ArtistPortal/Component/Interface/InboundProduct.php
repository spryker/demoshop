<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
interface Sao_Zed_ArtistPortal_Component_Interface_InboundProduct
{
    /**
     * @param array $data
     * @return array
     */
    public function processProduct(array $data);


    /**
     * @param array $data
     * @return array
     */
    public function processProducts(array $data);
}
