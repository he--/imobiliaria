<?php


namespace App\Service;


use App\Entity\Imovel;
use App\Exception\ServiceException;
use App\Repository\ImovelRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ImovelService
{
    /**
     * @var ImovelRepository
     */
    private $repository;
    public function __construct(ImovelRepository $imovelRepository)
    {
        $this->repository = $imovelRepository;
    }

    /**
     * @param $id
     * @return Imovel
     * @throws ServiceException
     */
    public function findById($id)
    {
        $imovel = $this->repository->findById($id);
        if ($imovel == null)
        {
            throw new ServiceException("Imóvel não encontrado!");
        }
        return $imovel;
    }

    /**
     * @return array Imovel
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param Imovel $imovel
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function salvar(Imovel $imovel)
    {
        $this->repository->salvar($imovel);
    }

    /**
     * @param $id
     * @param Imovel $imovel
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ServiceException
     */
    public function editar($id, Imovel $imovel)
    {
        $imovelBD = $this->repository->findById($id);
        if ($imovelBD == null)
        {
            throw new ServiceException("Imóvel não encontrado!");
        }

        if ($imovel->getId() != $imovelBD->getId())
        {
            throw new ServiceException("O imóvel editado não possui o id fornecido");
        }

        $this->repository->editar($imovel);

    }

    /**
     * @param $id
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ServiceException
     */
    public function deletar($id)
    {
        $imovel = $this->repository->findById($id);
        if ($imovel == null)
        {
            throw new ServiceException("Imóvel não encontrado!");
        }

        $this->repository->deletar($imovel);
    }
}