<?php
$categoryTable = App::getInstance()->getTable('Category');
if(!empty($_POST)){
    $result = $categoryTable->create([
        'titre' => $_POST['titre']
    ]);
    if($result){
        header('Location: admin.php?p=category&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('titre', 'titre de la categorie'); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>