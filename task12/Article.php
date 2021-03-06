<?php


class Article
{
    public $text;
    public $title;
    private $isPublished = false;

    public function setIsPublished()
    {
        $this->isPublished = true;
    }

    public function save($config)
    {
        $sql = mysqli_connect($config['host'], $config['user'], $config['password'])
        or die('Can not connect: ' . mysqli_error($sql));
        mysqli_select_db($sql, $config['db']) or die('Wrong db');

        $title = mysqli_real_escape_string($sql, $this->title);
        $text = mysqli_real_escape_string($sql, $this->text);

        $query = "INSERT INTO articles SET title = '" . $title . "', text = '" . $text . "'";
        mysqli_query($sql, $query) or die('Query failed: ' . mysqli_error($sql));
    }
}