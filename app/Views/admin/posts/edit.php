<form method="POST">
    <?= $form->input('titre', 'titre de l\'article'); ?>
    <?= $form->input('contenu', 'contenu de l\'article', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>