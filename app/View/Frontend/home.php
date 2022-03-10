<?php

use Cacofony\Helper\AuthHelper;
use App\Entity\Post;

?>

<?php if (AuthHelper::isLoggedIn()) : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?= AuthHelper::getLoggedUser()->user; ?>, vous êtes connecté ! <a href="/logout">Logout</a>
    </div>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        Vous n'êtes pas connecté ! <a href="/login">Login</a>
    </div>
<?php endif; ?>

<h1>Je suis la page d'accueil</h1>

<p><?= $strongText; ?></p>
<p>Des paramètres autowire dans le service : <?= $appSecret; ?></p>

<div class="mt-6 p-2">
    <ul class="columns" style='flex-wrap: wrap;'>
        <?php /** @var $posts Post[] */
        foreach ($posts as $post) : ?>
            <div class="card column is-3 p-0 m-1">
                <div class="card-content">
                    <li class="content">
                        <a href="/show/<?= $post->getId(); ?>-test">
                            <?= $post->getTitle(); ?>
                        </a>
                    </li>
                </div>
                <footer class="card-footer p-0">
                    <a href="#" class="card-footer-item">Edit</a>
                    <a href="#" class="card-footer-item">Delete</a>
                </footer>
            </div>
        <?php endforeach; ?>
    </ul>
</div> 
<a class="button" href="/new">create post</a>
<a class="button" href="/user">List user</a>


