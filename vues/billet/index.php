<ul>
<?php
foreach($billets as $billet) :
?>
    <li>

        <a href="<?php echo $billet['titre']; ?>"><?php echo $billet['titre']; ?></a>
		(<?php echo $billet['total']; ?> billets vus<?php echo ($billet['total'] > 1 ? 's' : ''); ?>) — <a href="?action=edit&id=<?php echo $billet['id']; ?>">Modifier</a> — 
		<a href="?action=billets&id=<?php echo $billet['id']; ?>"><img src="vues/billet/stats.png" alt="Statistiques" /></a><br />
		<?php echo $billet['contenu']; ?> — <em>ajoutée le <?php echo $billet['date']; ?></em>
        <p><b><?php echo $billet['contenu']; ?></b></p>
	<!-- Suppression billet --> 
        <form method="post">
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="id" value="<?php echo $billet['id']; ?>" />
            <input type="submit" value="X" />
        </form>       
    </li>
<?php
endforeach;
?>
</ul>
<p>
    <?php if ($page_courante > 1) : ?>
        <a href="?p=<?php echo ($page_courante - 1); ?>"><< Préc.</a>
    <?php endif; ?>
<?php
for ($i = 1 ; $i <= $total_pages ; $i++) :
    if ($i == $page_courante)
        echo ' ' . $i;
    else
        echo ' <a href="?p=' . $i . '">' . $i . '</a> ';
endfor;
?>
    <?php if ($page_courante < $total_pages) : ?>
        <a href="?p=<?php echo ($page_courante + 1); ?>">Suiv. >></a>
    <?php endif; ?>
</p>