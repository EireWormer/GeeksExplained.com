<?php 
# act upon submitted preferences
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['analytics_pref'])) {
        setcookie("GeeksExplainedAnalytics", "true", time() + (86400 * 365 * 2), "/");
    } else {
        setcookie("GeeksExplainedAnalytics", "false", time() + (86400 * 365 * 2), "/");
    }
}

# Check if the user already has cookies or if they are in the EU
$in_eu_flag = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted

    if (isset($_POST['accept'])) {
        setcookie("GeeksExplainedAnalytics", "true", time() + (86400 * 365 * 2), "/");
    } elseif (isset($_POST['decline'])) {
        setcookie("GeeksExplainedAnalytics", "false", time() + (86400 * 365 * 2), "/");
    }
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
        content="Cookie Policy. As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gater, how we use it and why we sometimes need to store these cookies.">
    <meta name="keywords" content="cookie policy, cookies, third-party cookies, first-party cookies">
    <meta name="theme-color" content="#009b48" />
    <title>Cookie Policy | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Cookie Policy | GeeksExplained" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geeksexplained.com/legal/cookie-policy" />
    <meta property="og:image" content="https://www.geeksexpalined.com/ge_assets/img/icon/ge200x200.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="The logo of GeeksExplained. A green letter G merging with the letter E.">
    <meta property="og:description" content="Cookie Policy. As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gater, how we use it and why we sometimes need to store these cookies." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="../ge_assets/css/style.css">
    <link rel="stylesheet" href="cookie-policy.css">
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
        <!-- pops up when disabe cookies button clicked -->
        <article id="cookie-opt-out-bg" style="display: none;">
            <article id="sub-popup-box">
                <div class="card_title">Cookie management</div>
                
                <div class="cookie-choice">
                    <strong style="margin-right: 1.49rem;">Essential cookies</strong>
                    <label class="switch">
                        <input type="checkbox" checked disabled>
                        <span class="slider"></span>
                    </label>
                </div>

                <form method="post">
                    <div class="cookie-choice">
                        <strong style="margin-right: 1rem;">Analytical cookies</strong>
                        <label class="switch">
                            <input name="analytics_pref" type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <br>

                    <button id="save-cookie-pref-bttn" type="submit" onClick="closeOptOutBox()">Save preferences</button>
                </form>
            </article>
        </article>

        <?php include '../header.html' ?>

        <main>
            <article class="card polic-container">
                <div id="page-title">Cookie Policy</div>

                This is the Cookie Policy for GeeksExplained, accessible from https://www.geeksexplained.com

                <div class="heading">What are Cookies?</div>
                <p>
                    Cookies are small text files that are placed on your device by us when you visit our website.
                    The cookie categories below provide more information on the different types of cookies we use. 
                    <br><br>
                    For more general information on cookies, please read <a href="https://www.cookieconsent.com/what-are-cookies/">"What Are Cookies"</a>.
                </p>

                <div class="heading">How We Use Cookies</div>
                <p>
                    GeeksExplained uses cookies to help make our website work, or make it work more efficiently,
                    and cookies recognise and remember your preferences and gather analytical information such as
                    what articles our readers enjoy.
                </p>
                
                <div class="heading">Essential Cookies</div>
                <p>
                    Essential Cookies are cookies that are required to support basic functionality. 
                    For instance, we use cookies to remember your cookie preferences. The website cannot function
                    without these cookies.
                </p>

                <div class="heading">Analytics Cookies</div>
                <p>
                    Analytics cookies allow us to enrich our understanding of how visitors interact with our digital 
                    channels by collecting and reporting information. For instance they measure how often you visit our 
                    website and how you use it. This information helps us improve our website so that you can have a 
                    better experience when you use it in the future.
                </p>

                <div class="heading">How to disable cookies?</div>
                <p>
                    To change your cookie preferences <a href="javascript:void(0)" href="#" onclick="openOptOutBox();"> Click Here</a>.
                </p>

                <div class="heading">How to disable cookies?</div>
                <p>
                    For more information, please email <strong>dataprotectionofficer@geeksexplained.com</strong>.
                </p>
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
    <script src="../ge_scripts/js/cookieOptOutPopupBox.js"></script>
</body> 	
</html>