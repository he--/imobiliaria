<?php


namespace App\Forms;

use App\Entity\Endereco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class EnderecoType
 * @package App\Form
 */
class EnderecoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->setAction('../endereco')
//            ->setMethod('POST')
            ->add('logradouro', TextType::class, [
                'label' => 'Logradouro',
            ])
            ->add('bairro', TextType::class, [
                'label' => 'Bairro',
            ])
            ->add('numero', TextType::class, [
                'label' => 'Numero',
            ])
            ->add('cep', TextType::class, [
                'label' => 'CEP',
                'attr' => [
                    'style' => 'width: 200px'                                
                ]
            ])
            ->add('complemento', TextType::class, [
                'label' => 'Complemento',
            ])
            ->add('cidade', TextType::class, [
                'label' => 'Cidade',
            ])
            ->add('uf', TextType::class, [
                'label' => 'UF',
            ])
            ->add('telefone', TextType::class, [
                'label' => 'telefone',
            ])
            ->add('ddd', TextType::class, [
                'label' => 'DDD',
            ])
            ->add('celular', TextType::class, [
                'label' => 'Celular',
            ])
            ->add('dddCelular', TextType::class, [
                'label' => 'DDD',
            ])            
            ->add('usuario', UsuarioType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Endereco::class,
        ]);
    }
}
