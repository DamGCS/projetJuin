<ul>
<?php
    foreach($commentaires as $commentaire) {
?>
<li>
    <?= $commentaire->titre ?>
    <form method="POST">
        <button name="supp" value="<?= $commentaire->id ?>">Supprime</button>
    </form>
    
    
</li>
<?php
    }
?>
</ul>