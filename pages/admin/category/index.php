<?php
$categories = App::getInstance()->getTable('Category')->all();
?>

<h1>Administrer les Categorie</h1>

<p>
    <a href="?p=category.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->titre; ?></td>
            <td>
            <a href="?p=category.edit&id=<?= $category->id; ?>" class="btn btn-primary">Editer</a>
            <form action="?p=category.delete" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?= $category->id; ?>">
                <button type="submit" class="btn btn-danger" href="?p=posts.delete?id=<?= $category->id; ?>">Supprimer</button>
            </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>