/**
 * Nasqe Theme Customizer Preview
 * معاينة مباشرة لإعدادات التخصيص
 */

(function($) {
    'use strict';

    // تحديث نص الشعار
    wp.customize('nasqe_logo_text', function(value) {
        value.bind(function(newval) {
            $('.site-title, .wp-block-site-title').text(newval);
        });
    });

    // تحديث الوصف
    wp.customize('nasqe_tagline', function(value) {
        value.bind(function(newval) {
            $('.site-description, .wp-block-site-tagline').text(newval);
        });
    });

    // تحديث عنوان قسم البطل
    wp.customize('nasqe_hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title, .wp-block-heading.hero-title').text(newval);
        });
    });

    // تحديث وصف قسم البطل
    wp.customize('nasqe_hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-subtitle').text(newval);
        });
    });

    // تحديث اللون الأخضر الداكن
    wp.customize('nasqe_primary_dark_color', function(value) {
        value.bind(function(newval) {
            $('head').append(
                '<style id="nasqe-primary-dark-color">' +
                ':root { --wp--preset--color--primary-dark-green: ' + newval + '; }' +
                '.has-primary-dark-green-color { color: ' + newval + ' !important; }' +
                '.has-primary-dark-green-background-color { background-color: ' + newval + ' !important; }' +
                '.wp-block-button__link, .button { background-color: ' + newval + '; }' +
                '</style>'
            );
            $('#nasqe-primary-dark-color').remove();
        });
    });

    // تحديث اللون الأخضر الرئيسي
    wp.customize('nasqe_primary_color', function(value) {
        value.bind(function(newval) {
            $('head').append(
                '<style id="nasqe-primary-color">' +
                ':root { --wp--preset--color--primary-green: ' + newval + '; }' +
                '.has-primary-green-color { color: ' + newval + ' !important; }' +
                '.has-primary-green-background-color { background-color: ' + newval + ' !important; }' +
                '.wp-block-button__link:hover, .button:hover { background-color: ' + newval + '; }' +
                '</style>'
            );
            $('#nasqe-primary-color').remove();
        });
    });

    // تحديث اللون البرتقالي
    wp.customize('nasqe_secondary_color', function(value) {
        value.bind(function(newval) {
            $('head').append(
                '<style id="nasqe-secondary-color">' +
                ':root { --wp--preset--color--secondary-orange: ' + newval + '; }' +
                '.has-secondary-orange-color { color: ' + newval + ' !important; }' +
                '.has-secondary-orange-background-color { background-color: ' + newval + ' !important; }' +
                '</style>'
            );
            $('#nasqe-secondary-color').remove();
        });
    });

})(jQuery);
