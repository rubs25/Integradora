<?php
   $conexion = mysqli_connect("localhost","root","Rubas2509","prointegradora");
   
   if ($conexion) {
    echo "Conectado exitosamente la BD";
   } else {
    echo "No se ha podido conectar con la BD";
   }

?>
<!-- 
<?php

/* $mysqli = new mysqli("localhost","root","Rubas2509","prointegradora");
 */
?> -->

