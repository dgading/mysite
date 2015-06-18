<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Daniel Gading, Front End Guy</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body id="lightbox">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
      
    <div id="wrap">
      
      <header class="flexcontainer">
        <h1 class="site-title">Daniel, Front End Guy</h1>
        <nav class="horiz-nav">
          <a id="nav-toggle" href="javascript:;"><span></span></a>
          <ul id="site_nav">
            <li><a href="#mywork">My Work</a></li>
            <li><a href="#aboutme">About Me</a></li>
            <li><a href="#contactme">Contact</a></li>
          </ul>
        </nav>
      </header>
      <aside class="welcome-message">
        <span>
          Hi, I'm Daniel!<br>
          Welcome to my little corner of the web.
        </span>
      </aside>
      <section class="container work lightbox" id="mywork">
        <h1 class="section-title">Some of My Work</h1>
        <ul class="recent-work">
					<li class="web">
            <a href="img/edlio-corp.jpg" data-large="img/edlio-corp.jpg" data-title="Click here to visit <a href='http://edlio.com' target='_blank'>edlio.com</a>" class="lightbox-trigger">
					    <figure>
					    	<img src="img/edlio-corp.jpg" alt="Edlio Corporate Site Updates">
					    	<figcaption>
					    		 <h2>Edlio.com</h2>
					    	</figcaption>
					    </figure>
            </a>
					</li>
          <li class="web">
              <a href="img/edlio-help.jpg" data-large="img/edlio-help.jpg" data-title="Click here to visit <a href='http://help.edlio.com' target='_blank'>help.edlio.com</a>" class="lightbox-trigger">
						    <figure>
						    	<img src="img/edlio-help.jpg" alt="Edlio Help Site">
						    	<figcaption>
						    		 <h2>Edlio Help Site</h2>
						    	</figcaption>
						    </figure>
              </a>
						</li>
          <li class="design">
              <a href="img/misfortune_book_cover.png" data-large="img/misfortune_book_cover.png" data-title="Thesis Cover" class="lightbox-trigger">
						    <figure>
						    	<img src="img/misfortune_book_cover.png" alt="Misfortune and Family Book Cover">
						    	<figcaption>
						    		 <h2>Thesis Cover</h2>
						    	</figcaption>
						    </figure>
              </a>
						</li>
          <li class="design">
              <a href="img/business_cards.png" data-large="img/business_cards.png" data-title="Business Cards" class="lightbox-trigger">
						    <figure>
						    	<img src="img/business_cards.png" alt="Business Card Designed">
						    	<figcaption>
						    		 <h2>Business Cards</h2>
						    	</figcaption>
						    </figure>
              </a>
						</li>
					</ul>
      </section>
      <section class="container about" id="aboutme">
        <h1 class="section-title">About Me</h1>
        <div class="bio">
        <p>
          If you've scrolled down this far, you've already seen what I can do, but you might still want to know a little about me. My background was originally in philosophy and illustration. Over time I've found myself being pulled towards the interactivity of the web. I look at every project as a puzzle just waiting to be solved. My first sites were completely sliced from PSDs, so the puzzle consisted of how do I make this site look good in a table. It's a lot more fun now with all the cool things CSS and Javascript can do on the web. Besides just my coding abilities, I've also gotten to lead an HTML support team, which focused on building all the things our proprietary CMS couldn't accomplish. I was able to help teach entry level coders new tools like Javascript and Sass markup, as well as educate clients on how the web works.  </p>
         <p>All that above isn't what you really wanted to know. Here are the important facts about me:
          <ol>
            <li>I like cats!</li>
            <li>I have way to many hours logged on Steam.</li>
            <li>I really like ::before and ::after.</li>
            <li>I'm terrible at basketball.</li>
            <li>I once ate an entire Snickers ice cream cake.</li>
          </ol>
          
          </p> 
        </div>
      </section>
      <section class="container contact" id="contactme">
        <h1 class="section-title">Get in Touch</h1>
        <?php
			    $name = $_POST['contact_name'];
			    $email = $_POST['contact_email'];
			    $message = $_POST['contact_message'];
	
	
				$from = 'From: DanielGading.com';
				$to = 'contact@danielgading.com';
				$subject = 'Contact Form Message';
	
			    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
	
			?>

        <?php
			if ($_POST) {
			    if (mail ($to, $subject, $body, $from)) { 
			        echo 'Thanks! I\'ll get back to you as soon as possible.';
			    } else { 
			        echo 'Something went wrong, please try again!'; 
			    }
			}
			?>
        
        <form class="contact-me" id="contact_me" method="post" action="index.php">
          <h2>Contact me directly</h2>
          <ul>
            <li>
              <input id="contact_name" name="contact_name" type="text" placeholder="Spiderman" />
              <label for="contact_name">Your Name</label>
            </li>
            <li>
              <input id="contact_email" name="contact_email" type="email" placeholder="peter@dailybugle.com"/>
              <label for="contact_email">Your Email</label>
            </li>
            <li>
              <textarea id="contact_message" name="contact_message" placeholder="Can I be an avenger?"></textarea>
              <label for="contact_message">Your Message</label>
            </li>
            <li>
              <input id="submit" name="submit" type="submit" value="Submit" />
            </li>
          </ul>
        </form>
        <nav class="social">
          <h2>Alternatively you can stalk me on these sites</h2>
          <ul>
            <li><a id="linkedin" href="https://www.linkedin.com/pub/daniel-gading/2a/2b1/209">LinkedIn</a></li>
            <li><a id="wordpress" href="http://www.illustratingtheweb.com">My Blog</a></li>
            <li><a id="github" href="https://github.com/dgading">Github</a></li>
          </ul>
        </nav>
        
      </section>
      <footer>
        &copy; 2015 Daniel Gading
      </footer>
      
      
<!-- 
Credits
infographic by Hayley Warren from the Noun Project
Landing Page by Azis from the Noun Project
design by Mateo Zlatar from the Noun Project

-->
      
    </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-18049112-1','auto');ga('send','pageview');
        </script>
    </body>
</html>
