<?php

namespace Pyz\Zed\Storage\Communication\Controller;

use SprykerFeature\Zed\Storage\Communication\Controller\MaintenanceController as SprykerMaintenanceController;
use Pyz\Zed\Storage\StorageDependencyProvider;

class MaintenanceController extends SprykerMaintenanceController
{
    public function updateAction()
    {
        $result = $this->getGlossaryFacade()->importTranslationFromRemoteCSV();

        if (isset($result['info'])) {
            foreach ($result['info'] as $info) {
                $this->addInfoMessage($info);
            }
        }

        if (isset($result['error'])) {
            foreach ($result['error'] as $error) {
                $this->addErrorMessage($error);
            }
        }

        return $this->redirectResponse('/storage/maintenance/list');
    }

    protected function getGlossaryFacade()
    {
        return $this->getDependencyContainer()->getProvidedDependency(StorageDependencyProvider::FACADE_GLOSSARY);
    }
}
