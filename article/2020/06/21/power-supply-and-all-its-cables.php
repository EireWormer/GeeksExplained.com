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
        content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard (mainboard).">
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
        content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard (mainboard)." />
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
                    When I built my first personal computer, I can remember the confusion of the entire process. 
                    There were so many different components to keep track of; however, the power supply stands out.
                    I can vividy remember the sense bewilderment that came over me when I pulled out a platora of 
                    varies cables. What's worse, is that I could find nowhere online that just explained clearly what 
                    I needed to know. This is years later, but this is dedicated to anyone who is having the same 
                    struggle I did when searching for this information. I have made it as concise as possible so you
                    can get to gaming ASAP.  
                </p>

                <div class="section-title">power supply? what? why?</div>
                <p>
                    The components that make your personal computer (PC) use Direct Current (DC). The wall electrical 
                    mains in your homes supplies Alternating Current (AC) to the electrical outlets on your walls. If 
                    you supply AC to a component that requires DC, you run the risk of destroying it. 
                    <br><br>
                    The power supply for your PC is responsible for taking the high voltage AC (115v-230v ~ 47-63Hz) 
                    from the wall and converts it to low voltage DC (3.3v-12v ±5-10%) that your components can use 
                    <em>(Intel, 2018)</em>.
                </p>
                
                <div class="section-title">Connectors</div>
                <div class="section-sub-title">P1 12v Main Connector</div>
                <p>
                    The P1 12v Main Connector is the replacement for the older P8 and P9 connectors. This connector is
                    normally the largest connector. This may be a 20 or 24 pin connector, often you find a 20 pin connector
                    with an extra 4 pin connector attached to facilitate backwards compatibility with older mainboard.
                    Luckily, the pins are keyed, so a 20 pin connector cannot be accidentally inserted into a 24 pin 
                    mainboard incorrectly.
                </p>
                <figure class="full-fit-img half-fit-img">
                    <img src="p1-connector.jpg" width="100%">
                    <figcaption>Image source: (https://www.computerhope.com/jargon/a/atxstyle.htm)</figcaption>
                </figure>

                <p>
                    This connector plugs into what is usually the largest plug on the mainboard as highlighted below.
                </p>

                <figure class="full-fit-img half-fit-img">
                    <img src="motherboard-p1.jpg" width="100%">
                    <figcaption>Image source: (https://www.techspot.com/article/1965-anatomy-motherboard/)</figcaption>
                </figure>

                

                <div class="section-sub-title">CPU Connector</div>
                <p>
                    The CPU connector provides power for the processor. Who would have guessed? It is an 8 pin connector 
                    which usually comes as two attached 4 pin connectors.
                </p>
                <figure class="full-fit-img half-fit-img">
                    <img src="cpu-connector.jpg" width="100%">
                    <figcaption>Image source: (https://www.newegg.com/p/1BK-00RR-00082)</figcaption>
                </figure>
                <p>
                    This connector plugs into the top left of the mainboard as highlighted below.
                </p>
                <figure class="full-fit-img half-fit-img">
                    <img src="motherboard-cpu.jpg" width="100%">
                    <figcaption>Image source: (https://www.techspot.com/article/1965-anatomy-motherboard/)</figcaption>
                </figure>

                <div class="section-title">Bibliography</div>
                <ol>
                    <li>
                        Intel (2018). Desktop Platform Form Factors Power Supply Design Guide (Rev 002) (Document No #336521). Available at: https://intel.ly/3fz2y3k.
                    </li>
                </ol>
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