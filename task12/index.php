<?php

if(!empty($_POST))
{
    include('../configDB.php');
    include('Article.php');
    $article = new Article();
    $article->title = $_POST['title'];
    $article->text = $_POST['text'];
    $article->setIsPublished();
    $article->save($config);
}
