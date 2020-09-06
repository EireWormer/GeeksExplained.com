<?php
$dbhostIP = "";
$dbusername = "";
$dbpassword = "";
$database = "";

$con = mysqli_connect( $dbhostIP, $dbusername, $dbpassword, $database );

if(!$con) {
    die( "Failed to connect to MySQL: " . mysqli_connect_error() );
}
?>