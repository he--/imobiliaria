<?php

namespace App\Service;

use App\Repository\ImovelRepository;
use App\Entity\Imovel;


class ImovelService
{

    private $imovelRepository;

    public function __construct(ImovelRepository $imovelRepository)
    {
        $this->imovelRepository = $imovelRepository;
    }

    public function salvar(Imovel $imovel)
    {
        $this->imovelRepository->salvar($imovel);
    }

    public function remover(Imovel $imovel)
    {
        $this->imovelRepository->remover($imovel);
    }

    public function editar(Imovel $imovel)
    {
        $this->imovelRepository->editar($imovel);
    }

    public function listarTodos()
    {
        $imoveis = $this->imovelRepository->listarTodos();
        return $imoveis;
    }

    public function findById($id)
    {
        $imovel = $this->imovelRepository->findById($id);
        return $imovel;
    }
}