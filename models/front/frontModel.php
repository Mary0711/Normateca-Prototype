<?php
include_once("../db/db_info.php");
class frontModel extends DB
{
   
    public function filtrarDocs($certificationNumber, $fiscalYear, $keyword, $documentTitle,$cuerpo,$categoria)
{
    $query = "SELECT 
                documentos.Document_id AS Document_id, 
                documentos.Document_title AS Document_title, 
                documentos.Cuerpo_abbr AS Cuerpo_abbr, 
                documentos.Category_abbr AS Category_abbr, 
                documentos.Certification_number AS Certification_number, 
                documentos.Fiscal_year AS Fiscal_year,
                documentos.Document_path AS Doc_Path,
  
                derroga.target_id AS Derroga_target_id, 
                enmienda.target_id AS Enmienda_target_id
            FROM documentos
            LEFT JOIN derroga ON documentos.Document_id = derroga.Document_id
            LEFT JOIN enmienda ON documentos.Document_id = enmienda.Document_id
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



    return $this->run_query($query);
}

public function recientes(){
    $query = "SELECT Document_title, Fiscal_year, Certification_number, Cuerpo_abbr, Document_path
    FROM documentos
    ORDER BY documentos.Document_id DESC
    LIMIT 4";
    return $this->run_query($query);
}




}
