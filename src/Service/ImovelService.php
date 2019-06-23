<?php

namespace App\Service;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Imovel;
use App\Repository\ImovelRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;



class ImovelService
{

    private $imovelRepository;

    public function __construct(ImovelRepository $imovelRepository){
        $this->imovelRepository = $imovelRepository;
    }

    public function salvar(Imovel $imovel){
        $this->imovelRepository->salvar($imovel);
    }

    public function editar(Imovel $imovel){
        $this->imovelRepository->editar($imovel);
    }
    
    public function deletar(int $id){
        $this->imovelRepository->deletar($id);
    }
    public function getById(int $id){
        return $this->imovelRepository->getById($id);
    }
    

}