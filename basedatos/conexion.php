<?php
   $conexion = mysqli_connect("localhost","root","Rubas2509","integradora4");
   
   if ($conexion) {
    echo "";
   } else {
    echo "No se ha podido conectar con la BD";
   }

?>


