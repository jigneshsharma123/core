$(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.parent().addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.parent().removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','block');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }


var setAll = 0;
//Banner SLider
$(".banner").slick({
  dots: true,
  arrows: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,

  autoplay: false,
  //dots: true
  customPaging: function (slider, i) {
      var title = $(slider.$slides[i].innerHTML).find('div[data-title]').data('title');
      var mode = $(slider.$slides[i].innerHTML).find('div[data-mode]').data('mode');
     
     
      if (i == 0)
      {
       
          if (mode == "light")
          {
              setAll = 1;
              //return '<button class="pager__item classtoblack"> ' + title + ' </button>';
          }
          
      }
     
      if (setAll == 1) {
          return '<button class="pager__item classtoblack" type="button"> ' + title + ' </button>';
      }
      else {
          return '<button class="pager__item" type="button"> ' + title + ' </button>';
      }

    
  },
    
  //responsive: [{ 
  //    breakpoint: 200,
  //    settings: {
  ///        
  //    } 
  //}]
});

//Banner Slick slider Play/Pause
if (setAll == 1) {
    $("li.slick-active").addClass("classParent");
    //

    var m = $("#playPause").parent();

    
    $("#playPause").parent().addClass("slider-play-pause-black");
   // $("#playPause").parents().removeClass("slider-play-pause-white");
    //m.removeClass("slider-play-pause-white");
}


$('.banner').on('afterChange', function (event, slick, currentSlide) {
    
    var CurrentSlideDom = $(slick.$slides.get(currentSlide));


    var mode = CurrentSlideDom.find('div[data-mode]').data('mode');
    
    if (mode == "light") {
        $(".pager__item").addClass("classtoblack");
        $("#playPause").addClass("classtoblack");
        $("li.slick-active").addClass("classParent");
        $("#playPause").parent().addClass("slider-play-pause-black");
        $("#playPause").parent().removeClass("slider-play-pause-white");
    }
    else {
        $(".pager__item").removeClass("classtoblack");
        $("#playPause").removeClass("classtoblack");
        $(".classParent").removeClass("classParent");
        $("#playPause").parent().removeClass("slider-play-pause-black");
        $("#playPause").parent().addClass("slider-play-pause-white");
    }

});


//$('.banner').on('beforeChange', function (event, slick, currentSlide) {

//    var CurrentSlideDom = $(slick.$slides.get(currentSlide));


//    var mode = CurrentSlideDom.find('div[data-mode]').data('mode');

//    if (mode == "light") {
//        $(".pager__item").addClass("classtoblack");
//        $("#playPause").addClass("classtoblack");
//    }
//    else {
//        $(".pager__item").removeClass("classtoblack");
//        $("#playPause").removeClass("classtoblack");
//    }

//});


$(".cloud-revamp-slider-wrapper").length && ($(document).on("click", ".play", (function () {
        $(this).removeClass("play"), $(this).addClass("pause"), $(".cloud-revamp-slider").slick("slickPlay"), $(this).find(".playPauseText").text("Pause")
      })), $(document).on("click", ".pause", (function () {
        $(this).removeClass("pause"), $(this).addClass("play"), $(".cloud-revamp-slider").slick("slickPause"), $(this).find(".playPauseText").text("Play")
      }))), $(window).on("load", (function () {
        $(".cloud-revamp-slider-wrapper .slider-play-pause-white").appendTo(".cloud-revamp-slider-wrapper .slick-dots")
      })),

// Quick & dirty toggle to demonstrate modal toggle behavior
//$('.leadership-modal-toggle').on('click', function(e) {
//  e.preventDefault();
//  $('.leadership-modal').toggleClass('is-visible');
//});
//Supercharging Progress Page mCustomScrollbar

//Featured Trends and Insights

$(".about-us-slider").slick({
   dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  

$(document).ready(function() {
       
        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
            }
        });
    });


