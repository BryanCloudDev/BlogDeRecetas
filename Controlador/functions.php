<?php

//este es un apartado para funciones generales

function clean_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function typeOfPhoto($file){
    $regExp = '/^(jpg|gif|png|jpeg)$/';
    if(preg_match($regExp,$file)){
        return true;
    };
}

function SpanishDate(){
    date_default_timezone_set ('America/El_Salvador');
    $day =  date("N");
    $dayMonth = date("j");
    $month = date("n");
    $year = date("Y");
    $spanishDays = [
        "1" => "Lunes",
        "2" => "Martes",
        "3" => "Miercoles",
        "4" => "Jueves",
        "5" => "Viernes",
        "6" => "Sabado",
        "7" => "Domingo",
    ];
    $spanishMonths = [
        "1" => "Enero",
        "2" => "Febrero",
        "3" => "Marzo",
        "4" => "Abril",
        "5" => "Mayo",
        "6" => "Junio",
        "7" => "Julio",
        "8" => "Agosto",
        "9" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
        "12" => "Diciembre",
    ];
    return "{$spanishDays[$day]} $dayMonth de {$spanishMonths[$month]} del año $year";

}
//esta funcion la podemos reutilizar para poder usarla al subir cualquier imagen
//el primer parametro es el archivo a subir
//el segundo es la ruta a donde se gurdara si la carpeta Media/ ya existe
//el tercero por default viene false, si lo usamos para crear algun usuario y la carpeta no existe ponemos true y se pasara como parametro
//la carpeta madre del pathToSave
function uploadImage($file,$pathToSave,$root = false){

    $fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    //con md5 hacemos una encriptacion para remover espacios en blanco y asi evitar problemas a futuro
    $newFileName = md5($fileName) . '.' . $fileExtension;
    $uploadFileDir = $pathToSave;

    if(!typeOfPhoto($fileExtension)){
        return [
            'Solo puedes subir archivos .jpg, .gif y .png',
            false
        ];
    }
    //la comparativa se hace en bytes
    elseif($fileSize > 2097152){
        return [
            'Tamaño maximo para el archivo es de 2MB',
            false
        ];
    }
    else{
        if($root != ''){
            if(!is_dir($root)){
                mkdir($root);
                mkdir($pathToSave);
            }
        }
        else{
            if(!is_dir($pathToSave)){
                mkdir($pathToSave);
            }
        }
        $dest_path = $uploadFileDir . $newFileName;
        move_uploaded_file($fileTmpPath, $dest_path);
        return [
            $dest_path,
            true
        ];
    }
}

function DeleteImageUser($id){
    $recetaImage = Usuarios::getUserImagePathById($id);
    unlink($recetaImage);
    $recetaImage = explode("/",$recetaImage);
    array_pop($recetaImage);
    $recetaImage = implode("/",$recetaImage);
    rmdir($recetaImage);
}
?>