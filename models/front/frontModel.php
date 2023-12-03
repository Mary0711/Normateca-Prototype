<?php
include_once("../db/db_info.php");
class frontModel extends DB
{
   

    public function getdocumentos()
    {
        $query = "SELECT 
        documentos.Document_id AS Document_id, 
        documentos.Document_title AS Document_title, 
        documentos.Cuerpo_abbr AS Cuerpo_abbr, 
        documentos.Category_abbr AS Category_abbr, 
        documentos.Certification_number AS Certification_number, 
        documentos.Fiscal_year AS Fiscal_year,  
        derroga.target_id AS Derroga_target_id, 
        enmienda.target_id AS Enmienda_target_id
        FROM documentos
        LEFT JOIN derroga ON documentos.Document_id = derroga.Document_id
        LEFT JOIN enmienda ON documentos.Document_id = enmienda.Document_id";

        return $this->run_query($query);
    }

    
    public function searchDocs($certificationNumber, $fiscalYear, $keyword, $documentTitle) {
        $query = "SELECT * FROM documentos WHERE 1=1"; // Starting with 1=1 to make adding conditions easier
    
        if ($certificationNumber !== '') {
            $query .= " AND Certification_number LIKE '$certificationNumber'";
        }
    
        if ($fiscalYear !== '') {
            $query .= " AND Fiscal_year = '$fiscalYear'";
        }
    
        if ($keyword !== '') {
            $query .= " AND (Keyword_id LIKE '%$keyword%')";
        }
    
        if ($documentTitle !== '') {
            $query .= " AND Document_title = '$documentTitle'";
        }
    
        return $this->run_query($query);
    }

}
