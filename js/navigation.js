/**
 * .sub-menuigation.js
 *
 * Handles toggling the .sub-menuigation sub-menu.
 */
(function($){
$('.sub-menu').hide();

   $('.menu-item-has-children').hover(function() {

$(this).children('.sub-menu').css('display', 'inline-block').stop().slideToggle(200);

});
})(jQuery);