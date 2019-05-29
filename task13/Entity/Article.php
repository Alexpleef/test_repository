<?php

require '/var/www/html/task13/Entity/BaseEntity.php';
class Article extends BaseEntity
{
    private $text;
    private $title;

    public function __construct($text, $title)
    {
        $this->text = $text;
        $this->title = $title;
    }
}