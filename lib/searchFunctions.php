<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText) {

    return function ($taskItem) use ($searchText){
        $noSpaces = preg_replace('/[ ]+/m',' ',$searchText);
        $lowerString = strtolower($taskItem['taskName']);
        $lowerSearch = trim(strtolower($noSpaces));
        if ($lowerSearch !== ''){
            $result = strpos($lowerString, $lowerSearch) !== false;
        }
        else{
            $result = true;
        }
        return $result;
    };
}

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $status) {
    return function($taskItem) use ($status){
        if (($status === '') || ($status === 'all')){
            $result = true;
        }
        else{
            $result = strpos($taskItem['status'],$status) !== false;
        }
        return $result;
    };  
} 


function getColor(string $status){
    if ($status=="todo"){
        $color = "badge bg-danger text-uppercase";
    }
    elseif( $status=="done"){
        $color = "badge bg-secondary text-uppercase";
    }
    else{
        $color = "badge bg-primary text-uppercase";
    }
    return $color;
}