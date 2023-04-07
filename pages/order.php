<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $id = '';
    if($_SESSION['id']){ 
        $id = $_SESSION['id'];  
    } else header("location: /gete/pages/login.php");

    $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
    mysqli_select_db($con, "gete") or die("Cannot connect to database");

    $coffee = mysqli_real_escape_string($con, $_POST['coffee']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    mysqli_query($con, "INSERT INTO orders (user, coffee, amount, address, phone) VALUES ('$id', '$coffee', '$amount', '$address', '$phone')") or die(mysqli_error($con)) or die(mysqli_error($con));
    header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: GET, POST');

    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json; charset=utf-8');
    $data = ['success' => true];
    echo json_encode($data);
}