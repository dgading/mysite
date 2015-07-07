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
    $("#site_nav").toggleClass( "show-nav" );
  });
  
  $("#site_nav li a").click(function() {
    if($("#nav-toggle").hasClass("active")) {
      $("#nav-toggle").toggleClass("active");
      $("#site_nav").toggleClass( "show-nav" );
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
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
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

