<!doctype html>
<html class="no-js" lang="" ng-app="myApp">
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
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
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
            <li><a href="#my_work">My Work</a></li>
            <li><a href="#about_me">About Me</a></li>
            <li><a href="#contact_form">Contact</a></li>
          </ul>
        </nav>
      </header>
      <aside class="welcome-message">
        <span>
          Hi, I'm Daniel!<br>
          Welcome to my little corner of the web.
        </span>
      </aside>
      <section class="container work lightbox" id="my_work">
        <h1 class="section-title">Some of My Work</h1>
        <ul class="recent-work">
          <li>
					 <figure>
					 	<img src="img/phoenixclc.jpg" alt="Phoenix Community Learning Center">
					 	<figcaption>
					 		<h2>Phoenix Community Learning Center</h2>
              <span class="tech">HTML, Scss, Java</span>
              Recent PSD to HTML slice on Edlio's CMS. Using a mix of flexbox and custom mixins, the site is built to meet accesibility standards and play well with as many browsers as possible, including IE9. 
              <span class="site-link"><a href="http://www.phoenixclc.org">Visit the Site</a></span>
					 	</figcaption>
					 </figure>
					</li>
          <li>
					 <figure>
					 	<img src="img/fabensisd.jpg" alt="Fabens Independent School District">
					 	<figcaption>
					 		<h2>Fabens Independent School District</h2>
              <span class="tech">HTML, Scss, Java</span>
              PSD to HTML slice using Edlio's CMS. The trickest part was the infitely stretching blue and grey homepage decoration. 
              <span class="site-link"><a href="http://www.fabensisd.net">Visit the Site</a></span>
					 	</figcaption>
					 </figure>
					</li>
					<li>
					 <figure>
					 	<img src="img/edlio-corp.jpg" alt="Edlio Corporate Site Updates">
					 	<figcaption>
					 		<h2>Edlio</h2>
              <span class="tech">HTML, PHP, CSS</span>
              I didn't code the initial website, but maintained it for 2 years. Some of the tasks included addding new portfolio items, building custom contact pages, responsive landing pages for HTML email campaigns.
              <span class="site-link"><a href="http://www.edlio.com">Visit the Site</a></span>
					 	</figcaption>
					 </figure>
					</li>
          <li>
					 <figure>
					 	<img src="img/edlio-help.jpg" alt="Edlio Help Site">
					 	<figcaption>
					 		<h2>Edlio Help Site</h2>
              <span class="tech">HTML, PHP, CSS, JQuery</span>
              Gave the site a face lift adding new articles and some JQuery UI elements. 
              <span class="site-link"><a href="http://help.edlio.com">Visit the Site</a></span>
					 	</figcaption>
					 </figure>
					</li>
					</ul>
      </section>
      <section class="container about" id="about_me">
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
      <section class="container contact" id="contact_form">
        <h1 class="section-title">Get in Touch</h1>
        <form id="contact_me" class="contact-me" name="contactMe" ng-controller="ReviewController as reviewCtrl" ng-submit="submitForm()" novalidate >
          <h2>Contact me directly</h2>
          <div class="success" ng-show="success && contactMe.name.$pristine && contactMe.email.$pristine">Thanks! I'll try to get back to you as soon as possible.</div>
          <ul>
            <li>
              <input id="name" name="name" type="text" placeholder="Spiderman" ng-model="formData.name" required />
              <label for="name">Your Name</label>
              <span class="help-block" ng-show="errorName">{{ errorName }}</span> 
            </li>
            <li>
              <input id="email" name="email" type="email" placeholder="peter@dailybugle.com" ng-model="formData.email" required />
              <label for="email">Your Email</label>
              <span class="help-block" ng-show="errorName">{{ errorEmail }}</span>
              <span ng-show="contactMe.email.$invalid && !contactMe.email.$pristine" class="help-block">A valid email is required.</span>
            </li>
            <li>
              <textarea id="body" name="body" placeholder="Can I be an avenger?" ng-model="formData.body" required ></textarea>
              <label for="body">Your Message</label>
              <span class="help-block" ng-show="errorName">{{ errorBody }}</span> 
            </li>
            <li>
              <input id="submit" name="submit" type="submit" value="Submit"  />
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
