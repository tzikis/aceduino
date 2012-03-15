<?php

namespace Ace\ExperimentalUserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
		$builder
			->add('firstname', 'text', array('label' => 'experimental_user_registration_form_firstname'))
			->add('lastname', 'text', array('label' => 'experimental_user_registration_form_lastname'))
			->add('twitter', 'text', array('label' => 'experimental_user_registration_form_twitter'));
    }

    public function getName()
    {
        return 'ace_experimental_user_registration';
    }
}

