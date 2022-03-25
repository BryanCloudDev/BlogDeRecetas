<?php

require_once "../Controlador/crl.config.php";

//Copiamos y pegamos el codigo que habia sudido el profe XD
//Bienvenidos al mundo de la Programacion, en donde no hay codigo tuyo o mio, sino NUESTRO XD

class ModeloRegistroUsuarios{

	/*=============================================
	Registro
	=============================================*/

	static public function Registro($tabla, $datos){

		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores
		# de parámetros con nombre (:name) o signos de interrogación 
		#(?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. 
		#Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conn()->prepare("INSERT INTO $tabla(nombre, correo, password, imagenUsuario) VALUES (:nombre, :correo, :password, :imagenUsuario)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		//$stmt->bindParam(":imagenUsuario", $datos["imagenUsuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "FURULAAAAAA YUPIII";

		}else{

			print_r(Conexion::conn()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function SeleccionarRegistros($tabla, $item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conn()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conn()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Actualizar Registro
	=============================================*/

	static public function ActualizarRegistro($tabla, $datos){
	
		$stmt = Conexion::conn()->prepare("UPDATE $tabla SET nombre=:nombre, correo=:correo, password=:password WHERE idUsuario = :idUsuario");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "No la cagamos xdd";

		}else{

			print_r(Conexion::conn()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function EliminarRegistro($tabla, $valor){
	
		$stmt = Conexion::conn()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

		$stmt->bindParam(":idUsuario", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "Again, volvio a furular! XD";

		}else{

			print_r(Conexion::conn()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}

}