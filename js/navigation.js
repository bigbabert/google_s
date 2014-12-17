/**
 * .sub-menuigation.js
 *
 * Handles toggling the .sub-menuigation sub-menu.
 */
(function($){
$('ul.sub-menu').hide();

   $('li.menu-item-has-children').hover(function() {

$(this).children('ul.sub-menu').css('display', 'inline-block').stop().slideToggle(800);

});
})(jQuery);