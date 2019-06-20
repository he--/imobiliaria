<?php

namespace App\Services;

use App\Entity\Imovel;
use App\Repository\ImovelRepository;
use phpDocumentor\Reflection\Types\Integer;

class ImovelService
{

    /**
     * @var ImovelRepository
     */
    private $imovelRepository;

    public function __construct( ImovelRepository $imovelRepositoryController)
    {
        $this->imovelRepository = $imovelRepositoryController;
    }

    public function salvar(Imovel $imovel)
    {
        $this->imovelRepository->salvar($imovel);
    }

    public function deletar(int $id)
    {
        $this->imovelRepository->deletar($id);
    }

    public function listar()
    {
        return $this->imovelRepository->listar();
    }

    public function editar(Imovel $imovel)
    {
        return $this->imovelRepository->editar($imovel);
    }

    public function buscarPorId(int $id)
    {
        return $this->imovelRepository->find($id);
    }
}
