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
    <meta name="description" content="In this GeeksExplained article, we explain EU court of justice's decision to invalidate EU-US Privacy Shield and how to continue with personal data transfer through Standard Contractual Clauses (SCCs).">
    <meta name="keywords" content="computer geek, programming, geeksexplained, geek, explained, casually explained">
    <meta name="theme-color" content="#009b48" />
    <title>Standard Contractual Clauses (SCCs) | GeeksExplained</title>
    <link rel="shortcut icon" href="https://www.geeksexplained.com/ge_assets/img/icon/favicon.ico" type="image/x-icon" />
    
    <!-- Open Graph  -->
    <meta property="og:title" content="Standard Contractual Clauses (SCCs) | GeeksExplained" />
    <meta property="og:type" content="article" />
    <meta property="article:published_time" content="2020-07-24T00:30:00" />
    <meta property="article:modified_time" content="2020-07-24T112:30:00" />
    <meta property="og:url" content="https://www.geeksexplained.com/article/2020/07/24/standard-contactual-clauses" />
    <meta property="og:image" content="https://www.geeksexplained.com/article/2020/07/24/social-media-image.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:image:alt" content="Maximillian Schrems vs Facebook Ireland Ltd.">
    <meta property="og:description" content="In this GeeksExplained article, we explain EU court of justice's decision to invalidate EU-US Privacy Shield and how to continue with personal data transfer through Standard Contractual Clauses (SCCs)." />
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
                    European Union’s Court of Justice decided on Facebook Ireland Ltd v. Maximillian Schrems in Case C 311/18 <sup>[7]</sup>. 
                    The decision of the court was that the <q cite="http://curia.europa.eu/juris/document/document.jsf;jsessionid=CF8C3306269B9356ADF861B57785FDEE?text=&docid=228677&pageIndex=0&doclang=EN&mode=req&dir=&occ=first&part=1&cid=9812784"><em>Commission Implementing Decision… on the adequacy of the protection 
                    provided by the EU-US Privacy Shield is invalid</em></q><sup>[7]</sup>. This means that, effective <strong>immediately</strong>
                    , companies 
                    dependent on the Privacy Shield for data transfers from the EU to the US must seek out a different legal 
                    bases for personal data transfer in order to avoid illegal transfers of Personally Identifiable Information 
                    (PII) under the General Data Protection Regulation (GDPR). 
                    <br><br>
                    The ruling was complex and can be found in here 
                    or in our bibliography, but it focused greatly on U.S. surveillance programmes such as FISA and PRISM being 
                    unjustly prioritized ahead of EU person’s rights and freedoms to data privacy and protection. In particular, 
                    they noted how in theory there are <q cite="http://curia.europa.eu/juris/document/document.jsf;jsessionid=CF8C3306269B9356ADF861B57785FDEE?text=&docid=228677&pageIndex=0&doclang=EN&mode=req&dir=&occ=first&part=1&cid=9812784"><em>a number of avenues of redress when they have been the subject of unlawful 
                    (electronic) surveillance for national security purposes… where judicial redress possibilities in principle do 
                    exist for non-U.S. persons… claims brought by individuals (including U.S. persons) will be declared inadmissible… 
                    which restricts access to ordinary courts</em></q><sup>[7]</sup>.
                </p>

                <!--    
                    #######################
                    Alternative… SCCs
                    #######################
                 -->
                <div class="section-title">Alternative… SCCs</div>
                <p>
                    Although Schrems also challenged the validity of SCCs, the court decided <q cite="http://curia.europa.eu/juris/document/document.jsf;jsessionid=CF8C3306269B9356ADF861B57785FDEE?text=&docid=228677&pageIndex=0&doclang=EN&mode=req&dir=&occ=first&part=1&cid=9812784">Examination of Commission Decision… 
                    on standard contractual clauses… has disclosed nothing to affect the validity of that decision</q><sup>[7]</sup>. This means that 
                    SCCs are still a valid offer of sufficient safeguards on data protection for the data to be transferred internationally. 
                    The European Commission website <sup>[1]</sup> directs us to three commission decisions that provide SCCs. These three 
                    decisions are:
                    <ul>
                        <li><strong>•</strong> Decision 2001/497/EC [2]</li>
                        <li><strong>•</strong> Decision 2004/915/EC [3]</li>
                        <li><strong>•</strong> Decision 2010/87/EU [4]</li>
                    </ul>
                    <br>
                    The SCCs can be divided up into two categories: data transfers from controllers in the EU to controllers outside the EU 
                    or European Economic Area (EEA); and data transfers from data controller in the EU to processors outside the EU or EEA.
                    <br><br>
                    The SCCs directly refer to the use of definitions from the Data Protection Directive (Directive 95/46/EC <sup>[5]</sup>). The 
                    commission is planning to update the SCCs for the GDPR. Until they do, you can still enter contracts based on the directive 
                    clauses.   
                    <br><br>
                    Below are the definitions of data controller and data processor as defined in Article 2 of the Data Protection Directive <sup>[5]</sup>:
                    <blockquote cite="https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:31995L0046&from=en">
                        <em>(d) 'controller' shall mean the natural or legal person, public authority, agency or any other body which alone or jointly with others determines the purposes and means of the processing of personal data; where the purposes and means of processing are determined by national or Community laws or regulations, the controller or the specific criteria for his nomination may be designated by national or Community law;
                        <br><br>(e) 'processor' shall mean a natural or legal person, public authority, agency or any other body which processes personal data on behalf of the controller;</em>
                    </blockquote>
                </p>

                <!--    
                    #######################
                    Finally, the SCCs
                    #######################
                 -->
                 <div class="section-title">Finally, the SCCs</div>
                <p>
                    A final important note about SCCs is that Directive 2004/915/EC Article 1 (1) specifies <q cite="https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32004D0915&from=EN"><em>Data controllers may choose either of the sets I or II in the Annex. However, they may not amend the clauses nor combine individual clauses or the sets</em></q>. 
                    Below are direct extracts from the official respective decisions that outline the SCCs.
                    <br><br><br>

                    <strong>The Clauses set out in Decision 2001/497/EC (or <a style="color: var(--primary);" href="./SCC-in-2001.pdf">click here to download</a>):</strong>
                    <br><br>
                    <iframe src="https://docs.google.com/viewer?url=https://www.geeksexplained.com/article/2020/07/23/SCC-in-2001.pdf&embedded=true" style="width:100%; height:75vh;" frameborder="0">
                        <p>
                        Sorry, it seems like your browser doesn't support Google Docs Viewer. 
                        To view the SCCs, you can download the PDF files by clicking <a href="./SCC-in-2001.pdf">here</a>.
                        </p>
                    </iframe>   
                    <br><br><br>

                    <strong>The Clauses set out in Decision 2004/915/EC (or <a style="color: var(--primary);" href="./SCC-in-2004.pdf">click here to download</a>):</strong>
                    <br><br>
                    <iframe src="https://docs.google.com/viewer?url=https://www.geeksexplained.com/article/2020/07/23/SCC-in-2004.pdf&embedded=true" style="width:100%; height:75vh;" frameborder="0">
                        <p>
                        Sorry, it seems like your browser doesn't support Google Docs Viewer. 
                        To view the SCCs, you can download the PDF files by clicking <a href="./SCC-in-2004.pdf">here</a>.
                        </p>
                    </iframe>   
                    <br><br><br>

                    <strong>The Clauses set out in Decision 2010/87/EC (or <a style="color: var(--primary);" href="./SCC-in-2010.pdf">click here to download</a>):</strong>
                    <br><br>
                    <iframe src="https://docs.google.com/viewer?url=https://www.geeksexplained.com/article/2020/07/23/SCC-in-2010.pdf&embedded=true" style="width:100%; height:75vh;" frameborder="0">
                        <p>
                        Sorry, it seems like your browser doesn't support Google Docs Viewer. 
                        To view the SCCs, you can download the PDF files by clicking <a href="./SCC-in-2010.pdf">here</a>.
                        </p>
                    </iframe>      
                </p>

                <!--    
                    #######################
                    Bibliography
                    #######################
                 -->
                <div class="section-title">Bibliography</div>
                <ol id="bibliography-ol">
                    <li>
                        [1] European Commission (April 15, 2020). “Standard Contractual Clauses (SCC)”. Available at: https://ec.europa.eu/info/law/law-topic/data-protection/international-dimension-data-protection/standard-contractual-clauses-scc_en (Accessed: 23 July 2020).
                    </li>
                    <li>
                        [2] COMMISSION DECISION of 15 June 2001 on standard contractual clauses for the transfer of personal data to third countries, under Directive 95/46/EC (Decision 2001/497/EC). Available at: https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32001D0497&from=en (Accessed: 23 July 2020).
                    </li>
                    <li>
                        [3] COMMISSION DECISION of 27 December 2004 amending Decision 2001/497/EC as regards the introduction of an alternative set of standard contractual clauses for the transfer of personal data to third countries (Decision 2004/915/EC). Available at: https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32004D0915&from=EN (Accessed: 23 July 2020).
                    </li>
                    <li>
                        [4] COMMISSION DECISION of 5 February 2010 on standard contractual clauses for  the  transfer  of  personal  data  to  processors  established  in  third  countries  under  Directive  95/46/EC  of  the  European  Parliament  and  of  the  Council (Decision 2010/87/EU). Available at: https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32010D0087&from=en (Accessed: 23 July 2020).
                    </li>
                    <li>
                        [5] DIRECTIVE 95/46/EC OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL of 24 October 1995 on the protection of individuals with regard to the processing of personal data and on the free movement of such data (Directive 95/46/EC). Available at: https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:31995L0046&from=en (Accessed: 23 July 2020).
                    </li>
                    <li>
                        [6] REGULATION (EU) 2016/679 OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL of 27 April 2016 on the protection of natural persons with regard to the processing of personal data and on the free movement of such data, and repealing Directive 95/46/EC (General Data Protection Regulation). Available at: https://eur-lex.europa.eu/legal-content/EN/TXT/PDF/?uri=CELEX:32016R0679&from=EN (Accessed: 23 July 2020).
                    </li>
                    <li>
                    [7] Judgment of the Grand Chamber of the European Court of Justice (16 July 2020). Available at: shorturl.at/lnMU0 (Accessed July 23, 2020).
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