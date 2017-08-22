<?php
if(!empty($_POST)){
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if($auth->login($_POST['username'], $_POST['password'])){
        header('Location: admin.php');
    }else{
        ?>
        <div class="alert alert-danger">
            Identifiant incorrect
        </div>
        <?php
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="POST">
    <?= $form->input('username', 'Nom d\'utilisateur', []); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>