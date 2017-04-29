<?php
    include "../config.php";
    error_reporting(E_ALL);
    //query para insertar imagen obtenemos valores por get los cuales los recibimos de query por post
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $id = $_GET['id_hidden'];
    $type = $_GET['type_hidden'];
    $typeID = $_GET['type_id_hidden'];
    $newType = $_GET['picture_type'];
    $st = $_GET['picture_status'];
    $idCategory = $_GET['category'];
    $md = date_create();
    $md = date_format($md, 'Y-m-d');
    $query1 = "UPDATE content SET tittle='$title', description='$desc', modification_date='$md', status='$st' WHERE id_content='$id'";
    $query2 = "";
    $query3 = "";
    mysqli_query($mysqli,$query1);
    if (($type != $newType) || ($type == $newType && $idCategory != $typeID)) {
        if ($newType == "salon") {
            $query2 = "INSERT INTO content_decoration (id_content,id_decoration) 
                    VALUES (".$id.",".$idCategory.")";
        } else if ($newType == "servicio") {
            $query2 = "INSERT INTO content_sub_service (id_content,id_sub_service) 
                    VALUES (".$id.",".$idCategory.")";
        } else if ($newType == "evento") {
            $query2 = "INSERT INTO content_event (id_content,id_event) 
                    VALUES (".$id.",".$idCategory.")";
        }
        if ($type == "salon") {
            $query3 = "DELETE FROM content_decoration WHERE id_content ='" . $id ."' AND id_decoration = '" . $typeID ."'";
        } else if ($type == "servicio") {
            $query3 = "DELETE FROM content_sub_service WHERE id_content ='" . $id ."' AND id_sub_service = '" . $typeID ."'";
        } else if ($type == "evento") {
            $query3 = "DELETE FROM content_event WHERE id_content ='" . $id ."' AND id_event = '" . $typeID ."'";
        }
        mysqli_query($mysqli,$query2);
        mysqli_query($mysqli,$query3);
    }
    $mysqli->close();
?>
