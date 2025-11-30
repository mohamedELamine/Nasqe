/**
 * Nasaq Classic Theme JavaScript
 *
 * @package Nasaq
 */

(function($) {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const mobileToggle = $('.mobile-menu-toggle');
        const mobileNav = $('.mobile-nav');
        const body = $('body');

        if (mobileToggle.length && mobileNav.length) {
            mobileToggle.on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                mobileNav.toggleClass('active');
                body.toggleClass('menu-open');
            });

            // Close menu when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                    mobileToggle.removeClass('active');
                    mobileNav.removeClass('active');
                    body.removeClass('menu-open');
                }
            });

            // Close menu when clicking on a link
            mobileNav.find('a').on('click', function() {
                mobileToggle.removeClass('active');
                mobileNav.removeClass('active');
                body.removeClass('menu-open');
            });
        }
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {

                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    e.preventDefault();
                    const offset = $('#masthead').outerHeight() || 0;

                    $('html, body').animate({
                        scrollTop: target.offset().top - offset
                    }, 800, 'swing');
                }
            }
        });
    }

    /**
     * Header Scroll Effect
     */
    function initHeaderScroll() {
        const header = $('#masthead');
        let lastScrollTop = 0;

        if (header.length) {
            $(window).on('scroll', function() {
                const scrollTop = $(this).scrollTop();

                // Add shadow when scrolled
                if (scrollTop > 50) {
                    header.addClass('scrolled');
                } else {
                    header.removeClass('scrolled');
                }

                // Hide/show header on scroll (optional)
                // Uncomment if you want auto-hiding header
                /*
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    header.addClass('header-hidden');
                } else {
                    header.removeClass('header-hidden');
                }
                */

                lastScrollTop = scrollTop;
            });
        }
    }

    /**
     * Animate on Scroll
     * Add 'fade-in' class to elements you want to animate
     */
    function initScrollAnimations() {
        const animateElements = $('.fade-in, .section');

        if (animateElements.length) {
            function checkAnimation() {
                const windowHeight = $(window).height();
                const scrollTop = $(window).scrollTop();

                animateElements.each(function() {
                    const elementTop = $(this).offset().top;

                    if (scrollTop + windowHeight > elementTop + 100) {
                        $(this).addClass('animated');
                    }
                });
            }

            $(window).on('scroll', checkAnimation);
            checkAnimation(); // Check on load
        }
    }

    /**
     * Handle Contact Form AJAX Submission
     */
    function initContactForm() {
        const form = $('#nasaq-contact-form');
        const submitBtn = $('#nasaq-submit-btn');
        const btnText = submitBtn.find('.btn-text');
        const btnLoading = submitBtn.find('.btn-loading');
        const messageArea = $('#nasaq-form-message');

        if (form.length) {
            form.on('submit', function(e) {
                e.preventDefault();

                // Client-side validation
                let isValid = true;
                const requiredFields = form.find('[required]');

                requiredFields.each(function() {
                    if (!$(this).val().trim()) {
                        isValid = false;
                        $(this).addClass('error');
                    } else {
                        $(this).removeClass('error');
                    }
                });

                // Email validation
                const emailField = form.find('input[type="email"]');
                if (emailField.length && emailField.val()) {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(emailField.val())) {
                        isValid = false;
                        emailField.addClass('error');
                        showMessage('يرجى إدخال بريد إلكتروني صحيح', 'error');
                    }
                }

                if (!isValid) {
                    showMessage('يرجى ملء جميع الحقول المطلوبة', 'error');
                    return;
                }

                // Show loading state
                submitBtn.prop('disabled', true);
                btnText.hide();
                btnLoading.show();
                messageArea.hide();

                // Prepare form data
                const formData = {
                    action: 'nasaq_contact_form',
                    nonce: form.find('input[name="nonce"]').val(),
                    name: form.find('input[name="name"]').val(),
                    email: form.find('input[name="email"]').val(),
                    phone: form.find('input[name="phone"]').val(),
                    subject: form.find('input[name="subject"]').val(),
                    message: form.find('textarea[name="message"]').val()
                };

                // Send AJAX request
                $.ajax({
                    url: nasaqData.ajaxUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.data.message, 'success');
                            form[0].reset(); // Clear form
                        } else {
                            showMessage(response.data.message, 'error');
                        }
                    },
                    error: function() {
                        showMessage('حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى.', 'error');
                    },
                    complete: function() {
                        // Restore button state
                        submitBtn.prop('disabled', false);
                        btnText.show();
                        btnLoading.hide();
                    }
                });
            });

            // Remove error class on input
            form.find('input, textarea').on('input', function() {
                $(this).removeClass('error');
            });

            // Helper function to show messages
            function showMessage(message, type) {
                messageArea
                    .removeClass('success error')
                    .addClass(type)
                    .html(message)
                    .slideDown(300);

                // Auto-hide success message after 5 seconds
                if (type === 'success') {
                    setTimeout(function() {
                        messageArea.slideUp(300);
                    }, 5000);
                }
            }
        }
    }

    /**
     * Stats Counter Animation (for hero stats)
     */
    function initStatsCounter() {
        const stats = $('.hero-stats .stat-number');

        if (stats.length) {
            let animated = false;

            function animateStats() {
                if (animated) return;

                const windowHeight = $(window).height();
                const scrollTop = $(window).scrollTop();
                const heroSection = $('#hero');

                if (heroSection.length) {
                    const heroTop = heroSection.offset().top;

                    if (scrollTop + windowHeight > heroTop + 200) {
                        animated = true;

                        stats.each(function() {
                            const $this = $(this);
                            const target = parseInt($this.text().replace(/[^0-9]/g, ''));
                            const suffix = $this.text().replace(/[0-9]/g, '');
                            let current = 0;
                            const increment = target / 50;
                            const timer = setInterval(function() {
                                current += increment;
                                if (current >= target) {
                                    current = target;
                                    clearInterval(timer);
                                }
                                $this.text(Math.floor(current) + suffix);
                            }, 30);
                        });
                    }
                }
            }

            $(window).on('scroll', animateStats);
            animateStats(); // Check on load
        }
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Create back to top button if it doesn't exist
        if (!$('.back-to-top').length) {
            $('body').append('<button class="back-to-top" aria-label="العودة للأعلى"><span>↑</span></button>');
        }

        const backToTop = $('.back-to-top');

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    }

    /**
     * Initialize all functions
     */
    $(document).ready(function() {
        initMobileMenu();
        initSmoothScroll();
        initHeaderScroll();
        initScrollAnimations();
        initContactForm();
        initStatsCounter();
        initBackToTop();
    });

    /**
     * Window Load Events
     */
    $(window).on('load', function() {
        // Add any functions that need to run after page fully loads
        $('body').addClass('loaded');
    });

})(jQuery);
