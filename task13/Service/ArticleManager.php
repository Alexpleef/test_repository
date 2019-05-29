<?php

require '/var/www/html/task13/Service/Interface/EntityManagerInterface.php';
require '/var/www/html/task13/Service/dbMethods.php';
class ArticleManager implements EntityManagerInterface
{
    public function getById($id)
    {
        //получаем массив из базы
        getArticleById($id);
        $responce = [];
        $object = new Article($responce['text'], $responce['title']);
        return $object;
    }
    public function save($id, $title, $text)
    {
        if (!empty($this->getById($id))) {
            $this->update($id, $title, $text);
        } else {
            $this->insert($title, $text);
        }
    }

}

