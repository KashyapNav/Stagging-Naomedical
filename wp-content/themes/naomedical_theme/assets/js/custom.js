/*Custom Code */
(function($){ 
    $(document).ready(function() {
        $(document).delegate('.menuToggle', 'click', function(event){
            $(this).toggleClass('active');
            $("body").toggleClass("noScroll");
            $(this).parent().toggleClass('openmenu');
            event.stopPropagation();
        });
        // $(document).delegate('click', function() {
        //     $('.menuToggle').removeClass('active');
        //     $('.menuToggle').parent().removeClass('openmenu');
        //     $("body").removeClass("noScroll");
        // })

       
        $('.nao-bannerSec').attr("data-aos", "fade-down");
        $('.nao-introsec .nao-intro_left').attr("data-aos", "fade-right");
        $('.nao-introsec .nao-intro_right').attr("data-aos", "fade-left");
        $('.nao-yellowsec').attr("data-aos", "fade-up");
        $('.nao-yellowsec').attr("data-aos", "fade-up");
        $('.nao-app-left').attr("data-aos", "fade-down");
        $('#naoapp-arrow-one .wp-block-button__link').attr("data-aos", "fade-down");

        AOS.init();
        
        // $('.testimonialSlider').slick({
        //     dots: false,
        //     rows:2,
        //     infinite: true,
        //     speed: 300,
        //     slidesToShow: 6,
        //     adaptiveHeight: true,
        //     infinite: false,
        //     centerMode: false,
        // });
        
      //testimonialSlider-review-slider
      $(document).ready(function(){
        $('.testimonialSlider').slick({   
        slidesToShow: 3,
        rows: 2,
        dots:false,
        centerMode: false,
        infinite: false,
        arrows: true,
        slidesToScroll: 2,
        
        responsive: [
            {
              breakpoint: 1440,
              settings: {
                slidesToShow: 3,
                rows: 2,
                slidesToScroll: 2,
                dots: false
              }
            },
            {
              breakpoint: 1120,
              settings: {
                slidesToShow: 2,
                rows: 1,
                slidesToScroll: 2,
                dots: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                rows: 1,
                slidesToScroll: 1,
                dots: false
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                rows: 1,
                slidesToScroll: 1,
                dots: false
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
      });
        
 

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
   

    // Assign active class to nav links while scolling
    $('.foruAnimate_sec').each(function(i) {
        if (($(this).position().top - 150) <= scrollDistance) {
                $('.foruAnimate_sec.active').removeClass('active');
                $(this).addClass('active');  
        }
    });
}).scroll();



$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();
   
    // Assign active class to nav links while scolling
    $('.forbusiness-box').each(function(i) {
        if (($(this).position().top - 220) <= scrollDistance) {
                $('.forbusiness-box.active').removeClass('active');
                $(this).addClass('active');  
        }
    });
}).scroll();


//Jquery datatabl
    $(document).ready( function () {

        $(document).on('click', '.provider_select', function(){ 
            var term_id     = $(this).data('term_id');
            var term_name   = $(this).data('term_name');
            $('#searchproviders').val(term_name);
            $('#term_id_select').val(term_id);
            $('#provider-list').remove();

        });

        $(document).on('click', '#search-provider', function(){

            $('#provider-list').html('');
            
        });

        $("#searchproviders").keyup(function(){
            var search = $(this).val();
            let length = search.length;
            if(length === 0){
                $(".max-search-width").html('');
                $('#provider-list').html('')
            }
        });


        // $('.myvisit').DataTable({
        //     "lengthChange": false,
        //     "showNEntries" : false,
        //     "bPaginate": false,
        //     "info": false,
        //     "responsive": true
        //     });
        $('#myTable_filter input').addClass('form-control search-icon'); // <-- add this line
        $('#myTable_filter input').attr("placeholder", "Search by Visit Type");
    });

    $(".career-rgh-border h4 span").each(function () {
        var $this = $(this),
            countTo = $this.attr("data-count");
        $({ countNum: $this.text() }).animate(
            { countNum: countTo },
            {
                duration: 2000,
                easing: "linear",
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                },
            }
        );
    });

    $( function() {
        function log( message ) {
          $( "<div>" ).text( message ).prependTo( "#log" );
          $( "#log" ).scrollTop( 0 );
        }
     
        $( "#searchproviders" ).autocomplete({
          source: function( request, response ) {

            $.ajax({
                type: "POST",
                url: ajax_url+'?action=searchProvider',
                data:'term='+request.term,
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    var obj = $.parseJSON( data );
                    $(".dropdown").show();
                    $(".dropdown").html(obj.provider);
                    $("#search-box").css("background","#FFF");
                }
                });

          },
          minLength: 2,
          select: function( event, ui ) {
              console.log(event, 'event event event event');
            log( "Selected: " + ui.item.value + " aka " + ui.item.id );
          }
        } );
      } );


      $(".search-inc").keyup(function(){
        var search = $(this).val();
        let length = search.length;
        var category = $('#select_category').val();
        if(length === 0){
            //insurancelist(category);
            $('.search-tab-result').html('');
        }else{
        
            $.ajax({
                type: "POST",
                url: ajax_url+'?action=searchinc',
                data : {searchinc:search},
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    var obj = $.parseJSON( data );
                    //categorytab(category, obj);
                    $('.search-tab-result').html(obj.inc);
                }
                });

            }

      });


      $('#google-reviews-slider').slick({ 
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
            {
            breakpoint: 1280,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: false
            }
            },
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
              breakpoint: 767,
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

  });  //document ready close



function insurancelist(category){
    $.ajax({
        type: "POST",
        url: ajax_url+'?action=insurancelist',
        data : {category:category},
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            var obj = $.parseJSON( data );
            
            categorytab(category, obj);
        }
        });
}


