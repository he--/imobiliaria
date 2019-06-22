<?php

namespace App\Service;

use App\Repository\ImovelRepository;
use App\Entity\Imovel;

class ImovelService
{
    /**
     * @var ImovelRepository
     */
    private $imovelRepository;

    public function __construct(ImovelRepository $imovelRepository)
    {
        $this->imovelRepository = $imovelRepository;
    }

    public function salvar(Imovel $imovel)
    {
        $this->imovelRepository->salvar($imovel);
    }

    public function editar(Imovel $imovel)
    {
        $this->imovelRepository->editar($imovel);
    }

    public function deletar(Imovel $imovel)
    {
        $this->imovelRepository->deletar($imovel);
    }
}