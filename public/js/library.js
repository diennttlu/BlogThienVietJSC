$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function($) {
    var size;
  
    //fixed HEADER WHEN SCROLL PAGE
    function fixedMenu() {
        var sc = $(window).scrollTop();
        if (sc > 0) {
            $('#header-sroll').addClass('fixed');
            $('.content-main').css('margin-top','80px');
        }else {
            $('#header-sroll').removeClass('fixed');
            $('.content-main').css('margin-top','0');
        }
        if ($(window).width() < 992) {
            if (sc > 0) {
                $('.content-main').css('margin-top','50px');
            }else {
                $('.content-main').css('margin-top','0');
            }  
        }
    }

    // VERIFY WINDOW SIZE
    function windowSize() {
        size = $(document).width();
        if (size >= 991) {
            $('body').removeClass('open-menu');
            $('.hamburger-menu .bar').removeClass('animate');
        }
    };
     // ESC BUTTON ACTION
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            $('.bar').removeClass('animate');
            $('body').removeClass('open-menu');
            $('header .desk-menu .menu-container .menu .menu-item-has-children a ul').each(function( index ) {
                $(this).removeClass('open-sub');
            });
        }
    });

    // $('#cd-primary-nav > li').hover(function() {
    //     $whidt_item = $(this).width();
    //     $whidt_item = $whidt_item-8;

    //     $prevEl = $(this).prev('li');
    //     $preWidth = $(this).prev('li').width();
    //     var pos = $(this).position();
    //     pos = pos.left+4;
    //     $('header .desk-menu .menu-container .menu>li.line').css({
    //         width:  $whidt_item,
    //         left: pos,
    //         opacity: 1
    //     });
    // });

     // ANIMATE HAMBURGER MENU
    $('.hamburger-menu').on('click', function() {
        $('.hamburger-menu .bar').toggleClass('animate');
        if($('body').hasClass('open-menu')){
            $('body').removeClass('open-menu');
        }else{
            $('body').toggleClass('open-menu');
        }
    });

    // back
    $('header .desk-menu .menu-container .menu .menu-item-has-children ul').each(function(index) {
        $(this).append('<li class="back"><a href="#">Back</a></li>');
    });

    // RESPONSIVE MENU NAVIGATION
    $('header .desk-menu .menu-container .menu .menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
        if(size <= 991){
            $(this).next('ul').addClass('open-sub');
        }
    });

    // CLICK FUNCTION BACK MENU RESPONSIVE
    $('header .desk-menu .menu-container .menu .menu-item-has-children ul .back').on('click', function(e) {
        e.preventDefault();
        $(this).parent('ul').removeClass('open-sub');
    });

    $('body .over-menu').on('click', function() {
        $('body').removeClass('open-menu');
        $('.bar').removeClass('animate');
    });

    $(document).ready(function(){
        windowSize();
    });

    $(window).scroll(function(){
        fixedMenu();
    });

    $(window).resize(function(){
        windowSize();
    });






// show-hide-password
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(this).prev();
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});

// tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

// load more
$(document).ready(function() {
  
    var descMinHeight = $(".item-question").height();
    var desc = $('.answer-s-h');
    var descWrapper = $('.box-s-h');
    if (desc.height() > descWrapper.height()) {
      $('.more-info').show();
    }
    
    $('.more-info').click(function() {
      
      var fullHeight = $('.answer-s-h').height();

      if ($(this).hasClass('expand')) {
        // contract
        $('.box-s-h').animate({'height': descMinHeight}, 'slow');
      }
      else {
        // expand 
        $('.box-s-h').css({'height': descMinHeight, 'max-height': 'none'}).animate({'height': fullHeight}, 'slow');
      }

      $(this).toggleClass('expand');
      return false;
    });

  });

// ngăn xê dịch body khi modal on
$('.modal').on('show.bs.modal', function () {
  $("body").css('overflow', 'hidden');

    }).on("hidden.bs.modal", function () {
          $("body").css('overflow', 'auto');
});


// btn-icon-menu-mobie-USER
$(".box-btn-mb").on('click',function(){
    if ($(window).width() < 992) {
        $(".show-list").toggle(200);
        $(".box-btn-mb .fa").toggleClass("fa-times");
        $(".box-btn-mb .fa").toggleClass("fa-caret-down");
    }    
});


 // updown star
$('.add').click(function () {
    if ($(this).next().val() < 5) {
      $(this).next().val(+$(this).next().val() + 1);
      }
});
$('.sub').click(function () {
    if ($(this).prev().val() > 1) {
        if ($(this).prev().val() > 1) $(this).prev().val(+$(this).prev().val() - 1);
    }
});

// ckeck answer best
$(".ckeck").click(function(){
    $(this).toggleClass("active");
})

// add answer
let counter = 0;
$(document).on('click', '.add_more', function() {
    counter++;
    if (counter<5) {
         $('.select_color').append(` <div class="form_color">
              <input type="text" class="form-control">
              <input type="color" class="color_custom" value="#ff9be5">
          </div>`);
    }
});


// delete chat comment
// $('.btn_delete_chat').click(function() {
//        $(this).parent().parent().remove();
//     });


// Back to top
  $(".back-to-top a").click(function (n) {
      n.preventDefault();
      $("html, body").animate({
          scrollTop: 0
      }, 500)
  });
  $(window).scroll(function () {
      $(document).scrollTop() > 1e3 ? $(".back-to-top").addClass("display") : $(".back-to-top").removeClass("display")
  });


// show-less item comment
$(document).ready(function() {
  $('.box-comment .media').hide();
  $('.box-comment').find(' .media:lt(3)').show();
  
  $('.ShowMore').click(function(ev) {
    $(ev.currentTarget).parent().parent().find('.media').show();
    $(this).hide();
    $(".ShowLess").show();
  });

  $('.ShowLess').click(function(ev) {
    $(ev.currentTarget).parent().parent().find('.media').not(':lt(3)').hide();
    $(this).hide();
    $(".ShowMore").show();
  });
});

  
})(jQuery);




// upload avatar
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
} 

    

// CKeditor
  // ClassicEditor.create( document.querySelector( '#content' ) ).catch( error => {
  //   console.error( error );
  // } );

  // ckeditor ask question
  

    var allEditors = document.querySelectorAll('.ck_editor');
        for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i]);
    }