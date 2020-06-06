<?php

function buildMessage($msg_from, $msg_subject, $msg_txt) 
{
$msg = '
<html> 	
        <body style="
        border: 1px solid rgba(0,0,0,0.2);
        background: #f1f1f1;
        margin: 0;
        padding: 0;"> 	
                <article style="
                position: relative;
                min-height: 100vh;">
                        <header style="
                        background: #ffffff;
                        padding: 1px 0;
                        padding-top: 5px;">
                        <div id="header-logo-motto-container">
                                <img src="https://www.geeksexplained.com/ge_assets/img/logo/logo_extended.png" alt="logo" style="
                                max-width: 35%;
                                display: block;
                                margin: 0 auto;">
                                <p style="
                                text-align: center;
                                font-size: 0.75rem;
                                letter-spacing: 0.4px;">The geek to English translator</p>
                        </div>
                        </header>

                        <main style="
                        padding-bottom: 2rem;">
                                <article class="card"
                                style="margin: 50px auto;
                                width: 93%;
                                border-radius: 5px;
                                box-shadow: 0 0 1px rgba(0,0,0,0.6);
                                font-size: 1.5em;
                                font-weight: 300;
                                background: #ffffff;">

                                        <div class="container" style="padding: 2px 16px;">
                                                <div class="card_title"
                                                style="margin: 15px 0;
                                                font-weight: 500;
                                                letter-spacing: 0.25px;">From:</div>
                                                <div style="letter-spacing: 1.15px;
                                                margin-bottom: 50px;"> ' . $msg_from . '</div>

                                                <div class="card_title"
                                                style="margin: 15px 0;
                                                font-weight: 500;
                                                letter-spacing: 0.25px;">Subject:</div>
                                                <div style="letter-spacing: 1.15px;
                                                margin-bottom: 50px;">' . $msg_subject . '</div>

                                                <div class="card_title"
                                                style="margin: 15px 0;
                                                font-weight: 500;
                                                letter-spacing: 0.25px;">Message:</div>
                                                <div style="margin-bottom: 50px;">
                                                <pre style="font: inherit; font-size: 0.8em; letter-spacing: 1.15px;">' . $msg_txt . '</pre>
                                                </div>
                                        </div>
                                </article>
                        </main>

                        <footer style="
                        height: 2rem;
                        padding-bottom: 2rem;
                        padding-top: 1.25rem;
                        width: 100%;
                        position: absolute;
                        bottom: 0;
                        background: #009b48;
                        text-align: center;">
                                <ul>
                                        <li style="
                                        color: #ffffff;
                                        list-style-type: none;">@GeeksExplained, Some rights reserved</li>
                                </ul>
                        </footer>
                </article>
        <body> 	
</html>
';
return $msg;
}

/* redirects after script is finsihed. accepts boolean */
function redirect( $sending_successful ) 
{
    if($sending_successful)
    {
        echo '<script>window.location.href = "https://www.geeksexplained.com/contact_thank_you.html";</script>';
    } 
    else
    {
        echo '<script>window.location.href = "https://www.geeksexplained.com/contact_sorry.html";</script>';
    }
}

if( isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) )
{
    $client_email = $_POST['email'];
    $email_subject = $_POST['subject'];
    $client_message = $_POST['message'];  

    $mail_to_send_to = "anthonybyrne1101@gmail.com";
    $from_email = "client@geeksexplained.com";
    $email = $from_email;
    $message = buildMessage($client_email, $email_subject, $client_message);
    
    $headers = "From: $from_email" . "\r\n";
    $headers .="Reply-To: $email" . "\r\n" ;
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    
    $a = mail( $mail_to_send_to, $email_subject, $message, $headers );
    if ($a)
    {
        redirect(true);
    } 
    else 
    {
        redirect(false);
    }
} else 
{
    redirect(false);
}

?> 