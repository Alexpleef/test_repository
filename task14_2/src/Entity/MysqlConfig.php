<?php


namespace Entity;

use InterfaceNamespace\DatabaseConfig;

/**
 * Class MysqlConfig
 * @package Entity
 */
class MysqlConfig extends DatabaseConfig
{
    /**
     * MysqlConfig constructor.
     */
    public function __construct()
    {
        $this->db_hostname = 'localhost';
        $this->db_username = 'root';
        $this->db_password = 'Ruffyxzo132435';
        $this->db_name = 'testdb';
    }
}