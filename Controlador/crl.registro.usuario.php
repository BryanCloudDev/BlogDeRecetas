<?php

require_once "Controlador/crl.config.php";
require_once "Modelos/funciones.registro.php";
require_once "Modelos/funciones.receta.php";
require_once "Modelos/funciones.user.php";

class RegistroUsuario{
        
        #Fuction para Registro de Usuarios
          
          static public function ctrRegistro(){
              if(isset($_POST["registroUsuario"])){
                    $tabla = "usuarios";

                    $datos= array("nombre" =>$_POST["registroNombre"],
                                 "correo" =>$_POST["registroCorreo"],
                                 "password" =>$_POST["registroPassword"]
                                );
                $respuesta =  ModeloRegistroUsuarios::Registro($tabla , $datos);
                
                return $respuesta;

              }
          }

        #Fuction para Seleccionar regisros de la base de datos

        static public function ctrSeleccionarRegistros($item , $valor){
            $tabla="registros";

            $respuesta = ModeloRegistroUsuarios::SeleccionarRegistros($tabla, $item, $valor);

            return $respuesta;
        }

         #Fuction para Actualizar regisros de la base de datos
         static public function ctrActualizarRegistros($tabla,$datos){
            $tabla="registros";

            if(isset($_POST["actualizarNombre"])){
                if($_POST["actualizarPassword"] !=""){
                    $password =$_POST["actualizarPassword"];
                }else{
                    $password = $_POST["passwordActual"]; 
                }

                $datos= array("ID" =>$_POST["idUsuario"],
                 "nombre" =>$_POST["actualizarNombre"],
                "email" =>$_POST["actualizarEmail"],
                "password" =>$password
               );
                $respuesta = ModeloRegistroUsuarios::ActualizarRegistro($tabla,$datos);
                return $respuesta;  
            }
         }
         #Fuction para Eliminar regisros de la base de datos

         static public function ctrEliminarRegistros(){
            if(isset($_POST["eliminarRegistro"] )){
                $tabla ="registros";
                $valor =$_POST ["eliminarRegistro"];
                $respuesta = ModeloRegistroUsuarios::EliminarRegistro($tabla,$valor);

                if($respuesta == "ok"){
                    echo '
                        <script>
                            if(window.history.replaceState){
                               window.history.replaceState(null,null , window.href);     
                            }
                            window.location="index.php?pagina=inicio";
                        </script>
                    ';
                }
            }
         }
         
    }


    if(isset($_POST["nombre"]) && isset($_POST["username"]) && isset($_POST["correo"]) && isset($_POST["password"]) && isset($_FILES["user_image"])){

        ["nombre" => $name,
        "username" => $username,
        "correo" => $correo,
        "password" => $password]  = $_POST;

        ["user_image" => $userImage] = $_FILES;

        if(!is_dir("Controlador/User_Images")){
            mkdir("Controlador/User_Images");
        }

        if($userImage && $userImage["tmp_name"]){
            $UserImagePath = "Controlador/User_Images/" . randomDIR(8) . "/" . $userImage["name"];
            mkdir(dirname($UserImagePath));
            move_uploaded_file($userImage["tmp_name"],$UserImagePath);
        }

        $User = new Usuarios($name,$username,$password,$correo,$UserImagePath);
        $User->makeUser();

    }

?>
