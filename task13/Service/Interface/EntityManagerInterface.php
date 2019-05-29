<?php
require '/var/www/html/task13/Service/dbMethods.php';
interface EntityManagerInterface
{
    public function getById($id);
    public function save($id, $title, $text);
}
