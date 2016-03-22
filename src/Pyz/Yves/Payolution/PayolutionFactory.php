<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Payolution;

use Pyz\Yves\Payolution\Form\DataProvider\InstallmentDataProvider;
use Pyz\Yves\Payolution\Form\DataProvider\InvoiceDataProvider;
use Pyz\Yves\Payolution\Form\InstallmentSubForm;
use Pyz\Yves\Payolution\Form\InvoiceSubForm;
use Pyz\Yves\Payolution\Handler\PayolutionHandler;
use Spryker\Yves\Kernel\AbstractFactory;

class PayolutionFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Payolution\Form\InvoiceSubForm
     */
    public function createInvoiceForm()
    {
        return new InvoiceSubForm();
    }

    /**
     * @return \Pyz\Yves\Payolution\Form\InstallmentSubForm
     */
    public function createInstallmentForm()
    {
        return new InstallmentSubForm();
    }

    /**
     * @return \Pyz\Yves\Payolution\Form\DataProvider\InstallmentDataProvider
     */
    public function createInstalmentFormDataProvider()
    {
        return new InstallmentDataProvider($this->getPayolutionClient());
    }

    /**
     * @return \Pyz\Yves\Payolution\Form\DataProvider\InvoiceDataProvider
     */
    public function createInvoiceFormDataProvider()
    {
        return new InvoiceDataProvider();
    }

    /**
     * @return \Pyz\Yves\Payolution\Handler\PayolutionHandler
     */
    public function createPayolutionHandler()
    {
        return new PayolutionHandler($this->getPayolutionClient());
    }

    /**
     * @return \Spryker\Client\Payolution\PayolutionClientInterface
     */
    public function getPayolutionClient()
    {
        return $this->getLocator()->payolution()->client();
    }

}
