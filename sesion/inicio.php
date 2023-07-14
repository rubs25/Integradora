<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../css/bootstrap.min (3).css"> 
</head>
<body>
    <div class="container-fluid bg-light" id="Login-form" >
        <div class="container text-center">
            <form action="inicio_usuario.php"method="POST" >
                <div class="col-12 col-md-4">
                    <h2 class="text-center">Iniciar sesión</h2>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name = "inicio_usuario.php" class="btn btn-primary">Ingresar</button>
                    </div>  
                    <div class="text-center mt-3">
                        <p>¿No tienes una cuenta? <a href="../sesion/registro.php" target="_blank">Regístrate aquí</a></p>
                        <p>Eres administrador <a href="../admin/administrador.php" target="_blank">Entra aqui</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="text-center mt-3"
        <p>&copy; Motors Toy-PAGINA DE JUGUETES.</p>
      </div>
    </div>
</body>
</html>
