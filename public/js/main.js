$('.autoplay').slick({
slidesToShow: 6,
slidesToScroll: 1,
autoplay: true,
autoplaySpeed: 2000,
pauseOnFocus: false,
pauseOnHover: false,
arrows: true,
dots: false,
// centerMode: true,
prevArrow: '<img class="slick-prev slick-arrow img-fluid image__slick-prev" src="images/main/slider/arrow-left.svg">',
nextArrow: '<img class="slick-next slick-arrow img-fluid image__slick-next" src="images/main/slider/arrow-right.svg">',
responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 5,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 992,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 790,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 576,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    },


]
});
// cлайдер на внутреней страници новостей и анонсов
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 5,
    arrows: true,
    // slidesToScroll: 1,
    centerPadding: '10px',
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
     {
      breakpoint: 1400,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '20px',
        slidesToShow: 4
      }
    },
     {
      breakpoint: 1100,
      settings: {
        arrows: true,
        centerMode: false,
        centerPadding: '5px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '10px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 620,
      settings: {
        arrows: false,
        centerMode: false,
        centerPadding: '10px',
        slidesToShow: 2
      }
    }
  ],
    prevArrow: '<img class="slick-prev slick-arrow img-fluid image__slick-prev" src="..//images/main/slider/arrow-left.svg">',
    nextArrow: '<img class="slick-next slick-arrow img-fluid image__slick-next" src="..//images/main/slider/arrow-right.svg">',
});
// конец cлайдер на внутреней страници новостей и анонсов

// скрипт для hover preview блок анонсы описание
// $('.preview__item').hover(function() {
// $(this).addClass('preview__item-hover');
// }, function() {
// $(this).removeClass('preview__item-hover');
// });

// $('.preview__descr').hover(function() {
// $(this).parents('.preview__card').children('.preview__item').addClass('preview__item-hover');
// }, function() {
// $(this).parents('.preview__card').children('.preview__item').removeClass('preview__item-hover');
// });

// конец скрипт для hover preview блок анонсы описание

var isInViewport = function(elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};



const tutu= document.getElementById('tutu');
const caption__displays=document.getElementsByClassName('caption__displays')



function getCoords(elem ) { 
    var box = elem.getBoundingClientRect();
    return {
      top: box.top + pageYOffset,
    };
  
}





$(window).scroll(function(){
    function caption__display(){
        $('.caption__display').addClass('hover');  
    }

    function hiddenDiv(){                   
        $('#tutu').animate({height:0 },1500);
    }

    function deleteDiv(){               
        tutu.style.display='none';
    }
    if ( $(this).scrollTop() >= (getCoords(tutu||$('body')[0]).top)+100  ) {
        $('.caption__last').addClass('hover');
        $('.caption__news').addClass('hover');  
        setTimeout( caption__display,2500);
        setTimeout( hiddenDiv,2500);
        setTimeout( deleteDiv,4000);    }
});

// плавний скролл с помощью якоря
 $(document).ready(function(){
    $(".scroll_yak").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
        scroll_top($(window))

    });
    $(window).scroll(function(){
        scroll_top($(this));
    })
    
    function scroll_top(e){
        let el = $('#up_scroll');
        if (e.scrollTop() >300){
            el.show('slow');
        } else{
            el.hide('slow');
        }
    }
    scroll_top($(window));
});

//конец плавний скролл с помощью якоря

//background scroll menu color ;

const string_fixed = document.getElementsByClassName('background-scroll')[0];
const string = document.getElementsByClassName('background-fixed')[0];
const menu_header = document.getElementById('menu_header')[0];


   
window.onscroll = function() {
    menuScroll()
}
function menuScroll(){
    if (window.location.pathname=='/'){
        $('#menu_header').addClass('menu_header_home');
        if(window.pageYOffset != 0) {
            $('#menu_header').addClass('background-fixed ');
            
        } else {
            $('#menu_header').removeClass('background-fixed ');
        }
    } else{
        $('#menu_header').removeClass('menu_header_home');

    }
}
menuScroll()


// end background scroll menu color ;

//show  blocks hover (document,language)

// $('.show-block-header').hover(function() {
//     console.log($(this)[0])
//     $(this).dropdown('show');
//     }, function() {
//         $(this).dropdown('hide');
// });

// end show  blocks hover (document,language)