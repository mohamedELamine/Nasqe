/**
 * Nasaq Theme - Navigation JavaScript
 *
 * التحكم في القائمة المتحركة والتفاعلات
 */

document.addEventListener('DOMContentLoaded', function() {

	// Mobile Menu Toggle
	const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
	const mobileNav = document.querySelector('.mobile-nav');

	if (mobileMenuToggle && mobileNav) {
		mobileMenuToggle.addEventListener('click', function() {
			mobileNav.classList.toggle('active');

			// Update icon
			const isActive = mobileNav.classList.contains('active');
			if (isActive) {
				mobileMenuToggle.innerHTML = `
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="18" y1="6" x2="6" y2="18"></line>
						<line x1="6" y1="6" x2="18" y2="18"></line>
					</svg>
				`;
				mobileMenuToggle.setAttribute('aria-label', 'إغلاق القائمة');
			} else {
				mobileMenuToggle.innerHTML = `
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				`;
				mobileMenuToggle.setAttribute('aria-label', 'فتح القائمة');
			}
		});

		// Close mobile menu when clicking outside
		document.addEventListener('click', function(event) {
			if (!mobileNav.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
				mobileNav.classList.remove('active');
				mobileMenuToggle.innerHTML = `
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				`;
			}
		});

		// Close mobile menu when clicking on a link
		const mobileNavLinks = mobileNav.querySelectorAll('a');
		mobileNavLinks.forEach(link => {
			link.addEventListener('click', function() {
				mobileNav.classList.remove('active');
				mobileMenuToggle.innerHTML = `
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				`;
			});
		});
	}

	// Smooth scroll for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const href = this.getAttribute('href');

			// Ignore empty or just "#" links
			if (href === '#' || href === '') {
				return;
			}

			e.preventDefault();
			const target = document.querySelector(href);

			if (target) {
				const headerOffset = 80; // Account for fixed header
				const elementPosition = target.getBoundingClientRect().top;
				const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

				window.scrollTo({
					top: offsetPosition,
					behavior: 'smooth'
				});
			}
		});
	});

	// Header scroll effect (optional)
	let lastScroll = 0;
	const header = document.querySelector('.site-header');

	if (header) {
		window.addEventListener('scroll', function() {
			const currentScroll = window.pageYOffset;

			if (currentScroll > 100) {
				header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
			} else {
				header.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
			}

			lastScroll = currentScroll;
		});
	}

	// Add animation on scroll (optional)
	const observerOptions = {
		threshold: 0.1,
		rootMargin: '0px 0px -100px 0px'
	};

	const observer = new IntersectionObserver(function(entries) {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.style.opacity = '1';
				entry.target.style.transform = 'translateY(0)';
			}
		});
	}, observerOptions);

	// Observe elements with animation class
	document.querySelectorAll('.service-card, .portfolio-card, .pricing-card').forEach(el => {
		el.style.opacity = '0';
		el.style.transform = 'translateY(20px)';
		el.style.transition = 'all 0.6s ease';
		observer.observe(el);
	});

});

// Form validation (if needed)
const contactForm = document.querySelector('#contact form');
if (contactForm) {
	contactForm.addEventListener('submit', function(e) {
		e.preventDefault();

		// Add your form validation logic here
		const formData = new FormData(this);

		// Example: Send via AJAX
		// fetch('/wp-admin/admin-ajax.php', {
		//     method: 'POST',
		//     body: formData
		// })
		// .then(response => response.json())
		// .then(data => {
		//     // Handle success
		// })
		// .catch(error => {
		//     // Handle error
		// });
	});
}
