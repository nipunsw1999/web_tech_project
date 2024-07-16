<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "main";

$con = mysqli_connect($hostname, $username, $password, $database);

if (!$con) {
    die("Connetion failed!" . mysqli_connect_error());
}

function updateHistory($con, $des)
{
    $sql = "INSERT INTO history (descr,dt,tm) VALUES ('$des',CURRENT_DATE, CURRENT_TIME);";
    mysqli_query($con, $sql);
    $sql = "INSERT INTO history_main (descr,dt,tm) VALUES ('$des',CURRENT_DATE, CURRENT_TIME);";
    mysqli_query($con, $sql);
}
?>