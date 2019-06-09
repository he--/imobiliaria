<?php


namespace App\Service;


use App\Entity\Imovel;
use App\Repository\ImovelRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

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

    /**
     * @param int $id
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deletar(int $id)
    {
        $this->imovelRepository->deletar($id);
    }

}