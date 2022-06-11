<?php
include('../config/config.php'); /* LLAMAMOS CONFIG DE URLS */
include('../config/database.php'); /* CONEXION A LA BD */


class recetas{
    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres= $params['nombres']; /* En el campo nombres guardeme lo que llego del formulario con el name nombres */
        $correo= $params['correo'];
        $celular = $params['celular'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];

        $insert= "INSERT INTO pacientes VALUES (NULL, '$nombres', '$correo', '$celular', '$fecha', '$imagen')"; /* INSERTAR EN LA TABLA LOS SIGUIENTES VALORES */

        return mysqli_query($this->conexion, $insert); /* ENVIAR A LA BD TODO LO QUE ESTE DENTRO DE INSERT */

    }

    function getAll(){
        $basededatos= "SELECT * FROM pacientes"; /* Traigame todos los usuarios */
        return mysqli_query($this->conexion, $basededatos);
    }

    function getOne($id){
        $sql = "SELECT * FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
        $nombres= $params['nombres']; /* En el campo nombres guardeme lo que llego del formulario con el name nombres */
        $correo= $params['correo'];
        $celular = $params['celular'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];
        $id = $params['id'];
  
        $update = " UPDATE pacientes SET nombres='$nombres', correo='$correo', celular='$celular', fecha='$fecha', imagen='$imagen' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM pacientes WHERE id = $id"; /* Elimine de la tabla x, el id que me */
        return mysqli_query($this->conexion, $eliminar);
    }

}



?>