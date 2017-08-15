<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductReview;

use Pyz\Yves\ProductReview\Form\DataProvider\SubmitFormDataProvider;
use Pyz\Yves\ProductReview\Form\SubmitForm;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;

class ProductReviewFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Client\Customer\CustomerClientInterface
     */
    public function getCustomerClient()
    {
        return $this->getProvidedDependency(ProductReviewDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @return \Spryker\Client\Product\ProductClientInterface
     */
    public function getProductClient()
    {
        return $this->getProvidedDependency(ProductReviewDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     * @return \Spryker\Client\ProductReview\ProductReviewClientInterface
     */
    public function getProductReviewClient()
    {
        return $this->getProvidedDependency(ProductReviewDependencyProvider::CLIENT_PRODUCT_REVIEW);
    }

    /**
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getFormFactory()
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    /**
     * @param mixed $data
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createSubmitForm($data = null, array $options = [])
    {
        return $this->getFormFactory()->create(new SubmitForm(), $data, $options);
    }

    /**
     * @return \Pyz\Yves\ProductReview\Form\DataProvider\SubmitFormDataProvider
     */
    public function createSubmitFormDataProvider()
    {
        return new SubmitFormDataProvider();
    }

}
