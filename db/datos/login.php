<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// DB credentials.
include('../conexion/dbconnection.php');
// establecer y realizar consulta. guardamos en variable.

$usuaro = $_GET['usuario'];
$password = $_GET['password'] ;

$sql = "SELECT `id`, `usuaro`, `password`, `estadoid` FROM `login` WHERE `usuaro`='$usuaro' AND `password`= $password";

$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$array = array();
$x=0;
foreach($results as $row){
    $array[$x] = $row;
    $x++;
}
$retornar["datos"]= $array;
echo json_encode($retornar);
  header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
?>