function categorytab(category, obj){
    if(category == '9'){
        $('.visitfees').html(obj.inc);
    }

    if(category == '10'){
        $('.vacciens-immigration-sorts').html(obj.inc);
    }


    if(category == '11'){
        $('.treatmentfees').html(obj.inc);
    }
    
    if(category == '12'){
        $('.procedurefees').html(obj.inc);
    }

    
    if(category == '13'){
        $('.specialized-testing-fees').html(obj.inc);
    }

    if(category == '14'){
        $('.blood-labtest-fees').html(obj.inc);
    }

    if(category == '15'){
        $('.otherfees').html(obj.inc);
    }

}

//contactslider
$(document).ready(function(){
    $('.carousel-contact-slider').slick({   
    slidesToShow: 4,
    dots:false,
    centerMode: false,
    infinite: false,
    arrows: true,
    slidesToScroll: 4,
    
    responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
});


jQuery(document).ready(function($) {

    $(".show-more").click(function () {
        if($(this).hasClass("show-class-info")) {
            $("show-more-height").show('10');
            $(this).text('Show More');
            $(this).removeClass("show-class-info");
            
        } else {
            $(this).addClass("show-class-info");
            $("show-more-height").hide('10');
            $(this).text('Show Less');
        }
        $(".las").toggleClass("show-more-height");
    });
    
});

$('#close-btntelemini').click(function () {
    $('.telemedicine-header').hide();
    event.stopPropagation();
});

$(document).ready(function(){
    // alert();
    var d = new Date();
    console.log(d.toLocaleString('en-US', { timeZone: 'America/New_York' }));
    var current = new Date();
    var dayOfWeek = current.getDay();
   // console.log(current.getDay(),'dayOfWeek');
   // console.log(current)
    jQuery('#tele-medicine').css('display','none');
     
    if(dayOfWeek === 6 || dayOfWeek  === 0){
        
        if(current.getHours() >= 20 && current.getHours() < 22){
            jQuery('#tele-medicine').css('display','block');
        }
    }else{
        if(current.getHours() >= 21 && current.getHours() <= 23){
            jQuery('#tele-medicine').css('display','block');
        }
    }
});


// jQuery(document).ready(function() {
//     setInterval(function(){ jQuery(".telemedicine-header").stop().slideToggle('slow'); }, 60000);
//        setInterval(function(){
//     //console.log(timeVal); 
// }, 60000);
//  });



// $(document).ready(function() {
//     setTimeout(function(){
//         document.getElementById('tele-medicine').classList.remove('tele-hide');
//         }, 5000);
    
// });

// jQuery(document).ready(function($) {
//     $( ".page-numbers" ).each(function() {
//         var page_number = $(this).attr("href");
//         console.log($(this).attr("href"));
//         $(this).attr("href","/blog/?query-18-page="+$(this).text());
//        // console.log($(this).text());
                   
//                 });
// });

jQuery(document).ready(function($) {
    $("#thumbnail-container img").hover(function() {
        var src = $(this).attr("src");
        $("#preview-enlarged img").attr("src", src);
        $('.thumbnail').removeClass('focused');
        $(this).addClass('focused');

    });
});


  
//customer-review-slider
$(document).ready(function(){
  $('.customer-review-slider').slick({   
  slidesToShow: 2,
  rows: 2,
  dots:true,
  centerMode: false,
  infinite: false,
  arrows: true,
  slidesToScroll: 2,
  
  responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 2,
          rows: 2,
          slidesToScroll: 2,
          dots: true
        }
      },
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 2,
          rows: 1,
          slidesToScroll: 2,
          dots: true
        }
      },
      {
        breakpoint: 1120,
        settings: {
          slidesToShow: 2,
          rows: 1,
          slidesToScroll: 2,
          dots: true
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          rows: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 620,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          rows: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});


//toprelated-service-slider
$(document).ready(function(){
    $('.sstop-related-slider').slick({   
    slidesToShow: 4,
    rows: 1,
    dots:false,
    centerMode: false,
    infinite: false,
    arrows: true,
    slidesToScroll: 2,
    
    responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            rows: 1
          }
        },
        {
          breakpoint:620,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            rows: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
});

//toprelated-service-slider
$(document).ready(function(){
    $('.toparticle-slider').slick({   
    slidesToShow: 3,
    dots:false,
    centerMode: false,
    infinite: false,
    arrows: true,
    slidesToScroll: 2,
    
    responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 620,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
});


//toprelated-service-slider
$(document).ready(function(){
  $('.subservice-slider').slick({   
  slidesToShow: 4,
  dots:false,
  centerMode: false,
  infinite: false,
  arrows: true,
  slidesToScroll: 2,
  
  responsive: [
      {
        breakpoint: 1120,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: false
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 620,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});

// $(function() {
//   function addScore(score, $domElement) {
//     $("<span class='stars-container'>")
//       .addClass("stars-" + score.toString())
//       .text("★★★★★")
//       .appendTo($domElement);
//   }

//   addScore(4, $("#fixture"));
// });




  //location-review-slider
  $(document).ready(function () {
    $('.location-review-slider').slick({
      slidesToShow: 3,
      dots: false,
      centerMode: false,
      infinite: false,
      arrows: true,
      slidesToScroll: 4,

      responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
  });


  //location-review-slider
  $(document).ready(function () {
    $('.location-as-slider').slick({
      slidesToShow: 4,
      dots: false,
      centerMode: false,
      infinite: false,
      arrows: true,
      slidesToScroll: 4,

      responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 620,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
  });



  //location-thumb-slider
  $(document).ready(function () {
    $('.location-thumb-slider').slick({
      slidesToShow: 3,
      dots: false,
      centerMode: false,
      infinite: false,
      arrows: true,
      slidesToScroll: 3,

      responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 620,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
      ]
    });

    // LOCATION MAP IMAGES SLIDER
    if($('.slick-track .location-thumb-div').length >0){
        var sLightbox = $('.slick-track');
        sLightbox.slickLightbox({
        src: 'src',
        itemSelector: '.location-thumb-div img'
        });
    }

  });


  
  //location-review-slider
  $(document).ready(function () {
    $('.career-testimonial-slider').slick({
      slidesToShow: 3,
      dots: false,
      centerMode: false,
      infinite: false,
      arrows: true,
      slidesToScroll: 4,

      responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 620,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
  });

jQuery(document).on('click','.appointment_modal',function(){
  var appointment_url = jQuery(this).data('appointment_url');
  if(appointment_url != ""){
    jQuery('#appointment_url').attr("href", appointment_url);
  }else{
    jQuery('#appointment_url').attr("href", 'https://naomedical.io/');
  }
  
  jQuery('#bookanapp').modal('show');
});

jQuery(document).ready(function(){
  jQuery("#single").select2({
    placeholder: "Search",
    allowClear: true
  });
});


$(document).ready(function(){
  // $(".os-review-box").slice(0, 6).show();
  // $("#loadMore").on("click", function(e){
  //   e.preventDefault();
  //   $(".os-review-box:hidden").slice(0, 6).slideDown();
  //   if($(".os-review-box:hidden").length == 0) {
  //     $("#loadMore").text("No Content").addClass("noContent");
  //   }
  // });

  // $("#view_more").click(function () {
  //   if($(".os-review-txt").hasClass("os-review-txt-height")) {
  //       $(this).text("(View Less)");
  //   } else {
  //       $(this).text("(View More)");
  //   }
  
  //   $(".os-review-txt").toggleClass("os-review-txt-height");
  // });

  // Configure/customize these variables.
  // var showChar = 180;  // How many characters are shown by default
  // var ellipsestext = "...";
  // var moretext = "View more";
  // var lesstext = "View less";
  

  // $('.os-review-txt').each(function() {
  //     var content = $(this).html();

  //     if(content.length > showChar) {

  //         var c = content.substr(0, showChar);
  //         var h = content.substr(showChar, content.length - showChar);

  //         var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

  //         $(this).html(html);
  //     }

  // });

  // $(".morelink").click(function(){
  //     if($(this).hasClass("less")) {
  //         $(this).removeClass("less");
  //         $(this).html(moretext);
  //     } else {
  //         $(this).addClass("less");
  //         $(this).html(lesstext);
  //     }
  //     $(this).parent().prev().toggle();
  //     $(this).prev().toggle();
  //     return false;
  // });

});


  //virtualcare-review-slider
  $(document).ready(function () {
    $('.virtualcare-cr-slider').slick({
      slidesToShow: 3,
      dots: false,
      centerMode: false,
      infinite: false,
      arrows: true,
      slidesToScroll: 4,

      responsive: [
        {
          breakpoint: 1120,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false
          }
        },
        {
          breakpoint: 990,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 620,
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
  });


//   $(document).ready(function() {
// 		$('a[href*=#]').bind('click', function(e) {
// 				e.preventDefault(); // prevent hard jump, the default behavior

// 				var target = $(this).attr("href"); // Set the target as variable

// 				// perform animated scrolling by getting top-position of target-element and set it as scroll target
// 				$('html, body').stop().animate({
// 						scrollTop: $(target).offset().top
// 				}, 500, function() {
// 						location.hash = target; //attach the hash (#jumptarget) to the pageurl
// 				});

// 				return false;
// 		});
// });

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();
		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
		// Assign active class to nav links while scolling
		$('.uscis-scroll').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.uscis-panel ul li a.active').removeClass('active');
						$('.uscis-panel ul li a').eq(i).addClass('active');
				}
		});
}).scroll();

$(document).ready(function(){
	$(".top-categories-div ul li").click(function(){
		$(".top-categories-div ul li.active").removeClass("active");
		$(this).addClass("active")
	})

  $(".faq-sidebar ul li a").click(function(){
		$(".faq-sidebar ul li a.active").removeClass("active");
		$(this).addClass("active")
	})

  if($(".mainMenu .main-navigation ul#primary-menu li.mega-menu > ul.sub-menu > li").hasClass("menu-item-has-children")) {
      $(".mainMenu .main-navigation ul#primary-menu li.mega-menu > ul.sub-menu > li.menu-item-has-children").append("<span class='dropdownArrrow'></span>"); 
  }

  $(".mainMenu .main-navigation ul#primary-menu li.mega-menu > ul.sub-menu > li.menu-item-has-children span").click(function(e){
      e.preventDefault();
      var currentIsActive = $(this).hasClass('active');
      $('.mainMenu .main-navigation ul>li.mega-menu>ul.sub-menu>ol.sub-list').find('li >span*').removeClass('active');
      $('.mainMenu .main-navigation ul>li.mega-menu>ul.sub-menu>ol.sub-list').find('li >ul.sub-menu*').slideUp();
      if(currentIsActive != 1) {
        $(this).addClass("active")
        $(this).prev('ul.sub-menu').slideDown();
      }
  })


$(function($) {
    var num_cols = 4,
    container = $('.mainMenu .main-navigation ul>li.mega-menu>ul.sub-menu'),
    listItem = $('.mainMenu .main-navigation ul>li.mega-menu>ul.sub-menu > li'),
    listClass = 'sub-list';
    container.each(function() {
        var items_per_col = new Array(),
        items = listItem,
        min_items_per_col = Math.floor(items.length / num_cols),
        difference = items.length - (min_items_per_col * num_cols);
        for (var i = 0; i < num_cols; i++) {
            if (i < difference) {
                items_per_col[i] = min_items_per_col + 1;
            } else {
                items_per_col[i] = min_items_per_col;
            }
        }
        for (var i = 0; i < num_cols; i++) {
            $(this).append($('<ol ></ol>').addClass(listClass));
            for (var j = 0; j < items_per_col[i]; j++) {
                var pointer = 0;
                for (var k = 0; k < i; k++) {
                    pointer += items_per_col[k];
                }
                $(this).find('.' + listClass).last().append(items[j + pointer]);
            }
        }
    });
  });

});


//special offer slider
$('.slick-offer').slick({
  dots: false,
  infinite: true,
  touchThreshold : 100,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
centerMode: true,
centerPadding: '240px',
nextArrow: '<button class="slick-next"></button>',
prevArrow: '<button class="slick-prev"></button>',
  responsive: [{
          breakpoint: 1024,
          settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
          }
      },
      {
          breakpoint: 600,
          settings: {
              slidesToShow:1,
              slidesToScroll: 1
          }
      },
      {
          breakpoint: 480,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }
  ]
});

jQuery(".occ_health_button").on('click', function() {
  jQuery("#occ_health_popup").modal('show');
}); 

jQuery(".landing_form-button").on('click', function() {
  jQuery("#landing_form_popup").modal('show');
}); 

jQuery(".reusable_title").click(function() {
  if (jQuery(this).hasClass('active')) {
    jQuery(this).removeClass('active');
    jQuery(this).siblings('.reusable_body').slideUp(200);
  } else {   
    jQuery('.reusable_body').slideUp(200);
    jQuery('.reusable_title').removeClass('active');
    
    /* or use not()
    $('.toggle-inner').not($(this).siblings()).slideUp(200);
    $('.toggle-title').not($(this)).removeClass('active');*/
    
    jQuery(this).addClass('active');
    jQuery(this).siblings('.reusable_body').slideDown(200);   
  }
});

jQuery(window).scroll(function() {
  var scrollDistance = jQuery(window).scrollTop();
  // Assign active class to nav links while scolling
  jQuery('.faq-content').each(function(i) {
      if (jQuery(this).position().top <= scrollDistance) {
        jQuery('.faq-sidebar ul li a.active').removeClass('active');
        jQuery('.faq-sidebar ul li a').eq(i).addClass('active');
      }
  });
}).scroll();

})(jQuery)

