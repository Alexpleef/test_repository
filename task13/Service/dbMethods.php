<?php
include('/var/www/html/configDB.php');

function connection()
{
    global $config;
    $link = mysqli_connect($config['host'], $config['user'], $config['password'])
    or die('Не удалось соединиться: ' . mysqli_error($link));
    mysqli_select_db($link, $config['db']) or die('Не удалось выбрать базу данных');
    return $link;
}
function getArticleById($id)
{
    $link = connection();
    $query = "SELECT * FROM articles WHERE id = $id";
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error($link));
    $response = [];
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $response[] = $line;
        return $response;
    }
}  
function update($id,$title,$text)
{
    $link = connection();
    $query = "UPDATE articles SET title='$title', text='$text' WHERE id=$id";
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error($link));
}
function insert($title, $text)
{
    $link = connection();
    $query = "INSERT INTO articles VALUES (title=$title, text='$text')";
    $result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysqli_error($link));
}
