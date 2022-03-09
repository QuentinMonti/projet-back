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

<ul>
    <?php /** @var $users Post[] */
    foreach ($users as $user) : ?>
        <ul>
            <li><?php echo($user->getId()); ?></li>
            <li><?php echo($user->getCreatedAt())->format("d-m-Y"); ?></li>
            <li><?php echo($user->getUsername()); ?></li>
            <li><?php echo($user->getRole()); ?></li>
        </ul>
        </br>
    <?php endforeach; ?>
</ul>