<?php

namespace Pyz\Zed\ProductCountry\Communication\Controller;

use Generated\Shared\Transfer\ProductCountryTransfer;
use Pyz\Zed\ProductCountry\Business\ProductCountryFacade;
use Pyz\Zed\ProductCountry\Communication\ProductCountryDependencyContainer;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;

/**
 * @method ProductCountryFacade getFacade
 * @method ProductCountryDependencyContainer getDependencyContainer
 */
class ImportController extends AbstractController
{

    public function indexAction()
    {
        $form = $this->getDependencyContainer()->createCategoryFormAdd();

        $form->handleRequest();

        if ($form->isValid()) {
            $data = [
                '136823' => 'US',
                '137288' => 'DE',
                '137455' => 'NL',
                '137479' => 'NL',
                '137837' => 'US',
                '143210' => 'US',
                '143647' => 'US',
                '143654' => 'DE',
                '143913' => 'US',
                '146013' => 'US',
                '146341' => 'US',
                '146617' => 'US',
                '146624' => 'US',
                '146778' => 'US',
                '146815' => 'US',
                '146846' => 'US',
                '146860' => 'US',
                '146938' => 'US',
                '146952' => 'US',
                '146983' => 'US',
                '147003' => 'US',
            ];

            $productCountries = [];
            foreach ($data as $productCountryData) {
                $productCountryTransfer = (new ProductCountryTransfer())
                    ->fromArray($productCountryData);

                $productCountries[] = $productCountryTransfer;
            }

            $count = $this->getFacade()->importProductCountryData($productCountries);

            $this->addSuccessMessage(
                sprintf('%d product countries were imported successfully.', $count)
            );

            return $this->redirectResponse('/product-country');
        }

        return $this->viewResponse([
            'form' => $form->createView(),
        ]);
    }

}
