<?php
   $conexion = mysqli_connect("localhost","root","Rubas2509","respjug");
   
   if ($conexion) {
    echo "Conectado exitosamente la BD";
   } else {
    echo "No se ha podido conectar con la BD";
   }

?>


