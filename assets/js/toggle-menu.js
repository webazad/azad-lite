// :: THE WAY TO REPLACE '$' SIGN WITH 'jQuery' TO USE NO CONFLICT JQUERY IN WORDPRESS
(function($){
	$(document).ready(function(){
        $('.burger-button').click(function(){
            $(this).toggleClass('active');
            $('.mobile-menus').slideToggle();
        });
    });
})(jQuery);

