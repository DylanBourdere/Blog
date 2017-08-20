<?php
$app = App::getInstance();
$id = array_shift($id);
$post = $app->getTable('Post')->find($id);


if($post === false){
    $app->notFound();
}
?> 

<h1><?= $post->titre; ?></h1>
<p><em><?= $post->categorie; ?></em></p>
<p><?= $post->contenu; ?></p>
