<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">Enregistrement effectué</div>
        <?php
    }
}
$post = $postTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="POST">
    <?= $form->input('titre', 'titre de l\'article'); ?>
    <?= $form->input('contenu', 'contenu de l\'article', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>