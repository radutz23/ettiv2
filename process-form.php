<?php

$name=$_POST["name"];
$surname=$_POST["surname"];
$gender=$_POST["gender"];
$iesiti=$_POST["iesiti"];
$minore=filter_input(INPUT_POST, "minore", FILTER_VALIDATE_BOOL);

if ( ! $minore){
    die("Pe cine pula mea minti ma. Bifeaz-o si pe ultima.");
}

$host = "ec2-54-228-32-29.eu-west-1.compute.amazonaws.com";
$dbname = "de3rjiei76o2js";
$username = "vdrbofjdgqobfe";
$password = "4b7a3371b76d0a99bcd97668af3fcc27850cb0fc924c2a15e86376325103aba3";
$port="5432";
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

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