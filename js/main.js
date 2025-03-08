jQuery(document).ready(function($) {
    'use strict';

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80 // Offset for fixed header
            }, 800);

            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        }
    });

    // Form submission handling
    const contactForm = document.querySelector('.wpcf7-form');
    if (contactForm) {
        document.addEventListener('wpcf7mailsent', function(event) {
            alert('Thank you for your message! We will get back to you soon.');
        });
    }

    // Add active class to current menu item
    const currentPath = window.location.pathname;
    $('nav a').each(function() {
        if ($(this).attr('href') === currentPath) {
            $(this).addClass('text-indigo-600');
        }
    });
});
