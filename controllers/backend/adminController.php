<?php
session_start();
include_once("../../models/backend/adminModel.php");
function setData()
{
    $model = new AdminModel("localhost", "normateca", "root", "", "3305");
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
    $_SESSION['adminSet'] = true;

    $model->connection->close();
    header("Location: ../../views/admin.php");
}

if (!isset($_SESSION['adminSet']) || isset($_GET['reload'])) {
    setData();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['type'])) {
        if ($_POST['type'] == "upload" and isset($_POST['filename'])) {
            $target_dir = '../../documents/';
            $target_file = $target_dir . basename($_FILES['file']['name']);
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (file_exists($target_file)) {
                header("Location: ../../views/admin.php?error=exists");
            }

            if ($file_type == "pdf") {
                $values = array(
                    "file_name" => $_POST['filename'],
                    "file_date" => $_POST['filedate'],
                    "file_desc" => $_POST['desc'],
                    "file_number" =>  $_POST['number'],
                    "file_state" => $_POST['state'],
                    "file_cat" => $_POST['cat'],
                    "file_lang" => $_POST['lang'],
                    "file_year" => $_POST['fiscalYear'],
                    "file_corp" => $_POST['corp'],
                    "file_signature" => $_POST['signature'],
                    "file_path" => $target_file
                );

                $model = new AdminModel("localhost", "normateca", "root", "", "3306");
                $model->start_connection();

                $result = $model->checkFile($values['file_name']);

                if ($result->num_rows == 0) {
                    $model->InsertFile($values);
                    $model->connection->close();

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                        setData();
                        header("Location: ../../views/admin.php?succes");
                    } else {
                        header("Location: ../../views/admin.php?error=path");
                    }
                } else {
                    header("Location: ../../views/admin.php?error=file-exist");
                }
            } else {
                header("Location: ../../views/admin.php?error=type");
            }
        } else {
            header("Location: ../../views/admin.php?");
        }
    } else {
        header("Location: ../../views/admin.php?");
    }
} else {
    header("Location: ../../views/admin.php?");
}