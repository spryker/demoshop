<?php

namespace Pyz\Zed\Cms\Communication\Controller;

use Pyz\Zed\Cms\CmsDependencyProvider;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TranslationController extends AbstractController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        return $this->getGlossaryFacade()->getAllKeysWithTranslations();
    }

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

        return $this->redirectResponse('/cms/translation');
    }

    /**
     * @return GlossaryFacade
     * @throws \ErrorException
     */
    public function getGlossaryFacade()
    {
        return $this->getDependencyContainer()->getProvidedDependency(CmsDependencyProvider::FACADE_GLOSSARY);
    }
}
