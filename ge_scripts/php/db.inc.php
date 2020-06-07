<?php
$dbhostIP = "127.0.0.1";
$dbusername = "geekbrfs";
$dbpassword = "GDNjSdDDsueH";
$database = "geekbrfs_geeksexplained";

$con = mysqli_connect( $dbhostIP, $dbusername, $dbpassword, $database );

if(!$con) {
    die( "Failed to connect to MySQL: " . mysqli_connect_error() );
}
?>