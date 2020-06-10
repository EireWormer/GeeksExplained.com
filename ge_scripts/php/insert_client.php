<?php

if( isset($_POST['forename']) && isset($_POST['client_email']) )
{
    include "db.inc.php";

    $forename = $_POST['forename'];
    $email = $_POST['client_email']; 
    $joindate = "2020-06-07"; # Get join date in this format

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
        echo '<script>window.location.href = "https://www.geeksexplained.com/contact/sorry";</script>';
    }

    mysqli_close($con);
    
    echo '<script>window.location.href = "https://www.geeksexplained.com/contact/thank-you";</script>';
}
else
{
    echo '<script>window.location.href = "https://www.geeksexplained.com/contact/sorry";</script>';
}
?>