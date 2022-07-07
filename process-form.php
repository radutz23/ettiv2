<?php

$name=$_POST["name"];
$surname=$_POST["surname"];
$gender=$_POST["gender"];
$iesiti=$_POST["iesiti"];
$minore=filter_input(INPUT_POST, "minore", FILTER_VALIDATE_BOOL);

if ( ! $minore){
    die("Pe cine pula mea minti ma. Bifeaz-o si pe ultima.");
}

$host = "localhost";
$dbname = "message_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno()){
    die("Connection error: " . mysqli_connect_error());
}

$sql="INSERT INTO message (name, surname, gender, iesiti)
VALUES(?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $gender, $iesiti);

mysqli_stmt_execute($stmt);
echo "Record saved.";