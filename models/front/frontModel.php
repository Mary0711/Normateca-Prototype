<?php
include_once("../db/db_info.php");
class AdminModel extends DB
{
    public function getCategorias()
    {
        $query = "SELECT * FROM categories";
        return $this->run_query($query);
    }

    public function getCuerpos()
    {
        $query = "SELECT * FROM cuerpos";
        return $this->run_query($query);
    }

    public function getdocumentos()
    {
        $query = "SELECT 
        documentos.Document_id AS Document_id, 
        documentos.Document_title AS Document_title, 
        documentos.Cuerpo_abbr AS Cuerpo_abbr, 
        documentos.Category_abbr AS Category_abbr, 
        documentos.Certification_number AS Certification_number, 
        documentos.Fiscal_year AS Fiscal_year,  
        derroga.target_id AS derroga_target_id, 
        enmienda.target_id AS enmienda_target_id
        FROM documentos
        LEFT JOIN derroga ON documentos.Document_id = derroga.Document_id
        LEFT JOIN enmienda ON documentos.Document_id = enmienda.Document_id";

        return $this->run_query($query);
    }

    public function getderogaciones()
    {
        $query = "SELECT * FROM derroga";
        return $this->run_query($query);
    }

    public function getenmiendas()
    {
        $query = "SELECT * FROM enmienda";
        return $this->run_query($query);
    }

}
