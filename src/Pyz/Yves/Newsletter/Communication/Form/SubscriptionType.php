<?php

namespace Pyz\Yves\Newsletter\Communication\Form;

use ProjectA\Shared\Kernel\TransferLocator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class SubscriptionType
 * @package ProjectA\Yves\Newsletter\Communication\Form
 */
class SubscriptionType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => get_class((new TransferLocator())->locateNewsletterSubscription()),
                'cascade_validation' => true,
                'csrf_message' => 'form.csrf.failed',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email', ['constraints' => [new NotBlank(), new Email()]]);
    }
}
