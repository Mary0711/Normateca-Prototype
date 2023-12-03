<?php
session_start();
include_once("../models/front/frontModel.php");
function setData()
{
    $model = new AdminModel("localhost", "normateca", "root", "");
    $model->start_connection();
    $categorias = [];
    $cuerpos = [];
    $documentos = [];



    $result = $model->getdocumentos();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "id" => $row['documento_id'],
                "title" => $row['documento_title'],
                "cuerpo" => $row['cuerpo_abbr'],
                "categoria" => $row['category_abbr'],
                "certi" => $row['certification_number'],
                "fiscal" => $row['fiscal_year'],
                "target_derroga" => $row['derroga_target_id'],
                "target_enmienda" => $row['enmienda_target_id']
            );
    
            array_push($documentos, $values);
        }
    } else {
        $documentos = null;
    }









    $result = $model->getCategorias();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "cat_abbr" => $row['Category_abbreviation'],
                "cat_name" => $row['Category_name'],
                "cat_corp" => $row['cuerpo_abbr']
            );

            array_push($categorias, $values);
        }
    } else {
        $categorias = null;
    }

    $result = $model->getCuerpos();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "corp_abbr" => $row['Cuerpo_abbr'],
                "corp_name" => $row['cuerpo_name']
            );

            array_push($cuerpos, $values);
        }
    }

    $_SESSION['corps'] = $cuerpos;
    $_SESSION['cats'] = $categorias;
    $_SESSION['documentos'] = $documentos;
}
