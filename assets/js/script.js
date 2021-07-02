/**
 *	PROJECT			:		Vannkorn
 *	DEVELOPER		:		Tepken Vannkorn
 *	DEVELOPER URI	:		https://vannkorn.com
 *	VERSION			: 		1.0
 *	DATE			:		01-June-2021
 */

jQuery(function() {

    var VK = {

        init: function() {

            this.slideInMenu();

            this.darkModeSwitcher();

            this.expandText();

            this.showSearchBox();

            this.toTop(300);

        },

        toTop: function(delay) {

            /* Offset top possition to show the to top button*/

            var whereToShow = 600;

            jQuery(window).scroll(function() {

                if (jQuery(window).scrollTop() > whereToShow) {

                    jQuery('.to-top').fadeIn(delay).css('display', 'flex');

                } else {
                    jQuery('.to-top').fadeOut(delay);
                }

            });

            jQuery('.to-top').click(function(e) {

                jQuery('body, html').animate({ scrollTop: 0 }, delay);

                e.preventDefault();

            });

        },

        showSearchBox: function() {

            jQuery('a.trigger-search-box').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                jQuery('.search-box').fadeIn(500);
            });

            // Close from when clicking on the cross sign
            jQuery('.search-box form button.close').click(function(e) {
                e.preventDefault();

                jQuery('.search-box').fadeOut(500);
            });

            // Click anywhere in the page to dismiss the search box 
            jQuery(document).click(function(e) {
                if (e.target.id == 'searchControl') {
                    return;
                }
                jQuery('.search-box').fadeOut(500);
            });

        },

        expandText: function() {

            if (jQuery('.work').length) {

                var textLength = 120;

                jQuery('.work-text').each(function() {

                    var workStr = jQuery(this).text().replace(/\n/g, '<p></p>');

                    if (jQuery.trim(workStr).length > textLength) {

                        var newWorkStr = workStr.substring(0, textLength);

                        var removedStr = workStr.substring(textLength, jQuery.trim(workStr).length);

                        jQuery(this).empty().html(newWorkStr);

                        jQuery(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
                        jQuery(this).append('<span class="more-text">' + removedStr + '</span>');

                    }

                });

                // When read more link is clicked, expand all texts
                jQuery('.read-more').on('click', function() {

                    jQuery(this).siblings(".more-text").contents().unwrap();

                    jQuery(this).remove();

                });

            }

        },

        darkModeSwitcher: function() {

            //Create the cookie object
            var cookieStorage = {

                setCookie: function setCookie(key, value, time, path) {

                    var expires = new Date();

                    expires.setTime(expires.getTime() + time);

                    var pathValue = '';

                    if (typeof path !== 'undefined') {
                        pathValue = 'path=' + path + ';';
                    }

                    document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
                },

                getCookie: function getCookie(key) {
                    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
                    return keyValue ? keyValue[2] : null;
                },

                removeCookie: function removeCookie(key) {
                    document.cookie = key + '=; Max-Age=0; path=/';
                }

            };

            jQuery('.dark-mode').on('click', function(e) {

                if (jQuery(this).hasClass('active')) {

                    // The user no longer wants dark mode
                    cookieStorage.removeCookie('vannkornDarkMode');

                    jQuery('body').removeClass('body-dark-mode');

                    jQuery(this).removeClass('active');

                    jQuery(this).find('span').addClass('fa-moon').removeClass('fa-sun');

                } else {

                    jQuery('body').addClass('body-dark-mode');

                    cookieStorage.setCookie('vannkornDarkMode', 'true', 2628000000, '/');

                    jQuery(this).addClass('active');

                    jQuery(this).find('span').addClass('fa-sun').removeClass('fa-moon');

                }

                e.preventDefault();

            });

            //Check Storage. Display user preference 
            if (cookieStorage.getCookie('vannkornDarkMode')) {

                jQuery('body').addClass('body-dark-mode');

                jQuery('.dark-mode').addClass('active');

                jQuery('.dark-mode').find('span').addClass('fa-sun').removeClass('fa-moon');

            }

        },

        slideInMenu: function() {

            var that = this;

            jQuery('.navbar-toggler').click(function(e) {

                jQuery('body').toggleClass('show-menu');

                // Hide default callapsible action

                jQuery('.collapse').collapse('hide');

            });

            jQuery('.slidein-menu-backdrop, .close-button, .slidein-nav a:not(".dropdown-toggle")').click(function() {

                jQuery('body').removeClass('show-menu');

            });

        },

    }

    jQuery(document).on('lity:ready', function(event, lightbox) {
        if (lightbox.opener().data('title') != '') {
            jQuery(event.currentTarget.activeElement).find('.lity-content').prepend('<p class="caption">' + lightbox.opener().data('title') + '</p>');
        }
    });

    jQuery(document).ready(function() {

        VK.init();

    });

});