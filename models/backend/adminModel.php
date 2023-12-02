<?php
include_once("../db_info.php");

function GetCategories(){
    $categorias = "SELECT * FROM categories";
    return mysqli_query($dbc, $categorias);
}

function GetSubCategories(){
    $subcategorias = "SELECT * FROM subcategories";
    return mysqli_query($dbc, $subcategorias);

}
?>

