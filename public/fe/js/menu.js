; (function ($, $w, $d, w, d, $b) {
    'use strict';
    var $body = $('body');
    $.fn.multiMenu = function (options) {
        var TPMenu = $(this),
            settings = $.extend({
                type: 'multitoggle'
            }, options);
        return this.each(function () {
            TPMenu.find('li ul').parent().addClass('panel__menu-has-sub');
            // $('.panel__menu-has-sub >a').addClass('panel__submenu-opened');  
            var menuMultiLevel = function () {
                if (settings.type === 'multitoggle') {
                    //click vào panel
                    TPMenu.find('.panel__menu >a').on('click', function () {
                        $(this).removeAttr('href');
                        if ($(this).hasClass('panel__submenu-opened')) {
                            $(this).removeClass('panel__submenu-opened');
                            $(this).siblings('ul').slideUp();
                        } else {
                            $(this).parent('li').parent('ul').find('.panel__menu-has-sub a').removeClass('panel__submenu-opened');
                            $(this).parent('li').parent('ul').find('.panel__menu-has-sub >ul').slideUp();
                            $(this).addClass('panel__submenu-opened');
                            $(this).siblings('ul').slideDown();
                        }
                    });
                    //click vào icon
                    TPMenu.find('.panel__menu-has-sub').find('i').on('click', function () {
                        $(this).parent().removeAttr('href');
                        if ($(this).parent().hasClass('panel__submenu-opened')) {
                            $(this).parent().removeClass('panel__submenu-opened');
                            $(this).parent().siblings('ul').slideUp();
                        } else {
                            console.log($(this))
                            $(this).parent().parent('li').parent('ul').find('.panel__menu-has-sub a').removeClass('panel__submenu-opened');
                            $(this).parent().parent('li').parent('ul').find('.panel__menu-has-sub >ul').slideUp();
                            $(this).parent().addClass('panel__submenu-opened');
                            $(this).parent().siblings('ul').slideDown();
                        }
                    });
                } else {
                    TPMenu.addClass('dropdown');
                }
            };
            menuMultiLevel();
        });
    };
}(jQuery, jQuery(window), jQuery(document), window, document, jQuery('body')));
