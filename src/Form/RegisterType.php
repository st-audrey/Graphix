<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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

            ->add('password', PasswordType::class, [
                'label'=>'Votre mot de passe',
                'attr'=>[
                    'placeholder'=>"cybermalveillance.gouv.fr/tous-nos-contenus/actualites/comment-choisir-un-bon-mot-de-passe"
                ]])

            ->add('password_confirm', PasswordType::class, [
                'label'=>'Confirmer votre mot de passe',
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>"Merci de confirmer votre mot de passe"
                ]])

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
