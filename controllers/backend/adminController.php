<?php
session_start();
include_once("../models/backend/adminModel.php");
function setData()
{
    $model = new AdminModel("localhost", "normateca", "root", "");
    $model->start_connection();
    $categorias = [];
    $cuerpos = [];
    $limit = 5;
    $off = 0;
    $files = [];

    $result = $model->getCategorias();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "cat_abbr" => $row['Category_abbr'],
                "cat_name" => $row['Category_name'],
                "cat_corp" => $row['Cuerpo']
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
                "corp_name" => $row['Cuerpo_name']
            );

            array_push($cuerpos, $values);
        }
    } else {
        $cuerpos = null;
    }

    $result = $model->getAllFiles($limit, $off);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $values = array(
                "file_id" => $row['Document_id'],
                "file_name" => $row['Document_title'],
                "file_cat" => $row['Category_abbr'],
                "file_corp" => $row['Cuerpo_abbr'],
                "file_date" => $row['Date_created']
            );

            array_push($files, $values);
        }
    } else {
        $files = null;
    }

    $_SESSION['files'] = $files;
    $_SESSION['corps'] = $cuerpos;
    $_SESSION['cats'] = $categorias;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['type'])) {
    }
}
