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

    public function getAllFiles($limit, $off)
    {
        $query = "SELECT * FROM documentos LIMIT $limit OFFSET $off";
        return $this->run_query($query);
    }
}
