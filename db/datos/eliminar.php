<?php

include('../conexion/dbconnection.php');
$data = json_decode(file_get_contents('php://input'), true);
$nombre = $data['nombre'];
$descripcion = $data['descripcion'] ;
$latitud = $data['latitud'] ;
$longitud = $data['longitud'] ;
$imagen = $data['imagen'] ;
$id = $data['id'] ;


$sql="DELETE FROM logar WHERE id = $id";
$query=$dbh->prepare($sql);

$query->bindParam(':nombre',$nombre);  
$query->bindParam(':descripcion',$descripcion);
$query->bindParam(':latitud',$latitud);
$query->bindParam(':longitud',$longitud);
$query->bindParam(':imagen',$imagen);

 $query->execute();
 $data['imagen']="";
 $retornar["respuesta"]= "datos insertados";
 $retornar["recibe"]= $data;
 $retornar["sql"]= $sql;
 $retornar["cnn"]= $dbh;
 echo json_encode($retornar);

 ?>