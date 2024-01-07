<?php
if( isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $passwprd = "";
    $database = "zapisnik";

    $connection = new mysqli($servername, $username, $passwprd, $database);

    $sql = "DELETE FROM zapisky WHERE id=$id";
    $connection->query($sql); 
}
header("location: database.php");
exit;
?>