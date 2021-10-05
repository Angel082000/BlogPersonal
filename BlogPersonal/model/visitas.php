<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Realizar Conexion a BD
// Realizar consulta SQL
include_once 'conectadb.php';
class visitas {

    public $nombre;
    public $edad;
    public $ciudad;

    public function __construct($nombre, $edad, $ciudad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->ciudad = $ciudad;
    }

    public static function consultar() {
        include ('conexion.php');
        $consulta = "select * from visitas";
        echo ('<br>');
        // echo ($consulta);
        $resultado = mysqli_query($mysqli, $consulta);
        if (!$resultado) {
            echo 'No pudo Realizar la consulta a la base de datos';
            exit;
        }
        $listaAlumnos = [];
        while ($visitas = mysqli_fetch_array($resultado)) {
            $listaAlumnos[] = new visitas($visitas['nombre'], $visitas['edad'], $visitas['ciudad']);
        }
        return $listaAlumnos;
    }
    
    public static function login($_user, $_password) {
        
$mysqli = conectadb::dbmysql();

$stmt = $mysqli->prepare('SELECT user, password FROM user WHERE user = ? and password = ?');
$stmt->bind_param('ss', $_user, $_password);
$stmt->execute();
$resultado = $stmt->get_result();
while ($filasql = mysqli_fetch_array($resultado)) {
// Imprimir por Arreglo Asociado
//echo $filasql['user'] . ' ';
//echo $filasql['password'] . ' ';
// initialize session variables
session_start();
// $_SESSION['loggedDataTime'] = datatime();
$_SESSION['loggedUserName'] = $filasql['user'] ;

}
$acceso = false;
if ($stmt->affected_rows == 1) {
$acceso = true;
}
$mysqli->close();
return $acceso;
}


public static function delete($_idalumno) {
$mysqli = conectadb::dbmysql();
$stmt = $mysqli->prepare('DELETE FROM visitas WHERE id = ? ');
$stmt->bind_param('i', $_idalumno);
$stmt->execute();
$resultado = $stmt->get_result();

}

public static function editar($_idalumno) {
$mysqli = conectadb::dbmysql();
$stmt = $mysqli->prepare('UPDATE visitas SET nombre = ?, edad= ?, ciudad=? WHERE id=? ');
$stmt->bind_param('i', $_idalumno);
$stmt->execute();
$resultado = $stmt->get_result();

}
}

?>
