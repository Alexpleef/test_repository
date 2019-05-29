<?php

$articleManager = new ArticleManager();
$article = $articleManager->getById(1);

$articleManager2 = new Article('test title','test text');
$article2 = $articleManager2->save($article);

print_r($article);




