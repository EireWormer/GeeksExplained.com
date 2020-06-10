<!DOCTYPE html>
<html lang="en-IE"> 	
<head> 	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | Oops, something went wrong | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />

    <!-- stylesheets -->
    <link rel="stylesheet" href="../ge_assets/css/style.css">
</head> 	
<body> 	
    <article id="page-container">
        <?php include '../header.html' ?>

        <main>
            <article class="card">
                <article class="container">
                    <div class="card_title">Sorry, something went wrong.</div>
            
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
                <li><a href="./contact">Contact us</a></li>
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