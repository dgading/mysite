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

// Sticks the header to the top of the page
//$(window).scroll(function(eventObject) {
//  // do stuff! You can find out about how far the window has scrolled via the eventObject.
//  $el = $('header');
//    if ($(this).scrollTop() > 300 && $el.css('position') != 'fixed') {
//        $('header').css({ 'position': 'fixed', 'top': '0', 'left':'0', 'right':'0', 'z-index':'999', 'height':'10vh'});
//		$('header + .container').css({ 'margin-top': '78px'});
//    }
//    if ($(this).scrollTop() < 300 && $el.css('position') == 'fixed') {
//        $('header').css({ 'position': 'relative', 'top': '', 'left':'', 'right':'', 'height':'90vh' });
//		$('header + .container ').css({ 'margin-top': '0'});
//    }
//});

var wrap = $("#wrap");
var initHeight = ($(window).height() * 0.75)
	$("#wrap").on("scroll", function(e) {
    
  if (this.scrollTop > initHeight) {
    wrap.addClass("fix-header");
    
  } else {
    wrap.removeClass("fix-header");
  }
  
});

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
	   $('.container').removeClass('focus-section');
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      console.log($('[name=' + this.hash.slice(1) +']'));
      if (target.length) {
        $("body, #wrap").animate({
          scrollTop: target.offset().top - 60 
        }, 1000);
		target.addClass('focus-section');
        console.log(target.offset().top - 60);
        return false;
      }
    }
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