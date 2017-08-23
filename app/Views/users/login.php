<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrect
    </div>
<?php endif; ?>
<form method="POST">
    <?= $form->input('username', 'Nom d\'utilisateur', []); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>