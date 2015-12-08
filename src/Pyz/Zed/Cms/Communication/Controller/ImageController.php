<?php

namespace Pyz\Zed\Cms\Communication\Controller;

use Pyz\Zed\Cms\CmsDependencyProvider;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;
use PavFeature\Zed\FileUpload\Business\FileUploadFacade;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ImageController extends AbstractController
{
    const FILE_TYPE = 'cms';
    const FILE_REQUEST = 'uploadedFile';

    /**
     * @return array
     */
    public function indexAction()
    {
        $files = $this->getFileUploadFacade()->listFilesByType(self::FILE_TYPE);

        return [
            'files' => $files,
            'file_request' => self::FILE_REQUEST,
        ];
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function uploadAction(Request $request)
    {
        // @TODO: re-enable!
        throw new \Exception('ImageController->uploadAction is disabled due to server settings!');



        if ($request->isMethod('POST') === false) {
            throw new BadRequestHttpException('Only POST is allowed for file uploads');
        }

        $file = $request->files->get(self::FILE_REQUEST);
        if ($file === null || ($file->isValid() === false)) {
            throw new BadRequestHttpException('No file sent');
        }

        $fileUploaded = $this->getFileUploadFacade()->saveFile(self::FILE_TYPE, $file);

        if ($fileUploaded === false) {
            throw new HttpException(500, 'Could not upload file');
        }

        return $this->redirectResponse('/cms/image');
    }

    /**
     * @return FileUploadFacade
     * @throws \ErrorException
     */
    protected function getFileUploadFacade()
    {
        return $this->getDependencyContainer()->getProvidedDependency(CmsDependencyProvider::FACADE_FILE_UPLOAD);
    }
}
