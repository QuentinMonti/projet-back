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


<h1>Je suis la page user</h1>

<ul class="columns mt-4">
    <?php /** @var $users Post[] */
    foreach ($users as $user) : ?>
        <ul class="column card p-0 m-2">
            <div class="card-content">
                <li class="content">Id: <?php echo($user->getId()); ?></li>
                <li class="content">Date: <?php echo($user->getCreatedAt())->format("d-m-Y"); ?></li>
                <li class="content">Username: <?php echo($user->getUsername()); ?></li>
                <li class="content">Role: <?php echo($user->getRole()); ?></li>
            </div>
            <footer class="card-footer p-0">
                <a href="#" class="card-footer-item">Edit</a>
                <a href="#" class="card-footer-item">Delete</a>
            </footer>
        </ul>
        </br>
    <?php endforeach; ?>
</ul>
<a class="button" href="/">go back Home</a>