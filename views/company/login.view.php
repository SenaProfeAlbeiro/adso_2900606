<form action="" method="POST">
    <div>
        <label for="">Email</label>
        <input type="text" name="user_email" placeholder="correo@dominio.com" />
    </div>
    <div>
        <label for="">Contraseña</label>
        <input type="password" name="user_pass" placeholder="Contraseña" />
    </div>
    <input type="submit" value="Enviar">
    <div><?php echo $message ?></div>
</form>