<?php
namespace Entity;

class Article extends BaseEntity
{
    private $title;
    private $text;
    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getText(): string
    {
        return $this->text;
    }
}
