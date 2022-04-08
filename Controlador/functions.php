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
?>