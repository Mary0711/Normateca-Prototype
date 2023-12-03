<?php
// session_start();

include_once("../models/front/frontModel.php");

function doc()
{
    $model = new frontModel("localhost", "normateca", "root", "");
    $model->start_connection();

    $documentos = [];
    $recientes = [];
        $certificationNumber = isset($_POST['certification_number']) ? $_POST['certification_number'] : '';
        $fiscalYear = isset($_POST['Fiscal_year']) ? $_POST['Fiscal_year'] : '';
        $keyword = isset($_POST['Keywordnames']) ? $_POST['Keywordnames'] : '';
        $documentTitle = isset($_POST['Document_title']) ? $_POST['Document_title'] : '';
    
        $result = $model->filtrarDocs($certificationNumber, $fiscalYear, $keyword, $documentTitle);
    
        if ($result) {
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
        } else {
            
            echo "Error executing query: ";
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

