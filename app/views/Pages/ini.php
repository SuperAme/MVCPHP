<?php require RUTA_APP . '/views/inc/header.php'; ?>
<h1>This is my index</h1>
<p><?php
    echo $datos['titulo'];
?></p>
<ul>
    <?php foreach($datos['articulos'] as $articulos): ?>
        <li><?php echo $articulos->titulo; ?></li>
    <?php endforeach; ?>
    
</ul>
<?php require RUTA_APP.'/views/inc/footer.php'; ?>
