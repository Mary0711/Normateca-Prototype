<?php
// session_start();

include_once("../models/front/frontModel.php");

function doc()
{
    $model = new frontModel("localhost", "normateca", "root", "");
    $model->start_connection();

    $documentos = [];
    $recientes = [];
    $paginas =[];
        $certificationNumber = isset($_POST['certification_number']) ? $_POST['certification_number'] : '';
        $fiscalYear = isset($_POST['Fiscal_year']) ? $_POST['Fiscal_year'] : '';
        $keyword = isset($_POST['Keywordnames']) ? $_POST['Keywordnames'] : '';
        $documentTitle = isset($_POST['Document_title']) ? $_POST['Document_title'] : '';
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
        $cuerpo = isset($_POST['cuerpo']) ? $_POST['cuerpo'] : '';
        $date_created = isset($_POST['Date_created']) ? $_POST['Date_created'] : '';
        $date_created = isset($_POST['Date_created']) ? $_POST['Date_created'] : '';
        $desde = isset($_POST['desde']) ? $_POST['desde'] : '';
        $hasta = isset($_POST['hasta']) ? $_POST['hasta'] : '';
        // $paginaActual = isset($_POST['paginaActual']) ? $_POST['paginaActual'] : '';
        // $registrosPorPagina = isset($_POST['registrosPorPagina']) ? $_POST['registrosPorPagina'] : '';
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        // $paginaActual = 1;
        $registros = 10;
        $inicio = ($paginaActual - 1) * $registros;

        $result = $model->filtrarDocs($certificationNumber, $fiscalYear, $keyword, $documentTitle,$cuerpo,$categoria,$date_created,$desde,$hasta,$paginaActual,$registros,$inicio);
    
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
                        "target_derroga" => $row['derroga'],
                        "target_enmienda" => $row['enmienda'],
                        "path" => $row['Doc_Path'],
                        
                        "certi_derr" => $row['certificacion_number'],
                        "fiscal_derr" => $row['fiscal_year'],
                        "doc_path" => $row['doc_path'],

                        "certi_enm" => $row['enm_cert'],
                        "fiscal_enm" => $row['enm_fisc'],
                        "doc_path_enm" => $row['enm_doc_path']
                        
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
                "path" => $row['Document_path']
            );
            array_push($recientes, $values);
        }
    } else {
        $recientes = null;
    }

    $result = $model->numPages();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $totalPaginas = ceil($row['total'] / $registros);
            $values = array(
                "pag" => $totalPaginas,
                "registros" => $registros,
                "total" => $row['total']
            );
            array_push($paginas, $values);
        }
    }
    $_SESSION['paginas'] = $paginas;
    $_SESSION['documentos'] = $documentos;
    $_SESSION['recientes'] = $recientes;
}

