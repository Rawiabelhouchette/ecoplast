(function($) {
  "use strict";
  var supportdesk = {
      initialised: false,
      version: 1.0,
      mobile: false,
      init: function() {
          if (!this.initialised) {
              this.initialised = true;
          } else {
              return;
          }
          this.er_nav_menu(); 
          this.er_fix_menu_scroll();
          this.er_banner_slider(); 
          this.er_blog_slider(); 
          this.er_partner_slider(); 
          this.er_counter();
        },
  // nav menu toggle
      er_nav_menu: function() {
          $(document).on("click", function(event){
            var $trigger = $(".er_toggle");
              if($trigger !== event.target && !$trigger.has(event.target).length){
                  $("body").removeClass("er_menu_open");
              }            
          });
          $(".er_toggle").click(function(){
            // alert("hello");
            $("body").toggleClass("er_menu_open");
          });
      },
  // fix menu scroll
      er_fix_menu_scroll: function() {
        $(window).on('scroll', function () {
          if ($(window).scrollTop() > 300) {
                    $(".er-header-menu-wrapper").addClass("er-fixed");
              } else {
                  $(".er-header-menu-wrapper").removeClass("er-fixed");
        }
        });
      },

      er_fix_menu_scroll: function() {
        $(window).on('scroll', function () {
          if ($(window).scrollTop() > 300) {
                    $(".er-header-menu-wrapper").addClass("er-fixed");
              } else {
                  $(".er-header-menu-wrapper").removeClass("er-fixed");
        }
        });
      },
  // portfolio slider slider
      er_banner_slider: function() {
        var a = 0;
        var swiper = new Swiper(".er_banner_slider", {
          // direction: "vertical",
          // loop: true,
          slidesPerView: 1,
          // spaceBetween: 0,
          // centeredSlides: true,
          // direction: "vertical",
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + '">0' +(index + 1) + "</span>";
            },
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          }
        });
      },
  // portfolio slider slider
      er_blog_slider: function() {
        var swiper = new Swiper(".er_blog_slider", {
          loop: true,
          slidesPerView: 2,
          spaceBetween: 20,
          loop: true,
          speed: 3500,
          autoplay:{
            delay: 2000,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints:{
            0: {
              slidesPerView: 1,
              spaceBetween: 10,
            }, 
            992: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
          },
        });
      },
      er_partner_slider: function() {
        var swiper = new Swiper(".er_partner_slider", {
          loop: true,
          slidesPerView: 5,
          spaceBetween: 20,
          loop: true,
          speed: 3500,
          autoplay:{
            delay: 2000,
          },
          breakpoints:{
            0: {
              slidesPerView: 2,
              spaceBetween: 10,
            }, 
            576: {
              slidesPerView: 3,
              spaceBetween: 10,
            },
            992: {
              slidesPerView: 5,
              spaceBetween: 20,
            },
          },
        });
      },
      er_counter: function(){
          $.fn.jQuerySimpleCounter = function (options) {
            var settings = $.extend(
              {
                start: 0,
                end: 100,
                easing: "swing",
                duration: 400,
                complete: "",
              },
              options
            );
        
            var thisElement = $(this);
        
            $({
              count: settings.start,
            }).animate(
              {
                count: settings.end,
              },
              {
                duration: settings.duration,
                easing: settings.easing,
                step: function () {
                  var mathCount = Math.ceil(this.count);
                  thisElement.text(mathCount + "+");
                },
                complete: settings.complete,
              }
            );
          };
        
          $("#counting1").jQuerySimpleCounter({
            end: $("#counting1").data('to'),
            duration: 3000,
          });
          $("#counting2").jQuerySimpleCounter({
            end: $("#counting2").data('to'),
            duration: 3000,
          });
          $("#counting3").jQuerySimpleCounter({
            end: $("#counting3").data('to'),
            duration: 3000,
          });
          $("#counting4").jQuerySimpleCounter({
            end: $("#counting4").data('to'),
            duration: 3000,
          });
      
      },
  };
supportdesk.init();

} 
(jQuery));


function checkRequire(formId , targetResp){
  targetResp.html('');
  var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
  var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
  var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
  var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
  var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
  var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
  var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
  var check = 0;
  $('#er_msg').remove();
  var target = (typeof formId == 'object')? $(formId):$('#'+formId);
  target.find('input , textarea , select').each(function(){
      if($(this).hasClass('require')){
          if($(this).val().trim() == ''){
              check = 1;
              $(this).focus();
              $(this).parent('div').addClass('form_error');
              targetResp.html('You missed out some fields.');
              $(this).addClass('error');
              return false;
          }else{
              $(this).removeClass('error');
              $(this).parent('div').removeClass('form_error');
          }
      }
      if($(this).val().trim() != ''){
          var valid = $(this).attr('data-valid');
          if(typeof valid != 'undefined'){
              if(!eval(valid).test($(this).val().trim())){
                  $(this).addClass('error');
                  $(this).focus();
                  check = 1;
                  targetResp.html($(this).attr('data-error'));
                  return false;
              }else{
                  $(this).removeClass('error');
              }
          }
      }
  });
  return check;
}

$(".submitForm").on('click', function() {
  var _this = $(this);
  var targetForm = _this.closest('form');
  var errroTarget = targetForm.find('.response');
  var check = checkRequire(targetForm , errroTarget);
  
  if(check == 0){
     var formDetail = new FormData(targetForm[0]);
      formDetail.append('form_type' , _this.attr('form-type'));
      $.ajax({
          method : 'post',
          url : 'ajaxmail.php',
          data:formDetail,
          cache:false,
          contentType: false,
          processData: false
      }).done(function(resp){
          console.log(resp);
          if(resp == 1){
              targetForm.find('input').val('');
              targetForm.find('textarea').val('');
              errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
          }else{
              errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
          }
      });
  }
});


