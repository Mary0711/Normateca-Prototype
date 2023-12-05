<?php
include_once("../db/db_info.php");
class frontModel extends DB
{
   
    public function filtrarDocs($certificationNumber, $fiscalYear, $keyword, $documentTitle,$cuerpo,$categoria,$date_created,$desde,$hasta,$paginaActual,$registros,$inicio)
{
    
    $query = "SELECT 
    documentos.Document_id AS Document_id, 
    documentos.Document_title AS Document_title, 
    documentos.Cuerpo_abbr AS Cuerpo_abbr, 
    documentos.Category_abbr AS Category_abbr, 
    documentos.Certification_number AS Certification_number, 
    documentos.Fiscal_year AS Fiscal_year,
    documentos.Document_path AS Doc_Path,
    derroga.Derroga_target_id AS derroga,
    enmienda.Enmienda_target_id AS enmienda,
    (
        SELECT Certification_number
        FROM documentos 
        WHERE documentos.Document_id = derroga.Derroga_target_id
        LIMIT 1
    ) AS certificacion_number,
    (
        SELECT Fiscal_year
        FROM documentos 
        WHERE documentos.Document_id = derroga.Derroga_target_id
        LIMIT 1
    ) AS fiscal_year,
    (
        SELECT Document_path
        FROM documentos 
        WHERE documentos.Document_id = derroga.Derroga_target_id
        LIMIT 1
    ) AS doc_path,

    (
        SELECT Certification_number
        FROM documentos 
        WHERE documentos.Document_id = enmienda.Enmienda_target_id
        LIMIT 1
    ) AS enm_cert,
    (
        SELECT Fiscal_year
        FROM documentos 
        WHERE documentos.Document_id = enmienda.Enmienda_target_id
        LIMIT 1
    ) AS enm_fisc,
    (
        SELECT Document_path
        FROM documentos 
        WHERE documentos.Document_id = enmienda.Enmienda_target_id
        LIMIT 1
    ) AS enm_doc_path

FROM documentos
LEFT JOIN (
    SELECT Document_id, GROUP_CONCAT(DISTINCT target_id SEPARATOR ',') AS Derroga_target_id
    FROM derroga
    GROUP BY Document_id
) derroga ON documentos.Document_id = derroga.Document_id
LEFT JOIN (
    SELECT Document_id, GROUP_CONCAT(DISTINCT target_id SEPARATOR ',') AS Enmienda_target_id
    FROM enmienda
    GROUP BY Document_id
) enmienda ON documentos.Document_id = enmienda.Document_id
WHERE 1=1";

    

    if ($certificationNumber != '') {
        $query .= " AND documentos.Certification_number LIKE '%$certificationNumber%'";
    }

    if ($fiscalYear != '') {
        $query .= " AND documentos.Fiscal_year LIKE '%$fiscalYear%'";
    }

    if ($keyword != '') {
        $query .= " AND documentos.Keyword_id LIKE '%$keyword%'";
    }

    if ($documentTitle != '') {
        $query .= " AND documentos.Document_title LIKE '%$documentTitle%'";
    }

    if ($date_created != '') {
        $query .= " AND documentos.Date_created LIKE '$date_created'";
    }

    if ($desde != '' AND $hasta != '') {
        $query .= " AND documentos.Date_created BETWEEN '$desde' AND '$hasta'";
    }

    if (!empty($cuerpo)) {
        $cuerpoConditions = [];
    
        foreach ($cuerpo as $cuerpov) {

            $cuerpoConditions[] = "documentos.Cuerpo_abbr LIKE '%$cuerpov%'";
        }
    
        $cuerpoQuery = implode(" OR ", $cuerpoConditions);
    
        $query .= " AND (" . $cuerpoQuery . ")";
    }

    
    if (!empty($categoria)) {
        $categoriaConditions = [];
    
        foreach ($categoria as $cate) {
            $categoriaConditions[] = "documentos.Category_abbr LIKE '%$cate%'";
        }
    
        $cateQuery = implode(" OR ", $categoriaConditions);
    
        $query .= " AND (" . $cateQuery . ")";
    }

    if ($inicio != '' AND $registros != '') {
        $query .= " LIMIT $inicio, $registros";
    }



    return $this->run_query($query);
}

public function recientes(){
    $query = "SELECT Document_title, Fiscal_year, Certification_number, Cuerpo_abbr, Document_path
    FROM documentos
    ORDER BY documentos.Document_id DESC
    LIMIT 4";
    return $this->run_query($query);
}

public function numPages(){
    $query = "SELECT COUNT(*) as total FROM documentos";
    return $this->run_query($query);
}


public function derroga($target){
    $query ="SELECT distinct documentos.Certification_number AS Certification_number, 
    documentos.Fiscal_year AS Fiscal_year,documentos.Document_path AS Doc_Path
    FROM documentos
    WHERE documentos.Document_id = '$target'";
    return $this->run_query($query);
}

}
