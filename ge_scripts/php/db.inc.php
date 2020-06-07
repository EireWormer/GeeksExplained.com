<?php
$dbhostIP = "127.0.0.1";
$dbusername = "root"; /* geekbrfs */
$dbpassword = "P3nt3st;2020"; /* GDNjSdDDsueH */
$database = "geekbrfs_geeksexplained";

$con = mysqli_connect( $dbhostIP, $dbusername, $dbpassword, $database );

if(!$con) {
    die( "Failed to connect to MySQL: " . mysqli_connect_error() );
}
?>