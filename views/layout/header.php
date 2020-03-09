<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Moda KikSport</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
    </head>
    <body>
        <div id="container">
            <!-- cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
                    <a href="index.php">
                        Moda KikSport
                    </a>
                </div>
            </header>
            
            <!-- menu -->
            <?php $categorias = Utils::showCategorias();?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <?php while ($cat = $categorias->fetch_object()):?>
                     <!--el fetch es para obtener un objeto en lugar de un array-->
                        <li>
                            <a href="#"><?=$cat->nombre?></a>
                        </li>
                    <?php endwhile; ?>                                                            
                </ul>
            </nav>
            <div id="content">

