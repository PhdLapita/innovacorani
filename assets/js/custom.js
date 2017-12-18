
/**
 * FOTOS PORTADA
 * @return
 */
$(document).ready(function(){


  $("#example, #header").vegas({
    slides: [
        { src: "/img/slider/1.jpg" },
        { src: "/img/slider/2.jpg" },
        { src: "/img/slider/3.jpg" },
        { src: "/img/slider/4.jpg" },
        { src: "/img/slider/5.jpg" }
    ],
     overlay: '/assets/vegas/overlays/07.png'
});

});


$(document).ready(function(){

  $('#success').slideDown(400,function(){

    setTimeout(function(){
          $('#success').slideUp();
    },1500);
  })

});



/**
 * LOGOS
 * @return
 */

$(document).ready(function(){
  $('.customer-logos').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 3
      }
    }]
  });
});





// Find all YouTube videos
var $allVideos = $("iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $("body");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

  $(this)
    .data('aspectRatio', this.height / this.width)

    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

  var newWidth = $fluidEl.width();

  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {

    var $el = $(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

  });

// Kick off one resize to fix all videos on page load
}).resize();
