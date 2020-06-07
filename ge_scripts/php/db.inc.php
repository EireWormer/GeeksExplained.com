<?php
$dbhostIP = "162.0.229.38";
$dbusername = "geekbrfs";
$dbpassword = "GDNjSdDDsueH";
$database = "geekbrfs_geeksexplained";

$connection = mysqli_connect( $dbhostIP, $dbusername, $dbpassword, $database );

if( ! $connection ) {
    die( "Failed to connect to MySQL: " . mysqli_connect_error() );
}
?>