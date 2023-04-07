<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $id = '';
    if($_SESSION['id']){ 
        $id = $_SESSION['id'];  
    } else header("location: /gete/pages/login.php");

    $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
    mysqli_select_db($con, "gete") or die("Cannot connect to database");

    $order = mysqli_real_escape_string($con, $_POST['id']);

    mysqli_query($con, "DELETE FROM orders WHERE id='$order'") or die(mysqli_error($con));
    header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: GET, POST');

    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json; charset=utf-8');
    echo "done.".$id;
}