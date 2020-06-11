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
        <?php include '../header.html' ?>

        <main>
            <article class="card polic-container">
                <div id="page-title">Cookie Policy</div>

                This is the Cookie Policy for GeeksExplained, accessible from https://www.geeksexplained.com

                <div class="heading">What are Cookies?</div>
                <p>
                    As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, 
                    to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. 
                    We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites 
                    functionality.
                    <br><br>
                    For more general information on cookies, please read <a href="https://www.cookieconsent.com/what-are-cookies/">"What Are Cookies"</a>.
                </p>

                <div class="heading">How We Use Cookies</div>
                <p>
                    We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry standard options for disabling cookies 
                    without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not 
                    sure whether you need them or not in case they are used to provide a service that you use.
                </p>
                
                <div class="heading">Disabling Cookies</div>
                <p>
                    You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that 
                    disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in 
                    also disabling certain functionality and features of this site. Therefore it is recommended that you do not disable cookies.
                </p>

                <div class="heading">The Cookies We Set</div>
                <p>
                    <div class="list-spanner">
                        <ul>
                            <li>
                                Account related cookies
                                <br><br>
                                If you create an account with us then we will use cookies for the management of the signup process and general administration. 
                                These cookies will usually be deleted when you log out however in some cases they may remain afterwards to remember your site 
                                preferences when logged out.
                                <br><br>
                            </li>
                            <li>
                                Login related cookies
                                <br><br>
                                We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single 
                                time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access 
                                restricted features and areas when logged in.
                                <br><br>
                            </li>
                            <li>
                                Forms related cookies
                                <br><br>
                                When you submit data to through a form such as those found on contact pages or comment forms cookies may be set to remember 
                                your user details for future correspondence.
                                <br><br>
                            </li>
                            <li>
                                Site preferences cookies
                                <br><br>
                                We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single 
                                time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access 
                                restricted features and areas when logged in.
                                <br><br>
                            </li>
                            <li>
                                Login related cookies
                                <br><br>
                                In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this 
                                site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called 
                                whenever you interact with a page is affected by your preferences.
                                <br><br>
                            </li>
                        </ul>
                    </div>
                </p>

                <div class="heading">Third Party Cookies</div>
                <p>
                    In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you 
                    might encounter through this site.
                    <div class="list-spanner">
                        <ul>
                            <li>
                                This site may use Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us 
                                to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how 
                                long you spend on the site and the pages that you visit so we can continue to produce engaging content.
                                <br><br>
                                For more information on Google Analytics cookies, see the official Google Analytics page.
                                <br><br>
                            </li>
                            <li>
                                Third party analytics are used to track and measure usage of this site so that we can continue to produce engaging content. 
                                These cookies may track things such as how long you spend on the site or pages you visit which helps us to understand how we 
                                can improve the site for you.
                            </li>
                            <li>
                                From time to time we test new features and make subtle changes to the way that the site is delivered. When we are still 
                                testing new features these cookies may be used to ensure that you receive a consistent experience whilst on the site whilst 
                                ensuring we understand which optimisations our users appreciate the most.
                            </li>
                            <li>
                                We may use the Google AdSense service. This servive, to serve advertising, may be use a DoubleClick cookie to serve more 
                                relevant ads across the web and limit the number of times that a given ad is shown to you.
                                <br><br>
                                For more information on Google AdSense see the official Google AdSense privacy FAQ.
                            </li>
                            <li>
                                We use adverts to offset the costs of running this site and provide funding for further development. The behavioural 
                                advertising cookies used by this site are designed to ensure that we provide you with the most relevant adverts where 
                                possible by anonymously tracking your interests and presenting similar things that may be of interest.
                            </li>
                            <!-- This comment is not a part of the cookie policy but may become part of the policy in the future. Any updates will be found in the update section of our privacy policy.
                            <li>
                                We also use social media buttons and/or plugins on this site that allow you to connect with your social network in 
                                various ways. For these to work the following social media sites including; Twitter, will set cookies through our 
                                site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes 
                                 in their respective privacy policies.
                            </li>
                            -->
                        </ul>
                    </div>
                </p>
                
                <div class="heading">More Information</div>
                <p>
                    Hopefully that has clarified things for you and as was previously mentioned if there is something that you aren't sure whether you need or not 
                    it's usually safer to leave cookies enabled in case it does interact with one of the features you use on our site. 
                    <br><br>
                    However if you are still looking for more information then you can email us at dataprotectionofficer@geeksexplained.com
                </p>
            </article>
        </main>

        <footer>
            <ul>
                <li><a href="../contact/contact">Contact us</a></li>
                <li><a href="./privacy-policy">Privacy policy</a></li>
                <li><a href="">@GeeksExplained, Some rights reserved</a></li>
            </ul>
        </footer>
    </article>

    <!-- scripts -->
    <script src="../ge_scripts/js/subPopupBox.js"></script>
    <script src="../ge_scripts/js/sideBarAnimation.js"></script>
</body> 	
</html>