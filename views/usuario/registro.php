<h1>Registrarse</h1>
<!--mostramos la session-->

<?php if(isset($_SESSION['register']) && $_SESSION['register']):?>
    <strong>Registro completado correctamente</strong>
<?php else: ?>
    <strong>Registro fallido</strong>
<?php endif; ?>

<form action="<?=base_url?>Usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>
    
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>
    
    <label for="email">Email</label>
    <input type="text" name="email" required/>
    
    <label for="password">Contraseña</label>
    <input type="password" name="password" required/>
    
    <input type="submit" value="Registrarse"/>
    
</form>