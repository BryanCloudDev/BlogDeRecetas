<?php
require "Modelos/funciones.registro.php";

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

?>
