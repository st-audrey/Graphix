<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>'Votre prénom',
                'attr'=>[
                    'placeholder'=>"Amélie"
                ]])

            ->add('lastname', TextType::class, [
                'label'=>'Votre nom',
                'attr'=>[
                    'placeholder'=>'Dupond'
                ]])

            ->add('email', EmailType::class, [
                'label'=>'Votre adresse email',
                'attr'=>[
                    'placeholder'=>'amelie.dupond@gmail.com'
                ]])

            ->add('password', RepeatedType::class, [
                'type'=> PasswordType::class,
                'invalid_message'=> 'Le mot de passe et sa confirmation doivent être identiques',
//                'label'=>'Confirmer votre mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Mot de passe',
                    'attr'=>[
                        'placeholder'=>"1234..."]],
                'second_options'=>['label'=>'Confirmez votre mot de passe',
                    'attr'=>['placeholder'=>"1234..."]]
                ])

            ->add('submit', SubmitType::class, [
                'label'=>"S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
