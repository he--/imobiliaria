<?php

namespace App\Forms;

use App\Entity\ContratoAdm;
use App\Entity\Imovel;
use App\Entity\Usuario;
use App\Services\ImovelService;
use App\Services\UsuarioService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratoAdmType extends AbstractType
{
    private $usuarioService;
    private $imovelService;

    public function __construct(UsuarioService $usuarioService, ImovelService $imovelService)
    {
        $this->usuarioService = $usuarioService;
        $this->imovelService = $imovelService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dtCadastro', DateType::class, [
                'label' => 'Data de Cadastro',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('clausulaContratual')
            ->add('usuario', ChoiceType::class, [
                'choices' => $this->usuarioService->listar(),
                'choice_value' => function(Usuario $usuario = null) {
                    return $usuario ? $usuario->getId() : '';
                },
                'choice_label' => function(Usuario $usuario) {
                    return $usuario->getNome();
                },
            ])
            ->add('imovel', ChoiceType::class, [
                'choices' => $this->imovelService->listar(),
                'choice_value' => function(Imovel $imovel = null) {
                    return $imovel ? $imovel->getId() : '';
                },
                'choice_label' => function(Imovel $imovel) {
                    return $imovel->getCaracteristicas() . ' - ' . $imovel->getTipoImovel();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContratoAdm::class,
        ]);
    }
}
