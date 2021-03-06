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
    include './ge_scripts/php/is_in_eu.php';
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
    <script async src="https://cse.google.com/cse.js?cx=010287655288996069757:hr-e9mhjfue"></script>

    <!-- metadata -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" 
        content="The geek to English transalor. Well written and descriptive articles that take computer science, 
            programming, and security concepts and explains them in an easy-to-understand way.">
    <meta name="keywords" content="computer geek, programming, geeksexplained, geek, explained, casually explained">
    <meta name="theme-color" content="#009b48" />
    <title>GeeksExplained | The geek to English translator</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="GeeksExplained | The geek to English translator" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geeksexplained.com/" />
    <meta property="og:image" content="https://www.geeksexplained.com/ge_assets/img/icon/ge200x200.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="The logo of GeeksExplained. A green letter G merging with the letter E.">
    <meta property="og:description" 
        content="The geek to English transalor. Tech news and well written and descriptive articles that take computer science, 
            programming, security and other concepts and explains them in an easy-to-understand way." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="./ge_assets/css/style.css">
    <link rel="stylesheet" href="./ge_assets/css/homepage.css">
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
        <?php include './header.html' ?>

        <main>
            <article class="all_posts">
                <?php 
                include './ge_scripts/php/print_article_summary.php'; 
                #167 character summary
                $title = "Standard Contractual Clauses (SCCs)";
                $summary = "Last week (July 16, 2020) the European Union’s Court of Justice decided on Facebook Ireland Ltd v. Maximillian Schrems in Case C 311/18.  The decision of the court was";
                $link = "./article/2020/07/23/standard-contactual-clauses";
                printArticleSummary($title, $summary, $link);
                
                $title = "Power supply (and all it's cables)";
                $summary = "When I built my first personal computer, I can remember the confusion of the entire process. There were so many different components to keep track of; however, the pow";
                $link = "./article/2020/07/08/power-supply-and-all-its-cables";
                printArticleSummary($title, $summary, $link);
                ?>
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
    <script> 
        window.onload = function cleanup() {
            var elem = document.getElementById("___gcse_0");
            if (elem) {
                elem.style.visibility = "hidden";
            }
        }
    </script>
</body>
</html>