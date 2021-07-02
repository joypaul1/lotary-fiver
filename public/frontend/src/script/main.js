// scrolled header class
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    var menuHeight = $('#header').height();

    if (scroll >= menuHeight) {
        $("#header").addClass("scrolled");
    } else {
        $("#header").removeClass("scrolled");
    }
});

// menu button toggler
// ======================================================
$(document).ready(function(){
    $(".menuBtn").click(function(){
        $(".header").toggleClass('active');
    });

    $(window).scroll(function() {    
        $(".header").removeClass('active');
    });
});

// SCROLL ANIMATION
$(document).ready(function(){
    $('a[href^="#"]').on('click',function (e) {
        // close open menu
        $(".header").removeClass("active");
    });

    // onscroll active call
    $(document).on("scroll", onScroll);
    

    // onscroll function def
    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#menu a[href^="#"]').each(function () {
            var currLink = $(this).attr("href");
            var refElement = $(currLink);
            
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#menu ul li a').removeClass("active");
                $(this).addClass("active");
            }
            else{
                $(this).removeClass("active");
            }
        });
    }
});

// status bar
$(window).scroll(function() {    
    var windowHeight = $(window).height();
    var scroll = $(window).scrollTop();

    // data collect
    $(".pgBr").each(function() {
        var position = $(this).position();
        var topPos = position.top - windowHeight;
        var pgPtgNbr = $(this).find(".pgPtgNbr").html();
        var pgPtg = pgPtgNbr + "%"

        // set max width
        $(this).find(".pgVal").css("max-width", "100%");

        // mark more than 100
        if (pgPtgNbr > 100) {
            $(this).find(".pgPtg").css("color", "#ff00ccff");
        }

        // set the width
        if (scroll > topPos) {
            $(this).find(".pgVal").css("width", pgPtg);
        }else{
            $(this).find(".pgVal").css("width", "0");
        }
    });
});

// aos init
$(document).ready(function(){
    AOS.init();
});

// disabling the rightclick
// document.addEventListener('contextmenu', event => event.preventDefault());