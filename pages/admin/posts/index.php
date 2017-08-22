<?php
$posts = App::getInstance()->getTable('Post')->all();
?>

<h1>Administrer les articles</h1>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td>
            <a href="?p=posts.edit&id=<?= $post->id; ?>" class="btn btn-primary">Editer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>