
<?php
include "config.php";
    if (isset($_GET['id']) && isset($_GET['type'])):
        $table = "";
        $id = $_GET['id'];
        if ($_GET['type'] == "decoration") {
            $table = "decoration";
        } else if ($_GET['type'] == "service") {
            $table = "sub_service";
        } else if ($_GET['type'] == "event") {
            $table = "event";
        }
        $query = "SELECT route from content where id_content ='". $id ."'";
        $filename = mysqli_fetch_array(mysqli_query($mysqli, $query))['route'];
        $query2 = "DELETE content, content_". $table ." FROM content 
            INNER JOIN content_". $table ." ON content.id_content = content_". $table .".id_content
            WHERE content.id_content=?";
        $stmt = $mysqli->prepare($query2);
        $stmt->bind_param('s', $id);
        if ($stmt->execute()):
            $mysqli->close();
            unlink('./php/album/'.$filename);
            echo "<script>location.href='principal.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
?>
