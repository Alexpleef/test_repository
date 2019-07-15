<?php
namespace Entity;
/**
 * Class BaseEntity
 * @package Entity
 */
class BaseEntity
{
    /**
     * @var
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}