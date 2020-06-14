<?php 
# Check if the user already has cookies or if they are in the EU

$in_eu_flag = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'in';
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
        content="Privacy policy. When you use GeeksExplained, you’re trusting us with your information. We only request the data necessary for our services to run.">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#009b48" />
    <title>Privacy policy | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Privacy policy | GeeksExplained" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geeksexplained.com/legal/privacy-policy" />
    <meta property="og:image" content="https://www.geeksexpalined.com/ge_assets/img/icon/ge200x200.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="The logo of GeeksExplained. A green letter G merging with the letter E.">
    <meta property="og:description" content="Privacy policy. When you use GeeksExplained, you’re trusting us with your information. We only request the data necessary for our services to run." />
    <meta property="og:locale" content="en_IE" />
    <meta property="og:locale:alternate" content="en_GB" />
    <meta property="og:site_name" content="GeeksExplained" />
    <!-- / Open Graph -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="../ge_assets/css/style.css">
    <link rel="stylesheet" href="privacy-policy.css">
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
                <div id="page-title">Privacy policy</div>

                <p>
                    This is the Privacy Policy for GeeksExplained, accessible from https://www.geeksexplained.com
                    <br><br>
                    We use your personal data for many reasons, from understanding how our users engage with our articles and 
                    content to informing our marketing and advertising. Ultimately, this allows us to publish the articles that 
                    you read on our site.
                    <br><br>
                    These are the main reasons why we collect and use data about our users:
                    <div class="list-spanner">
                        <ul>
                            <li>To show you articles that's relevant to you and to improve your experience on our site.</li>
                            <li>To provide the services you sign up for, such as the article notification.</li>
                            <li>To carry out marketing analysis and send you communications when we have your permission, 
                                and/or when permitted by law.</li>
                            <li>To enable us to show advertising on our sites</li>
                        </ul>
                    </div>
                    <br>
                    This privacy policy explains how we (GeeksExplained) collect, use, share and transfer your personal data when 
                    you use the services provided on geeksexplained.com (“our site”).
                    <br><br>
                    Personal data is any information about you by which you can be identified. This can include information such as:
                    <br><br>
                    <div class="list-spanner">
                        <ul>
                            <li>your name, date of birth, email address, postal address, phone number, mobile number;</li>
                            <li>debit card details;</li>
                            <li>information about your device (such as the IP address, which is a numerical code to identify your 
                                device that can provide information about the country, region or city where you are based); and</li>
                            <li>information relating to your personal circumstances and how you use our site.</li>
                        </ul>
                    </div>
                    <br>
                    Sometimes our site may contain links to third party sites and services. These sites and services have their own 
                    privacy policies. If you follow a link to a third party, you should read the privacy policy shown on their site.
                </p>
                    
                <div class="heading">Who we are and how to contact us</div>
                <p>
                    The data controller for our site is GeeksExplained. This means that we are responsible for deciding 
                    how and why we hold and process your personal data. If you want to contact us, please email 
                    <i>support@geeksexplained.com</i>.
                </p>

                <div class="heading">What personal data we collect and how we use it</div>
                <p>
                    We collect personal data when you sign up for our services and when you browse our site. 
                    This information is used to provide our articles and other services, display advertising and analyse how 
                    visitors use our site.
                </p>

                <div class="heading">The personal data we collect when you register for a GeeksExplained account</div>
                <p>
                    When you register for a GeeksExplained account on geeksexplained.com we collect:

                    <div class="list-spanner">
                        <ul>
                            <li>your name; and</li>
                            <li>your email address.</li>
                        </ul>
                    </div>
                    <br>
                    When you register for a GeeksExplained account, we assign you a unique ID number that we use to recognise you 
                    when you are signed in to our website. This will recognise you if you sign in using the same account on a new 
                    device.
                    <br><br>
                    When you use our site we may also use cookies or similar technology to collect extra data, including:
                    <br><br>
                    <div class="list-spanner">
                        <ul>
                            <li>your IP address - a numerical code to identify your device and which can provide information about 
                                the country, region or city where you are based;</li>
                            <li>your browsing history of the content you have visited on our sites, including information on 
                                how you were referred to our sites via another website; and</li>
                            <li>details of your devices, for example, the unique device ID, unique advertising ID and browsers 
                                used to access our content.</li>
                        </ul>
                    </div>
                    <br>
                    Some of our services may give you the option of providing more information about your preferences, so that we 
                    can tailor your experience. 
                    <br><br>
                    We will not collect special categories of data - such as information about your race, political opinions, 
                    religion, health or sexual orientation - unless you have chosen to provide that information to us.
                </p>

                <!-- This multiline comment is not part of the geeksexplained.com privacy policy. If it is added, it will follow the
                    methods stated in the "Changes to the Privacy Policy" section.

                <div class="heading">Using Facebook or Google to sign into your GeeksExplained account</div>
                    <br><br>
                    If you sign in to our site using your Facebook login details, you give permission to Facebook to share 
                    with us your email address and certain aspects of your Facebook profile if you have made these public on your 
                    Facebook profile. This only includes your first and last name, age range, link to your Facebook profile and profile 
                    picture. We do not have access to updates on your Facebook profile. If you use your Google login details, you 
                    give Google permission to share the information that you have made public in your Google profile. This only 
                    includes your first and last name, your email address and whether your email address has been validated, your 
                    age range, a link to your Google profile and, if you have one, your profile picture.
                    <br><br>
                    We will then use this information to form a profile for your Guardian account. If you remove the Guardian app 
                    from your Facebook settings, or if you remove the Guardian from your Google settings, we will no longer have 
                    access to this data. However, we will still have the information that we received when you first set up your 
                    Guardian account using your Facebook or Google login.
                    -->

                <div class="heading">How we collect personal data</div>
                <p>
                    We collect personal data when you:
                    <div class="list-spanner">
                        <ul>
                            <li>become a supporter or registering for an account on geeksexplained.com;</li>
                            <li>contribute to fund and support the GeeksExplained;</li>
                            <li>subscribe to our notification emails;</li>
                            <li>use mobile devices to access our content;</li>
                            <li>access our sites, through cookies and other similar technology; and</li>
                            <li>When you contact us via email or our contact form.</li>
                        </ul>
                    </div>
                </p>
                
                <div class="heading">Why we use you personal data</div>
                <p>
                    We use personal data collecte through out site for a number of purposes, including the following:
                    <div class="list-spanner">
                        <ul>
                            <li>To provide the services you sign up for, such as sending out subscriptions. We may also use the personal 
                                data for related internal administrative purposes - such as our accounting and records - and to make 
                                you aware of any changes to our services.</li>
                            <li>To send marketing and notification communications when we have your permission, or when permitted by law.</li>
                            <li>To personalise our services (for example, so you can sign in), remembering your settings, displaying 
                                personalised advertising as well as measuring how effective our online adverts are, recognising you 
                                when you sign in on different devices and tailoring our marketing and notification communications based on what you read 
                                on our sites.</li>
                            <li>To carry out marketing analysis, for example we look at what you have viewed on our site and 
                                what services you subscribe to (including what articles you read) to better understand what 
                                your interests and preferences are, and to improve our marketing and notifications by making it more relevant to your 
                                interests and preferences. You can opt out from having your personal data used for marketing analysis 
                                by going to the tab “Personalisation”.</li>
                            <li>To improve our marketing and notification communications, we may use a similar technology to cookies to confirm whether 
                                you have opened a marketing or notification email or clicked on a link in the email.</li>
                            <li>To sell advertising space on our site.</li>
                            <li>For statistical purposes such as analysing the performance of our site and to understand how visitors use it.</li>
                            <li>To respond to your queries and to resolve complaints.</li>
                            <li>To comply with applicable laws and regulations.</li>
                        </ul>
                        <br>
                    </div>
                </p>

                <div class="heading">Legal grounds for using your personal data</div>
                <p>
                    We will only use your personal data where we have a legal ground to do so. We determine the legal 
                    grounds based on the purposes for which we have collected and used your personal data. In every case, 
                    the legal ground will be one of the following:
                    <div class="list-spanner">
                        <ul>
                            <li><i>Consent:</i> For example, where you have provided your consent to receive emails from us. 
                                You can withdraw your consent at any time. In the case of marketing or notification emails you can withdraw 
                                your consent by clicking on the “unsubscribe” link at the bottom of the email.</li>
                            <li><i>Our legitimate interests:</i> Where it is necessary for us to understand our readers, 
                                promote our services and operate our site efficiently for the creation, publication and 
                                distribution of news, media and articles. For example, we will rely on our legitimate 
                                interest when we analyse what content has been viewed on our site, so that we can understand 
                                how they are used. It is also in our legitimate interest to carry out marketing analysis to 
                                determine what articles and services may be relevant to the interests of our readers. You 
                                can opt out from having your personal data used for marketing analysis in the 
                                “personalisation” tab.</li>
                            <li><i>Performance of a contract with you (or in order to take steps prior to entering into a contract 
                                with you):</i>For example, where you have donated to us and we need to use your contact 
                                details and payment information in order to process your donation.</li>
                            <li>Compliance with law: In some cases, we may have a legal obligation to use or keep your personal data.</li>
                        </ul>
                    </div>
                    When you register for an account with geeksexplained.com, you have access to a profile page. Under “edit 
                    profile” you cane update your information or provide extra information if you want.
                    <br><br>
                </p>

                <div class="heading">Using children’s personal data</div>
                <p>
                    We do not aim any of our products or services directly at children under the age of 13 and we do not 
                    knowingly collect personal data about children under 13. Some of our services may have a higher age 
                    restriction and this will be shown at the point of registration.
                </p>

                <div class="heading">Security of your personal data</div>
                <p>
                    We have implemented appropriate technical and organisational controls to protect your personal data against 
                    unauthorised processing and against accidental loss, damage or destruction. You are responsible for 
                    choosing a secure password when we ask you to set up a password to access parts of our site. You 
                    should keep this password confidential and you should choose a password that you do not use on any other 
                    site. You should not share your password with anyone else, including anyone from GeeksExplained.
                    Unfortunately, sending information via the internet is not completely secure. Although we will do 
                    our best to protect your personal data once with us, we cannot guarantee the security of any personal 
                    data sent to our site while still in transit and so you provide it at your own risk.
                </p>

                <div class="heading">Who we share your personal data with</div>
                <p>
                    We do not share your personal data with other people or organisations that are not directly linked to 
                    us except under the following circumstances:

                    <div class="list-spanner">
                        <ul>
                            <li>We may share your data with other organisations that provide services on our behalf such as 
                                dealing with online payments and other forms of payment processing, ie credit card transactions 
                                and preventing fraud.</li>
                            <li>We may also share your data with our advertising partners, as set out in the section about 
                                Online Advertising below.</li>
                            <li>We may reveal your personal data to any law enforcement agency, court, regulator, government 
                                authority or other organisation if we are required to do so to meet a legal or regulatory 
                                obligation, or otherwise to protect our rights or the rights of anyone else.</li>
                            <li>We may reveal your personal data to any other organisation that buys, or to which we transfer 
                                all, or substantially all, of our assets and business. If this sale or transfer takes place, 
                                we will use reasonable efforts to try to make sure that the organisation we transfer your 
                                personal data to uses it in line with our privacy policy.</li>
                        </ul>
                    </div>
                    <br>
                    We will not share your personal data with anyone else for their own purposes unless we have your 
                    permission to do this.
                </p>

                <div class="heading">International data transfers</div>
                <p>
                    Data we collect may be transferred to, stored and processed in any country or territory where one or more 
                    of our service providers are based or have facilities. While other countries or territories may not have 
                    the same standards of data protection as those in your home country, we will continue to protect personal 
                    data that we transfer in line with this privacy policy.
                    <br><br> 
                    Whenever we transfer your personal data out of the European Economic Area (EEA), we ensure similar 
                    protection and put in place at least one of these safeguards:
                    
                    <div class="list-spanner">
                        <ul>
                            <li>We will only transfer your personal data to countries that have been found to provide an 
                                adequate level of protection for personal data.</li>
                            <li>We may also use specific approved contracts with our service providers that are based in 
                                countries outside the EEA. These contracts give your personal data the same protection it 
                                has in the EEA .</li>
                            <li>Where we use service providers in the United States, we may transfer personal data to them 
                                if they commit to providing a similar level of protection of your personal data to what is 
                                required in the EEA.</li>
                        </ul>
                    </div>
                    If you are located in the EEA, you may contact us for a copy of the safeguards which we have put in place 
                    for the transfer of your personal data outside the EEA.
                </p>

                <div class="heading">How long we keep your personal data</div>
                <p>
                    We keep your personal data for only as long as we need to. How long we need your personal data depends on 
                    what we are using it for, as set out in this privacy policy. For example, we may need to use it to 
                    answer your queries about a product or service and as a result may keep personal data while you are still 
                    using our product or services. We may also need to keep your personal data for accounting purposes, 
                    for example, where you paid for a service or donation. If we no longer need your data, we will delete 
                    it or make it anonymous by removing all details that identify you. If we have asked for your permission 
                    to process your personal data and we have no other lawful grounds to continue with that processing, 
                    and you withdraw your permission, we will delete your personal data. However, when you unsubscribe 
                    from marketing or notification communications, we will keep your email address to ensure that we do not 
                    send you any marketing or notifications in future.
                </p>

                <div class="heading">Cookies and similar technology</div>
                <p>
                    When you visit our site, we may collect personal data from you automatically using cookies or similar technology. 
                    A cookie is a small file that can be placed on your device that allows us to recognise and remember you.
                    <br><br>
                    This privacy policy includes our <a href="cookie-policy">cookie policy</a>, where you can find details of our key advertising partners.
                </p>

                <div class="heading">Online advertising</div>
                <p>
                    Advertising on our sites that is based on cookies and similar technology
                    <br><br>
                    We use personalised online advertising on our sites. This allows us to deliver more relevant advertising to 
                    people who visit geeksexplained.com. It works by showing you adverts that are based on your browsing patterns 
                    and the way you have interacted with our site. It then shows you adverts which we believe may interest you.
                    <br><br>
                    When you browse our site, some of the cookies and similar technology we place on your device are advertising 
                    cookies, so we can understand what sort of pages you are interested in. We can then display advertising on 
                    your browser based on these interests.
                    <br><br>
                    We do not collect or use information such as your name, email address, postal address or phone number for 
                    personalised online advertising.
                    <br><br>
                    We may also share online data collected through cookies and similar technology with our advertising partners. 
                    This means that when you are on another website, you may be shown advertising based on your browsing patterns 
                    on geeksexplained.com. We may also show you advertising on geeksexplained.com website based on your browsing 
                    patterns on other sites that we have obtained from our advertising partners.
                    <br><br>
                    Online retargeting is another form of online advertising that allows us and some of our advertising partners 
                    to show you advertising based on your browsing patterns and interactions with a site away from our sites. For 
                    example, if you have visited the website of an online clothes shop, you may start seeing adverts from that same 
                    shopping site displaying special offers or showing you the products you were browsing. This allows companies to 
                    advertise to you if you leave their website without making a purchase.
                </p>

                <div class="heading">Advertising that we place on our site or on other sites</div>
                <p>
                    We also use personalised online advertising to promote our own products and services. This means that you may 
                    see advertising for our products and services on our site and when you are on other, third party websites, 
                    lincluding social media platforms.
                </p>

                <div class="heading">Your rights with regard to the personal data that we hold about you</div>
                <p>
                    You can contact us with regard to the following rights in relation to your personal data:
                    <div class="list-spanner">
                        <ul>
                            <li>If you would like to have a copy of the personal data we hold on you or if you think that we hold 
                                incorrect personal data about you, please email dataprotectionofficer@geeksexplained.com. We will 
                                deal with requests for copies of your personal data or for correction of your personal data within 
                                one month. If your request is complicated or if you have made a large number of requests, it may 
                                take us longer. We will let you know if we need longer than one month to respond. You will not have 
                                to pay a fee to obtain a copy of your personal data (or to exercise any of the other rights). 
                                However, we may charge a reasonable administration fee if your request is clearly unfounded, 
                                repetitive or excessive.</li>
                            <li>Where you have provided us with consent to use your personal data, you can withdraw this at any time.</li>
                            <li>Where applicable, you may also have a right to receive a machine-readable copy of your personal data.</li>
                            <li>You also have the right to ask us to delete your personal data or restrict how it is used. There 
                                may be exceptions to the right to erasure for specific legal reasons which, if applicable, we will 
                                set out for you in response to your request. Where applicable, you have the right to object to the
                                processing of your personal data for certain purposes.</li>
                            <li>If you do not want us to use your personal data for marketing analysis, you can change your settings 
                                in the “Personalisation” tab.</li>
                        </ul>
                    </div>
                    <br>
                    If you want to make any of these requests, please contact dataprotectionofficer@geeksexplained.com.
                    <br><br>
                    We may need to request specific information from you to help us confirm your identity.
                </p>

                <!--
                    This multiline comment is not part of the geeksexplained.com privacy policy. If it is added, it will follow the
                    methods stated in the "Changes to the Privacy Policy" section.

                <div class="heading">Your California privacy rights</div>
                <p>
                    Under California Civil Code Section 1798.83, if you live in California and your business relationship with us is 
                    mainly for personal, family or household purposes, you may ask us about the information we release to other 
                    organisations for their marketing purposes. To make such a request, please send an email to 
                    dataprotectionofficer@geeksexplained.com with “Request for California privacy information” in the subject line. You 
                    may make this type of request once every calendar year. We will email you a list of categories of personal data we 
                    revealed to other organisations for their marketing purposes in the last calendar year, along with their names 
                    and addresses. Not all personal data shared in this way is covered by Section 1798.83 of the California Civil Code.
                </p>
                -->

                <div class="heading">Changes to the Privacy Policy</div>
                <p>
                    If we decide to change our privacy policy we will post the changes here. If the changes are significant, we may 
                    also choose to email all our registered users with the new details. If required by law, we will get your permission 
                    or give you the opportunity to opt out of any new uses of your data.
                </p>
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