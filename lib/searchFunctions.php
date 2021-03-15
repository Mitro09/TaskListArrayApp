<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText) {
    return function ($taskItem) use ($searchText){
        $result = strpos($taskItem['taskName'], $searchText) !== false;
        return $result;
    };
}

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $status) : callable {
    
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