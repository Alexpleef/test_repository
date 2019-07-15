<?php
namespace InterfaceNamespace;
use Entity\BaseEntity;

/**
 * Interface EntityManager
 * @package InterfaceNameSpace
 */
interface EntityManagerInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): ?object;
    /**
     * @param BaseEntity $object
     * @return mixed
     */
    public function save(BaseEntity $object): void;
}