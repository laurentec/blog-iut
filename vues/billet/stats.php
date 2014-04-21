<h2>Stats</h2>
<h3>URL : <a href="<?php echo $stats['originale']; ?>"><?php echo $stats['originale']; ?></a></h3>
<h3>Clics : <?php echo $stats['total']; ?></h3>
<h3>Liste des sites référents</h3>
<?php foreach($referers as $referer) : ?>
    <ul>
        <li><?php echo $referer['referer'] ?></li>
    </ul>
<?php endforeach; ?>
<h3>Liste des adresses IP</h3>
<?php foreach($ips as $ip) : ?>
    <ul>
        <li><?php echo $ip['adresse_ip'] ?></li>
    </ul>
<?php endforeach; ?>