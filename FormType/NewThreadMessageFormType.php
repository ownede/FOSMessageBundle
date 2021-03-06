<?php

namespace FOS\MessageBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Message form type for starting a new conversation
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class NewThreadMessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('recipient', 'fos_user_username', array('label' => 'recipient', 'translation_domain' => 'FOSMessageBundle'))
            ->add('subject', TextType::class, array('label' => 'subject', 'translation_domain' => 'FOSMessageBundle'))
            ->add('body', TextareaType::class, array('label' => 'body', 'translation_domain' => 'FOSMessageBundle'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'message',
        ));
    }

    public function getBlockPrefix()
    {
        return 'fos_message_new_thread';
    }
}
