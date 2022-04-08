<?php

function clean_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function setDate($date){
    $timestamp = strtotime($date);
    $months = ['January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July ',
    'August',
    'September',
    'October',
    'November',
    'December'];
    $day = date('d',$timestamp);
    $month = date('m',$timestamp) - 1;
    $year = date('Y',$timestamp);
    $date = "{$months["$month"]} $day, $year";
    return $date;
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
function uploadImage($file,$pathToSave,$root = false){

    $fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5($fileName) . '.' . $fileExtension;
    $uploadFileDir = $pathToSave;
    
    if(!typeOfPhoto($fileExtension)){
        return [
            'Solo puedes subir archivos .jpg, .gif y .png',
            false
        ];
    }
    elseif($fileSize > 2097152){
        return [
            'Tamaño maximo para el archivo es de 2MB',
            false
        ];
    }
    else{
        if($root){
            if(!is_dir($root)){
                mkdir($root);
                mkdir($pathToSave);
            }
        }
        else{
            if(!is_dir($root)){
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
?>