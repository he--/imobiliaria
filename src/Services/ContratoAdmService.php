<?php


namespace App\Services;


use App\Entity\ContratoAdm;
use App\Repository\ContratoAdmRepository;

class ContratoAdmService
{
    /**
     * @var ContratoAdmRepository
     */
    private $contratoAdmRepository;

    public function __construct( ContratoAdmRepository $contratoAdmRepositoryController)
    {
        $this->contratoAdmRepository = $contratoAdmRepositoryController;
    }

    public function salvar(ContratoAdm $contratoAdm)
    {
        $this->contratoAdmRepository->salvar($contratoAdm);
    }

    public function deletar(int $id)
    {
        $this->contratoAdmRepository->deletar($id);
    }

    public function listar()
    {
        return $this->contratoAdmRepository->listar();
    }

    public function editar(ContratoAdm $contratoAdm)
    {
        return $this->contratoAdmRepository->editar($contratoAdm);
    }

    public function buscarPorId(int $id)
    {
        return $this->contratoAdmRepository->find($id);
    }

}