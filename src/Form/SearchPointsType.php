<?php

declare(strict_types=1);

namespace App\Form;

use App\Form\DataTransformer\CityNameTransformer;
use App\Form\Model\SearchPointsFormModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchPointsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('street', TextType::class, [
                'required' => false,
                'label' => 'Ulica',
            ])
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Miasto',
            ])
            ->add('postCode', TextType::class, [
                'required' => false,
                'label' => 'Kod pocztowy',
            ]);

        $builder
            ->get('city')
            ->addModelTransformer(new CityNameTransformer());

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            if (!empty($data['postCode']) && preg_match('/^\d{2}-\d{3}$/', $data['postCode'])) {
                $form->add('name', TextType::class, [
                    'required' => false,
                    'label' => 'Nazwa',
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchPointsFormModel::class,
        ]);
    }
}
