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
    include '../../../../ge_scripts/php/is_in_eu.php';
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
        content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard.">
    <meta name="keywords" content="computer geek, programming, geeksexplained, geek, explained, casually explained">
    <meta name="theme-color" content="#009b48" />
    <title>Power supply (and it's cables) | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Power supply (and it's cables) | GeeksExplained" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geeksexplained.com/article/2020/06/21/{FILENAME}.php" />
    <meta property="og:image" content="{ARTICLE IMAGE}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="{ARTICLE IMAGE DESCRIPTION}">
    <meta property="og:description" 
        content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="../../../../ge_assets/css/style.css">
    <link rel="stylesheet" href="power-supply-and-all-its-cables.css">
</head> 	
<body> 	

    <?php 
        # If cookies are not set, and the user is in the EU, display cookie consent
        if($in_eu_flag == 1) {
            # If user has no cookies and is from the eu, display banner
            include './cookiebanner.html';
        }
    ?>

    <article id="page-container">
        <?php include '../../../../header.html' ?>

        <main>
            <article class="article">
                <div class="article-title">Power supply (and it's cables)</div>

                <figure class="full-fit-img">
                    <img src="main-img-pc-sideview.jpg" width="100%">
                    <figcaption>Image source: Luke Hodde (https://unsplash.com/photos/Z-UuXG6iaA8)</figcaption>
                </figure>

                <p>
                    This is the intro
                </p>

                <p>
                    <ul>
                        <li>Source: https://www.pcinside.info/inside/inside-power-supplies/power-supply-cables-connectors/</li>
                        <li>P1 (PC Main / ATX connector)</li>
                        <li>P4 (EPS Connector)</li>
                        <li>PCI-E Connector (6-pin en 6+2 pin)</li>
                        <li>Molex (4 Pin Peripheral Connector)</li>
                        <li>SATA Connector</li>
                        <li>Mini-Molex / Floppy connector</li>
                        <li>Adapter: Molex to SATA Power cable</li>
                        <li>Adapter: Molex to PCI-E 6-pins</li>
                        <li>Adapter: ATX adapter</li>
                    </ul>
                </>
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