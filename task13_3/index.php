<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require 'vendor/autoload.php';
require 'config/configDB.php';
use Entity\Article;
use Service\DbManager;
use Service\ArticleManager;
$article_manager = new ArticleManager();
$article_manager->setDb(new DbManager($config['host'], $config['user'], $config['password'], $config['db']));
$article_test = $article_manager->getById(1);
print_r($article_test);
$article = new Article('test title', 'test text');
$article->setId(74);
$article_manager->save($article);
