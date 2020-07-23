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
    <meta name="description" content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard (mainboard).">
    <meta name="keywords" content="computer geek, programming, geeksexplained, geek, explained, casually explained">
    <meta name="theme-color" content="#009b48" />
    <title>Power supply (and it's cables) | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Power supply (and it's cables) | GeeksExplained" />
    <meta property="og:type" content="article" />
    <meta property="article:published_time" content="2020-06-19T12:00:00" />
    <meta property="article:modified_time" content="2020-06-19T112:00:00" />
    <meta property="og:url" content="https://www.geeksexplained.com/article/2020/06/21/power-supply-and-all-its-cables" />
    <meta property="og:image" content="https://www.geeksexplained.com/article/2020/06/21/power-supply.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="A personal computer's power supply unit.">
    <meta property="og:description" content="In this GeeksExplained article, we explain the purpose and use of a power supply unit (PSU) in a computer. We also list the different power supply (PSU) cables and their purposes, uses, and placements on the motherboard (mainboard)." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="../../../../ge_assets/css/style.css">
    <link rel="stylesheet" href="standard-contactual-clauses.css">
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
                <!--    
                    #######################
                    Introduction
                    #######################
                 -->
                <div class="article-title">Standard Contractual Clauses (SCCs)</div>

                <figure class="full-fit-img">
                    <img src="facebookvsschrems.png" width="100%">
                    <figcaption>Image source: shorturl.at/cIV67</figcaption>
                </figure>

                <p>
                    Firstly, let my preface this article with a disclaimer: I am not a legal professional and the information 
                    contained withing this article should not be interpreted as legal advice. Should you require legal advice, 
                    please consult a lawyer. With that being said, I will clearly outline what is directly quoted from statute 
                    and anything not clearly labelled as statute is my interpretation/opinion. 
                    <br><br>
                    Last week (July 16, 2020) the 
                    European Union’s Court of Justice decided on Facebook Ireland Ltd v. Maximillian Schrems in Case C 311/18 [7]. 
                    The decision of the court was that the “Commission Implementing Decision… on the adequacy of the protection 
                    provided by the EU-US Privacy Shield is invalid” [7]. This means that, effective immediately, companies 
                    dependent on the Privacy Shield for data transfers from the EU to the US must seek out a different legal 
                    bases for personal data transfer in order to avoid illegal transfers of Personally Identifiable Information 
                    (PII) under the General Data Protection Regulation (GDPR). 
                    <br><br>
                    The ruling was complex and can be found in here 
                    or in our bibliography, but it focused greatly on U.S. surveillance programmes such as FISA and PRISM being 
                    unjustly prioritized ahead of EU person’s rights and freedoms to data privacy and protection. In particular, 
                    they noted how in theory there are “a number of avenues of redress when they have been the subject of unlawful 
                    (electronic) surveillance for national security purposes… where judicial redress possibilities in principle do 
                    exist for non-U.S. persons… claims brought by individuals (including U.S. persons) will be declared inadmissible… 
                    which restricts access to ordinary courts”.
                </p>

                <!--    
                    #######################
                    power supply? what? why?
                    #######################
                 -->
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

                <!--    
                    #######################
                    Bibliography
                    #######################
                 -->
                <div class="section-title">Bibliography</div>
                <ol id="bibliography-ol">
                    <li>
                        Intel (2018). Desktop Platform Form Factors Power Supply Design Guide (Rev. 002) (Document No #336521). Available at: https://intel.ly/3fz2y3k.
                    </li>
                    <li>
                        Gigabyte (2020). The maximum power consumption of the connectors. [Web support]. Available at: https://www.gigabyte.com/Support/FAQ/2773
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