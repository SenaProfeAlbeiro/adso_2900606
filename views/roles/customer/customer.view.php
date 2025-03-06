<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <h1>Soy el Cliente</h1>
    <a href="?c=Logout">Cerrar Sesión</a>
    <br>
    <p>CodRol: <?php echo $profile->getRolCode(); ?></p>
    <p>Rol: <?php echo $session ?></p>
    <p>Nombre: <?php echo $profile->getUserName(); ?></p>
    <p>Apellido: <?php echo $profile->getUserLastName(); ?></p>
    <p>Identificación: <?php echo $profile->getUserId(); ?></p>
    <p>Estado: <?php echo $profile->getUserState(); ?></p>
</body>
</html>