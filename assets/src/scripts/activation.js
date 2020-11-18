//GLOBAL VARIABLES
var Azad = {};
;(function($){
    // USE STRICT
    "use strict";

    var $window = $(window),
        $document = $(document),
        $body = $('body');

    Azad.azad_pre_loader = function(_success){
        
        if(document.querySelector('.preloader')){
            // PRELOADER
            var obj = document.querySelector('.preloader'),
            inner = document.querySelector('.inner .percentage'),
            page = document.querySelector('body');
                
            obj.classList.remove('page-loaded');
            page.classList.add('page-loaded');
            var w = 0,
            t = setInterval(function() {
                w = w + 1;
                inner.textContent = w;
                if (w === 100){
                    obj.classList.add('page-loaded');
                    page.classList.remove('page-loaded');
                    clearInterval(t);
                    w = 0;
                    if (_success){
                        return _success();
                    }
                }
            }, 20);
        }
    }

    Azad.azad_burger_button = function(){
        // HAMBURGER BUTTON
        $('.burger-button').click(function(){
            $(this).toggleClass('active');
            $('.mobile-menus').slideToggle();
            // $('.mobile-menus').toggleClass('active');
        });
    }

    Azad.audio_player = function(){
        // HAMBURGER AUDIO
        document.getElementById("hamburger-menu").addEventListener('click', function(e) {
            document.getElementById("hamburger-hover").play();
        });
    }

    $window.keydown(function(){

    });

    $document.ready(function(){
        Azad.azad_pre_loader();
        Azad.azad_burger_button();
        Azad.audio_player();
    });

})(jQuery);