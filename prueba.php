<?php

$mysqli = new mysqli("b7c0911lhveepakxn4uy-mysql.services.clever-cloud.com","uuhknxeuimaxxokd","dZzXon2qU30c0EaF8H07","b7c0911lhveepakxn4uy");

$salida= "";
$query = "SELECT * FROM recetas";

if(isset($_POST['busqueda'])){
    $q = $mysqli->real_escape_string($_POST['busqueda']);
    $query = "SELECT * FROM recetas WHERE ingredientes LIKE '%{$q}%'";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){
    $salida.="<table class='tabla_datos'>
                   <thead>
                      <tr style='transition: 0.3s;
                      border-bottom: 1px solid rgb(236, 236, 236);'>
                        <td style='border-bottom: 1px solid rgb(119, 103, 99)'>id</td>
                        <td style='border-bottom: 1px solid rgb(119, 103, 99)'>Nombre</td>
                        <td style='border-bottom: 1px solid rgb(119, 103, 99)'>Receta</td>
                        <td style='border-bottom: 1px solid rgb(119, 103, 99)'>ingredientes</td>
                      </tr>
                   </thead>
                   <tbody>"; 
    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr>
                   <td style='border-bottom: 1px solid rgb(119, 103, 99)'>".$fila['id']."</td>
                   <td style='border-bottom: 1px solid rgb(119, 103, 99)'>".$fila['Nombre']."</td>
                    <td style='border-bottom: 1px solid rgb(119, 103, 99)'>".$fila['Receta']."</td>
                    <td style='border-bottom: 1px solid rgb(119, 103, 99)'>".$fila['ingredientes']."</td>
        </tr>";
    }
    $salida.="</tbody></table>";
}
else{
  $salida.="<div class='alert' style=' width: 100%;;
  padding: 1rem 1rem;
  background-color: rgb(255, 65, 65);
  color: white;
  border: 1px solid gray;'>No hay datos disponibles</div>";
}

echo $salida;
$mysqli->close();

?>