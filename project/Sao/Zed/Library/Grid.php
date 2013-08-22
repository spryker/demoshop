<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Library_Grid extends ProjectA_Zed_Library_Grid
{
    /**
     * TODO Remove this function
     *
     * @param array $config
     */
    public function setConfigArray(array $config = array())
    {
        $this->validateConfiguration($config);
        $this->setOptions($config);

        $this->init();
        $this->renderer = Sao_Zed_Library_Grid_Helper::getRenderer($this);

        if ($config['data'] instanceof ModelCriteria) {
            $this->initFromModelCriteria($config['data']);
        } else {
            $this->initFromArray($config['data']);
        }
        $this->initPaginator();
    }
}
