<?php

namespace Pyz\Zed\Cms\Communication\Controller;

use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Cms\Communication\CmsDependencyContainer;
use Pyz\Zed\Cms\Communication\Form\CmsPageForm;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use SprykerFeature\Zed\Cms\Communication\Table\CmsPageTable;
use PavFeature\Zed\Cms\Communication\Controller\PageController as PavPageController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @method CmsQueryContainer getQueryContainer()
 * @method CmsDependencyContainer getDependencyContainer()
 * @method CmsFacade getFacade()
 */
class PageController extends PavPageController
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Request $request)
    {
        $idPage = $request->get(CmsPageTable::REQUEST_ID_PAGE);

        $form = $this->getDependencyContainer()
            ->createCmsPageForm('update', $idPage)
        ;

        $isSynced = $this->getFacade()->syncTemplate(self::CMS_FOLDER_PATH);

        $form->handleRequest();
        if ($form->isValid()) {
            $data = $form->getData();

            $pageTransfer = $this->createPageTransfer($data);
            $pageTransfer = $this->getFacade()->savePage($pageTransfer);
            $this->getFacade()->touchPageActive($pageTransfer);

            if (intval($data[CmsPageForm::CURRENT_TEMPLATE]) !== intval($data[CmsPageForm::FK_TEMPLATE])) {
                $this->getFacade()->deleteGlossaryKeysByIdPage($idPage);
            }

            $urlTransfer = $this->createUrlTransfer($data['id_url'], $pageTransfer, $data);
            $this->getUrlFacade()->saveUrlAndTouch($urlTransfer);

            return $this->redirectResponse(sprintf('/cms/page/edit?id-page=%s', $idPage));
        }

        $pageBlocks = $this->getDependencyContainer()->createCmsPageBlockTable($idPage);

        return $this->viewResponse([
            'form' => $form->createView(),
            'isSynced' => $isSynced,
            'idPage' => $idPage,
            'blocks' => $pageBlocks->render()
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function pageBlockTableAction(Request $request)
    {
        $idCmsPage = $request->query->get('id-page', null);
        if ($idCmsPage === null) {
            throw new NotFoundHttpException('No id-page parameter given.');
        }

        $table = $this->getDependencyContainer()->createCmsPageBlockTable($idCmsPage);

        return $this->jsonResponse($table->fetchData());
    }
}
