<?php
// session_start();
include_once("../models/front/frontModel.php");
function doc()
{
    $model = new frontModel("localhost", "normateca", "root", "");
    $model->start_connection();
    $categorias = [];
    $cuerpos = [];
    $documentos = [];
    $recientes = [];

    $result = $model->getdocumentos();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "id" => $row['Document_id'],
                "title" => $row['Document_title'],
                "cuerpo" => $row['Cuerpo_abbr'],
                "categoria" => $row['Category_abbr'],
                "certi" => $row['Certification_number'],
                "fiscal" => $row['Fiscal_year'],
                "target_derroga" => $row['Derroga_target_id'],
                "target_enmienda" => $row['Enmienda_target_id'],
                "path" => $row['Doc_Path']
            );
            array_push($documentos, $values);
        }
    } else {
        $documentos = null;
    }

    $result = $model->recientes();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "title" => $row['Document_title'],
                "cuerpo" => $row['Cuerpo_abbr'],
                "number" => $row['Certification_number'],
                "fiscal" => $row['Fiscal_year'],
            );
            array_push($recientes, $values);
        }
    } else {
        $recientes = null;
    }

    $_SESSION['documentos'] = $documentos;
    $_SESSION['recientes'] = $recientes;
}
