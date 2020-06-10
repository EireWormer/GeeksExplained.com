<!DOCTYPE html>
<html lang="en-IE"> 	
<head> 	
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
    <meta property="og:image" content="./ge_assets/img/icon/ge200x200.png">
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
                <li><a href="">Contact us</a></li>
                <li><a href="../legal/privacy-policy">Privacy policy</a></li>
                <li><a href="">@GeeksExplained, Some rights reserved</a></li>
            </ul>
        </footer>
    </article>
    
    <!-- scripts -->
    <script src="../ge_scripts/js/subPopupBox.js"></script>
    <script src="../ge_scripts/js/sideBarAnimation.js"></script>
</body> 	
</html>