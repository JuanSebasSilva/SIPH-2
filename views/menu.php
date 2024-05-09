<?php include("controllers/cmenu.php"); ?>
<nav>
    <?php if($dtAll){ foreach($dtAll as $dt){ ?>
        <a href="home.php?pg=<?=$dt['idpag'];?>" title="<?=$dt['nompag'];?>">
            <i class="<?=$dt['icopag'];?>"></i>
        </a>
    <?php }} ?>
    <a href="views/vsal.php" title="Salir">
        <i class="fa-solid fa-right-from-bracket"></i>
    </a>
</nav>