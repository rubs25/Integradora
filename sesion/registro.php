<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/bootstrap.min (3).css">
</head>

<body>
    <div id="registration-form" class="container-fluid bg-light">
        <div class="container">
            <form action="registro_usuario.php" method="POST" class="formulario_registro">
                <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <h1 class="text-center">Registro</h1>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="gmail" class="form-label">Gmail</label>
                        <input type="text" class="form-control" id="gmail" name="gmail" required>
                    </div> -->
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <div class="mb-3">
                        <label for="confcontrasena" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confcontrasena" name="confcontrasena" required>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" name="registro_usuario" class="btn btn-primary">Registrarse</button>
                    </div>  
                    <div class="text-center mt-3">
                        <p>¿Ya tienes una cuenta? <a href="../sesion/inicio.php">Inicia sesión aquí</a></p>
                    </div>
                </div>
                <div class="col-4"></div>
                </div>
               
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <div class="footer">
        <div class="text-center mt-3"
        <p>&copy; Motors Toy-PAGINA DE JUGUETES.</p>
      </div>
    </div>
</body>
</html>
