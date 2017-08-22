<?php
$categoryTable = App::getInstance()->getTable('Category');
if(!empty($_POST)){
    $result = $categoryTable->update($_GET['id'], [
        'titre' => $_POST['titre']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">Enregistrement effectué</div>
        <?php
    }
}
$post = $categoryTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="POST">
    <?= $form->input('titre', 'titre de la categorie'); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>