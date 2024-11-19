<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    include("db.php");
    $sql = "DELETE FROM student WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["delete"] = "Student Record Deleted Successfully";
        header("Location: index.php");
    }
}


?>