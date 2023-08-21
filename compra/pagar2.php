<div class="jumbotron text-center">
    <!-- ... Tu formulario y contenido anterior ... -->
    <form action="alta.php" method="POST" class="formulario">
            <label for="cl_nombre">Nombre:</label>
            <input type="text" id="cl_nombre" name="cl_nombre" required>

            <label for="cl_apellidomat">Apellido Paterno:</label>
            <input type="text" id="cl_apellidomat" name="cl_apellidomat" required>

            <label for="cl_apellidopa">Apellido Materno:</label>
            <input type="text" id="cl_apellidopa" name="cl_apellidopa" required>

            <label for="cl_numtelefono">Número de Teléfono:</label>
            <input type="tel" id="cl_numtelefono" name="cl_numtelefono">

            <label for="cl_correo">Correo:</label>
            <input type="email" id="cl_correo" name="cl_correo" required>

            <label for="cl_direccion">Dirección:</label>
            <textarea id="cl_direccion" name="cl_direccion"></textarea>

            <input type="submit" name="alta" class="btn btn-primary" value="Agregar">
        </form>

</div>