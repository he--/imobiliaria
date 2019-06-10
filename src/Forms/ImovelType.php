<?php


namespace App\Forms;

use App\Entity\Imovel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ImovelType
 * @package App\Forms
 */
class ImovelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    'Disponivel' => 'disponivel',
                    'Alugado' => 'alugado',
                    'Em Manutenção' => 'Em Manutenção',
                    'Vistoria' => 'Vistoria',
                    'Sem Cotrato Adm' => 'Sem Cotrato Adm',
                    'Sem Contrato de Locação' => 'Sem Contrato de Locação'
                ]

            ])
            ->add('caracteristicas', TextareaType::class, [
                'label' => 'Caracterisiticas do Imovel',
            ])
            ->add('observacao', TextareaType::class, [
                'label' => 'Observações Geral',
            ])
            ->add('tipoImovel', ChoiceType::class, [
                'empty_data' => 'Casa',
                'choices' => [
                    'Casa' => 'Casa',
                    'Apartamento' => 'Apartamento',
                    'Galpão' => 'Calpão',
                    'Terreno' => 'Terreno',
                    'Prédio Comercial' => 'Prédio Comercial',
                    'Loja em Shopping' => 'Loja em Shopping'
                ]
            ])
            ->add('dtCadastro', DateType::class, [
                'label' => 'Data de Cadastro',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('endereco', EnderecoType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Imovel::class,
        ]);
    }
}
