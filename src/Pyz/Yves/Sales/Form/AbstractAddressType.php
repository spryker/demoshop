<?php
namespace Pyz\Yves\Sales\Form;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

abstract class AbstractAddressType extends AbstractType
{

    /**
     * @var LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => get_class(new \Generated\Shared\Transfer\SalesAddressTransfer())]);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salutation', 'choice', [
                'choices' => ['Mr' => 'checkout.salutation.mr', 'Mrs' => 'checkout.salutation.mrs']
            ])
            ->add('idCustomerAddress', 'hidden')
            ->add('firstName', 'text', ['constraints' => [new NotBlank()]])
            ->add('middleName', 'text', ['required' => false])
            ->add('lastName', 'text', ['constraints' => [new NotBlank()]])
            ->add('address1', 'text', ['constraints' => [new NotBlank()]])
            ->add('address2', 'text', ['constraints' => [new NotBlank()]])
            ->add('address3', 'text', ['required' => false])
            ->add('city', 'text', ['constraints' => [new NotBlank()]])
            ->add('zipCode', 'text', ['constraints' => [new NotBlank()]])
            ->add('iso2Country', 'country', [
                'translation_domain' => 'none'
            ])
        ;
    }
}
