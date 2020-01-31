// :: THE WAY TO REPLACE '$' SIGN WITH 'jQuery' TO USE NO CONFLICT JQUERY IN WORDPRESS
(function($){
	$(document).ready(function(){
        $('.burger-button').click(function(){
            $(this).toggleClass('active');
            $('.mobile-menus').slideToggle();
        });
    });
})(jQuery);

// HAMBURGER AUDIO
document.getElementById("hamburger-menu").addEventListener('click', function(e) {
    document.getElementById("hamburger-hover").play();
});