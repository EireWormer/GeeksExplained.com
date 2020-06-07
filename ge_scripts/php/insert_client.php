<?php
include "db.inc.php";

$forename = "Anthony";
$email = "anthonyrb@pm.me"; 
$joindate = "2020-06-07";

$query = '
INSERT INTO client_emails(
    first_name,
    address,
    join_date
) VALUES (
    "' . $forename . '",
    "' . $email . '",
    "' . $joindate . '"
);';

// Execute query
$result = mysqli_query($con, $query);

if ( ! $result ) 
{	
    die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
?>