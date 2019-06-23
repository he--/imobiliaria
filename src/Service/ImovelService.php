<?php


namespace App\Service;


use App\Entity\Imovel;
use App\Repository\ImovelRepository;

class ImovelService
{
    private $imovelrepository;

    public function __construct(ImovelRepository $imovelrepository)
    {
        $this->imovelrepository = $imovelrepository;
    }

    public function salvar(Imovel $imovel)
    {
        $this->imovelrepository->salvar($imovel);
    }

    public function atualizar(Imovel $imovel)
    {
        $this->imovelrepository->atualizar($imovel);
    }

    public function remover(int $id)
    {
        $this->imovelrepository->remover($id);
    }

}