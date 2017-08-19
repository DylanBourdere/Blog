<?php
$app = App::getInstance();

$post = $app->getTable('Post')->find($_GET['id']);


if($post === false){
    $app->notFound();
}
?> 

<h1><?= $post->titre; ?></h1>
<p><em><?= $post->categorie; ?></em></p>
<p><?= $post->contenu; ?></p>
