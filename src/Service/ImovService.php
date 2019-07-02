<?php

namespace App\Service;

use App\Entity\Imovel;
use App\Repository\ImovelRepository;

class ImovService
{
    /**
     * @var ImovelRepository
     */
    private $imovelRepository;

    /**
     * ImovService constructor.
     * @param ImovelRepository $imovelRepository
     */
    public function __construct(ImovelRepository $imovelRepository)
    {
        $this->imovelRepository = $imovelRepository;
    }

    /**
     * @param Imovel $imovel
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function salvarImovel(Imovel $imovel)
    {
        $this->imovelRepository->salvarImovel($imovel);
    }

    /**
     * @param int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar(int $id)
    {
        $this->imovelRepository->deletar($id);
    }

    /**
     * @param int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function editar(int $id)
    {
        $this->imovelRepository->editar($id);
    }
}
