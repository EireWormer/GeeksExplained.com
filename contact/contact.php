<?php 
# Check if the user already has cookies or if they are in the EU

$in_eu_flag = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted

    if (isset($_POST['accept'])) {
        setcookie("GeeksExplainedAnalytics", "true", time() + (86400 * 365 * 2), "/");
    } elseif (isset($_POST['decline'])) {
        setcookie("GeeksExplainedAnalytics", "false", time() + (86400 * 365 * 2), "/");
    }
    #header("Refresh:0");
} 

if(isset($_COOKIE['GeeksExplainedAnalytics'])) {
    #cookies already set
    $in_eu_flag = 2;
} else {
    include '../ge_scripts/php/is_in_eu.php';
    if(displayCookieConsent()) {
        # In the EU - Show banner.
        $in_eu_flag = 1;
    } else {
        # Not in the EU - Set default cookies.
        setcookie("GeeksExplainedAnalytics", "true", time() + (86400 * 365 * 2), "/");
    
        $in_eu_flag = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en-IE"> 	
<head> 	
    <?php 
    # If cookies are set, then execute upon them
    if($in_eu_flag == 2) { 
        if( $_COOKIE['GeeksExplainedAnalytics'] === 'true' ) {
            echo '<!-- Google Analytics injection --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-169108047-1"></script><script>Swindow.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-169108047-1");</script>
            ';
        }
    }
    ?>

    <!-- metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" 
        content="Contact Us. We're happy to answer any of your questions. Fill in the form and we'll get back to you as soon as possible.">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#009b48" />
    <title>Contact Us | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Contact Us | GeeksExplained" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geeksexplained.com/contact.html" />
    <meta property="og:image" content="https://www.geeksexplained.com/ge_assets/img/icon/ge200x200.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="The logo of GeeksExplained. A green letter G merging with the letter E.">
    <meta property="og:description" 
        content="Contact Us. We're happy to answer any of your questions. Fill in the form and we'll get back to you as soon as possible." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="../ge_assets/css/style.css">
</head> 	
<body> 	

    <?php 
        # If cookies are not set, and the user is in the EU, display cookie consent
        if($in_eu_flag == 1) {
            # If user has no cookies and is from the eu, display banner
            include '../cookiebanner.html';
        }
    ?>

    <article id="page-container">
        <?php include '../header.html' ?>

        <main>
            <article class="card">
                <article class="container">
                    <div class="card_title">Contact Us</div>
            
                    <form action="https://www.geeksexplained.com/ge_scripts/php/contact_us" method="post">
                        <div class="text_field_group">
                        <input type="email" name="email" class="text_field" placeholder="Your Email"/>
                        <label for="email" class="text_field_label">Email Address</label>
                        </div>
            
                        <br />
                        <div class="text_field_group">
                        <input type="text" name="subject" class="text_field" placeholder="Subject"/>
                        <label for="subject" class="text_field_label">Subject</label>
                        </div>
            
                        <br />
                        <div class="text_field_group">
                        <textarea type="text" name="message" class="text_field" rows="5"></textarea>
                        <label for="message" class="text_field_label">Your message...</label>
                        </div>
            
                        <br/>
                        <button type="submit">SUBMIT</button>
                    </form>
                </article>
            </article>
        </main>

        <footer>
            <ul>
                <li><a href="https://www.geeksexplained.com/contact/contact">Contact us</a></li>
                <li><a href="https://www.geeksexplained.com/legal/privacy-policy">Privacy policy</a></li>
                <li><a href="">@GeeksExplained, Some rights reserved</a></li>
            </ul>
        </footer>
    </article>
    
    <!-- scripts -->
    <script src="https://www.geeksexplained.com/ge_scripts/js/subPopupBox.js"></script>
    <script src="https://www.geeksexplained.com/ge_scripts/js/sideBarAnimation.js"></script>
</body> 	
</html>