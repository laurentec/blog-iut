<h2>Les billets édités</h2>
<h3>URL : <a href="<?php echo $tag_billet['originale']; ?>"><?php echo $tag_billet['originale']; ?></a></h3>
<h3>Clics : <?php echo $tag_billet['total']; ?></h3>
<h3>Liste des sites référents</h3>
<?php foreach($libelles as $libelle) : ?>
    <ul>
        <li><?php echo $libelles['libelle'] ?></li>