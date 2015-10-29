<?php

namespace Pyz\Zed\Storage\Communication\Controller;

use SprykerFeature\Zed\Storage\Communication\Controller\MaintenanceController as SprykerMaintenanceController;
use Pyz\Zed\Storage\StorageDependencyProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Pyz\Zed\Glossary\Business\GlossaryFacade;

class MaintenanceController extends SprykerMaintenanceController
{
    /**
     * @return RedirectResponse
     */
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

    /**
     * @return GlossaryFacade
     * @throws \ErrorException
     */
    protected function getGlossaryFacade()
    {
        return $this->getDependencyContainer()->getProvidedDependency(StorageDependencyProvider::FACADE_GLOSSARY);
    }
}
