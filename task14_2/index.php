<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//require_once 'config/configDB.php';
require_once 'vendor/autoload.php';

use Entity\Article;
use Service\ArticleManager;
use Entity\User;
use Service\UserManager;

/*try {
    $db = new DbManager($config['host'], $config['user'], $config['password'], $config['db']);
} catch (Exception $exception) {
    echo '<h1> We have problems:</h1>';
    echo $exception->getMessage();
    die();
}*/

$user_manager = new UserManager();
$user_test = $user_manager->getById(1);
print_r($user_test);
die();

$user = new User('test name', 'test surname');
$user->setId(2);
$user_manager->save($user);
echo '<br>', '<hr>';
$article_manager = new ArticleManager();
$article_test = $article_manager->getById(4);
print_r($article_test);
$article = new Article('test title', 'test text', $user_test);
$article->setId(75);
$article_manager->save($article);