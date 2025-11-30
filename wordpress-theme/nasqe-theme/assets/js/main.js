/**
 * سكربتات قالب نسق
 * Nasqe Theme Scripts
 */

(function() {
    'use strict';

    // انتظار تحميل الصفحة بالكامل
    document.addEventListener('DOMContentLoaded', function() {

        // تفعيل الأنيميشن عند التمرير
        initScrollAnimations();

        // تحسين التمرير السلس للروابط الداخلية
        initSmoothScroll();

        // تفعيل Lazy Loading للصور
        initLazyLoading();

        // إضافة تأثيرات الهيدر عند التمرير
        initStickyHeader();

        // تفعيل تأثيرات البطاقات
        initCardAnimations();

        // تفعيل عداد الإحصائيات
        initStatsCounter();
    });

    /**
     * تفعيل الأنيميشن عند التمرير
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-on-scroll');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // مراقبة العناصر التي نريد تفعيل الأنيميشن لها
        const animatedElements = document.querySelectorAll('.wp-block-group, .wp-block-column, .wp-block-cover');
        animatedElements.forEach(function(element) {
            observer.observe(element);
        });
    }

    /**
     * تحسين التمرير السلس للروابط الداخلية
     */
    function initSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // تجاهل الروابط الفارغة
                if (href === '#' || !href) return;

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();

                    // حساب موضع الهيدر
                    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 0;
                    const targetPosition = target.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * تفعيل Lazy Loading للصور
     */
    function initLazyLoading() {
        // التحقق من دعم المتصفح لـ Intersection Observer
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;

                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }

                        imageObserver.unobserve(img);
                    }
                });
            });

            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * إضافة تأثيرات الهيدر عند التمرير
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');

        if (!header) return;

        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            // إضافة ظل عند التمرير
            if (currentScroll > 100) {
                header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.05)';
            }

            lastScroll = currentScroll;
        });
    }

    /**
     * إضافة تأثيرات للأزرار
     */
    function initButtonEffects() {
        const buttons = document.querySelectorAll('.wp-block-button__link');

        buttons.forEach(function(button) {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

})();

/**
 * تحسينات الأداء
 */

// تأخير تحميل السكربتات غير الضرورية
window.addEventListener('load', function() {
    // يمكن إضافة سكربتات إضافية هنا
});

// تحسين الأداء للموبايل
if ('ontouchstart' in window) {
    document.body.classList.add('touch-device');
}

/**
 * تفعيل تأثيرات البطاقات (Portfolio, Services, etc.)
 */
function initCardAnimations() {
    const cards = document.querySelectorAll('.portfolio-item, .service-card, .testimonial-card');

    cards.forEach(function(card) {
        // إضافة class hover-lift
        card.classList.add('hover-lift');

        // إضافة overflow hidden للصور
        const imageContainer = card.querySelector('.wp-block-post-featured-image, figure');
        if (imageContainer) {
            imageContainer.classList.add('hover-zoom');
        }
    });
}

/**
 * عداد متحرك للإحصائيات
 */
function initStatsCounter() {
    const statNumbers = document.querySelectorAll('.stat-number');

    if (statNumbers.length === 0) return;

    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                animateCounter(entry.target);
                entry.target.classList.add('counted');
            }
        });
    }, observerOptions);

    statNumbers.forEach(function(stat) {
        observer.observe(stat);
    });
}

/**
 * تحريك العداد من 0 إلى القيمة النهائية
 */
function animateCounter(element) {
    const target = parseInt(element.innerText.replace(/\D/g, ''));
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16); // 60 FPS
    let current = 0;

    const timer = setInterval(function() {
        current += increment;
        if (current >= target) {
            element.innerText = formatNumber(target);
            clearInterval(timer);
        } else {
            element.innerText = formatNumber(Math.floor(current));
        }
    }, 16);
}

/**
 * تنسيق الأرقام مع الفواصل
 */
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
