<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'vendor/autoload.php';

use Entity\Article;
use Service\ArticleManager;
use Entity\User;
use Service\UserManager;

$user_manager = new UserManager();
$user_test = $user_manager->getById(1);
print_r($user_test);


$user = new User('test name', 'test surname');
$user->setId(3);
$user_manager->save($user);

echo '<br>', '<hr>';
$article_manager = new ArticleManager();
$article_test = $article_manager->getById(5);
print_r($article_test);

$article = new Article('test title', 'test text', $user_test);
$article->setId(6);
$article_manager->save($article);