<h2>Autheur : <?php echo $user->getAuthorId();?></h2>
<h2>Date du Post : <?php echo date("Y-m-d");?></h2>

<form action='#' method='post'>
    Titre du Post <input type="text" name="title"><br>
    Contenu du post <input type="textarea" name="content"><br>
    Date du Post<input type="date" name='createdAt' value="<?php echo date("Y-m-d");?>"><br>
    Autheur du Post <input type="authorId" value='<?php echo $user->getAuthorId();?>'> 
</form>