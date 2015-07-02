// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

$(document).ready(function(){
  
  document.querySelector( "#nav-toggle" )
    .addEventListener( "click", function() {
    this.classList.toggle( "active" );
    $("#site_nav").toggleClass( "show-nav" )
  });
  
  $("#site_nav li a").click(function() {
    if($("#nav-toggle").hasClass("active")) {
      console.log("sigoisng");
      $("#nav-toggle").toggleClass("active");
      $("#site_nav").toggleClass( "show-nav" )
    }
  });
  
var wrap = $("#wrap");
var fixedHeight = ($(window).innerHeight() * 0.7);
	$(window).on("scroll", function(e) { 
  if ($(window).scrollTop() > fixedHeight) {
    wrap.addClass("fix-header");
  } else {
    wrap.removeClass("fix-header");
  }
  
});
  
var welcome = $(".welcome-message span");
var siteHeader = $(".site-title");
var moveText = ($(window).innerHeight() * 0.5);
	$(window).on("scroll", function(e) { 
  if ($(window).scrollTop() > 10) {
    welcome.addClass("remove-text");
    siteHeader.addClass("show");
  } else {
    welcome.removeClass("remove-text");
    siteHeader.removeClass("show");
  }
  
});

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      
      if (target.hasClass('focus-section')) {
        return false;    
      }
	   $('.container').removeClass('focus-section');
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      console.log($('[name=' + this.hash.slice(1) +']'));
      if (target.length) {
        $("html, body").animate({
          scrollTop: target.offset().top - 70
        }, 1000);
		    target.addClass('focus-section');
        return false;
      }
    }
  });
});
  
  
//LIGHTBOX
	
	var item, img, title, large_img;
	var CW, CH, CL, CT, hpadding, vpadding, imgtag;
	//Flag for preventing multiple image displays
	var lb_loading = false;
	var doc = $(document);
	
	
	$(".lightbox li").click(function(){
		if(lb_loading) return false;
		lb_loading= true;
		event.preventDefault();
		
		item = $(this);
		img = item.find("img");
		title = $("a", this).attr("data-title");
		//Remove active class from previously clicked LI
		$(".lightbox li.active").removeClass("active");
		//Mark the clicked LI as active for later use
		item.addClass("active");
		
		//The large image
		large_img = new Image();
		//Use data-large or the src itself if large image url is not available
		large_img.src = $("a", this).attr("data-large") ? $("a", this).attr("data-large") : img.attr("src");
		
		//Adding additional HTML - only if it hasn't been added before
		if($(".lb_backdrop").length < 1)
      console.log(large_img.src);
		{
			var lb_backdrop = '<div class="lb_backdrop"></div>';
			var lb_canvas = '<div class="lb_canvas"></div>';
			var lb_previous = '<span class="lb_previous"><</span>';
			var lb_title = '<span class="lb_title"></span>';
			var lb_next = '<span class="lb_next">></span>';
			var lb_controls = '<div class="lb_controls">'+lb_previous+lb_title+lb_next+'</div>';
			var total_html = lb_backdrop+lb_canvas+lb_controls;
			
			$(total_html).appendTo("body");
		}
		//Fade in lightbox elements if they are hidden due to a previous exit
		if($(".lb_backdrop:visible").length == 0)
		{
			$(".lb_backdrop, .lb_canvas, .lb_controls").fadeIn("slow");
		}
		
		//Display preloader till the large image loads and make the previous image translucent so that the loader in the BG is visible
		if (!large_img.complete) 
			$(".lb_canvas").addClass("loading").children().css("opacity", "0.5")
		
		//Disabling left/right controls on first/last items
		if (item.prev().length == 0) {
			$(".lb_previous").addClass("inactive");
		} else {
			$(".lb_previous").removeClass("inactive");
		}
		
		 if (item.next().length == 0) {
			$(".lb_next").addClass("inactive");
		} else {
			$(".lb_next").removeClass("inactive");
		}
			
		//Centering .lb_canvas
		CW = $(".lb_canvas").outerWidth();
		CH = $(".lb_canvas").outerHeight();
		//top and left coordinates
		CL = ($(window).width() - CW)/2;
		CT = ($(window).height() - CH)/2;
		$(".lb_canvas").css({top: CT, left: CL});
		
		//Inserting the large image into .lb_canvas once it's loaded
		$(large_img).load(function(){
			//Recentering .lb_canvas with new dimensions
			CW = large_img.width;
			CH = large_img.height;
			//.lb_canvas padding to be added to image width/height to get the total dimensions
			hpadding = parseInt($(".lb_canvas").css("paddingLeft")) + parseInt($(".lb_canvas").css("paddingRight"));
			vpadding = parseInt($(".lb_canvas").css("paddingTop")) + parseInt($(".lb_canvas").css("paddingBottom"));
			CL = ($(window).width() - CW - hpadding)/2;
			CT = ($(window).height() - CH - vpadding)/2;
			
			//Animating .lb_canvas to new dimentions and position
			$(".lb_canvas").html("").animate({width: CW, height: CH, top: CT, left: CL}, 500, function(){
				//Inserting the image but keeping it hidden
				imgtag = '<img src="'+large_img.src+'" style="opacity: 0;" />';
				$(".lb_canvas").html(imgtag);
				$(".lb_canvas img").fadeTo("slow", 1);
				//Displaying the image title
				$(".lb_title").html(title);
				
				lb_loading= false;
				$(".lb_canvas").removeClass("loading");
			});
		});
	});
	
	//Click based navigation
	doc.on("click", ".lb_previous", function(){ navigate(-1) });
	doc.on("click", ".lb_next", function(){ navigate(1) });
	doc.on("click", ".lb_backdrop", function(){ navigate(0) });
	
	//Keyboard based navigation
	doc.keyup(function(e){
		//Keyboard navigation should work only if lightbox is active which means backdrop is visible.
		if($(".lb_backdrop:visible").length == 1)
		{
			//Left
			if(e.keyCode == "37") navigate(-1);
			//Right
			else if(e.keyCode == "39") navigate(1);
			//Esc
			else if(e.keyCode == "27") navigate(0);
		}
	});
	
	//Navigation function
	function navigate(direction)
	{
		if(direction == -1) // left
			$(".lightbox li.active").prev().trigger("click");
		else if(direction == 1) //right
			$(".lightbox li.active").next().trigger("click");
		else if(direction == 0) //exit
		{
			$(".lightbox li.active").removeClass("active");
			$(".lb_canvas").removeClass("loading");
			//Fade out the lightbox elements
			$(".lb_backdrop, .lb_canvas, .lb_controls").fadeOut("slow", function(){
				//empty canvas and title
				$(".lb_canvas, .lb_title").html("");
			})
			lb_loading= false;
		}
	}	
});
  



$('#submit').on('mousedown', function(e){
  e.preventDefault();
  var $this = $(this),
      offset = $this.offset(),
      offsetY = (e.pageY - offset.top),
      offsetX = (e.pageX - offset.left);

  $this.addClass('clicked').append(
    $('<span class="btn-circle"></span>')
      .css({
        'top' : offsetY,
        'left' : offsetX
      })
  );
}).on('mouseup mouseout', function(e){
  e.preventDefault();
  var $this = $(this);
  
  $this.removeClass('clicked')
    .children().fadeOut(function(){
      $(this).remove();
    });
});




//	//CONTACT CODE
//	
//	$('#contact_me').on('submit', function(e) {
//	        e.preventDefault();
//			$.ajax({
//			    url: $("#contact_me").attr("action"),
//			    type: $("#contact_me").attr("method"),
//			    data: $("#contact_me").serialize(),
//			    success: function(data) {
//			        //do something with the data returned from the PHP page.
//			        alert("Thanks! I\'ll get back to you as soon as possible.");
//			    }
//			});
//	    });