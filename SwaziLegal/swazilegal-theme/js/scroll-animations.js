/**
 * SwaziLegal - Scroll Animations
 * Handles text reveal, parallax, and sticky section animations
 */

// Initialize scroll animations
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initParallaxEffect();
    initStickyBanners();
});

/**
 * Text Reveal Animation on Scroll
 * Triggers text-reveal animation when elements come into view
 */
function initScrollAnimations() {
    const textRevealElements = document.querySelectorAll('.text-reveal');
    
    if ('IntersectionObserver' in window) {
        const options = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'textReveal 0.8s ease-out forwards';
                    // Stagger effect for multiple text elements
                    const index = Array.from(textRevealElements).indexOf(entry.target);
                    entry.target.style.animationDelay = `${index * 0.1}s`;
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        textRevealElements.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback for browsers that don't support Intersection Observer
        textRevealElements.forEach(element => {
            element.style.animation = 'textReveal 0.8s ease-out forwards';
        });
    }
}

/**
 * Parallax Effect for Hero Background
 * Creates parallax scroll effect on hero section background
 */
function initParallaxEffect() {
    const heroSection = document.querySelector('.hero');
    
    if (!heroSection) return;
    
    window.addEventListener('scroll', () => {
        const scrollPosition = window.pageYOffset;
        const parallaxSpeed = 0.5; // Adjust for more/less parallax effect
        const rect = heroSection.getBoundingClientRect();
        
        // Only apply parallax while hero is visible
        if (rect.bottom > 0) {
            heroSection.style.backgroundPosition = `center ${scrollPosition * parallaxSpeed}px`;
        }
    });
}

/**
 * Sticky Section Banners
 * Show/hide sticky banners based on scroll position
 */
function initStickyBanners() {
    const stickyBanners = document.querySelectorAll('.section-banner');
    
    if ('IntersectionObserver' in window) {
        const options = {
            threshold: 0,
            rootMargin: '0px 0px 0px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // Banner becomes visible when section is out of view
                const banner = entry.target;
                const sticky = banner.closest('section');
                
                // Make banners sticky with smooth transitions
                if (entry.isIntersecting) {
                    banner.style.position = 'relative';
                    banner.style.opacity = '1';
                } else {
                    banner.style.position = 'sticky';
                    banner.style.top = '80px'; // Adjust based on header height
                    banner.style.opacity = '0.95';
                }
            });
        }, options);
        
        stickyBanners.forEach(banner => {
            observer.observe(banner);
        });
    }
}

/**
 * Smooth Scroll Behavior
 * Enhance smooth scrolling for anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Counter Animation for Statistics
 * Animate numbers counting up when they come into view
 */
function initCounterAnimation() {
    const statNumbers = document.querySelectorAll('.stat-number');
    
    if ('IntersectionObserver' in window) {
        const options = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    animateCounter(entry.target);
                    entry.target.classList.add('counted');
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        statNumbers.forEach(element => {
            observer.observe(element);
        });
    }
}

/**
 * Animate a counter from 0 to target number
 */
function animateCounter(element) {
    const target = parseInt(element.textContent);
    const duration = 1000; // 1 second
    const increment = target / (duration / 16); // 60fps
    let current = 0;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 16);
}

/**
 * Enhanced Button Hover Effects
 * Add interactive hover animations to buttons
 */
function initButtonAnimations() {
    const buttons = document.querySelectorAll('.btn');
    
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 10px 25px rgba(13, 71, 161, 0.2)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 15px rgba(13, 71, 161, 0.1)';
        });
    });
}

/**
 * Fade In Cards on Scroll
 * Cards fade in and slide up when they come into view
 */
function initCardAnimations() {
    const cards = document.querySelectorAll('.glass, .practice-card, .card-glass');
    
    if ('IntersectionObserver' in window) {
        const options = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                    entry.target.style.animationDelay = `${index * 0.1}s`;
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        cards.forEach(card => {
            card.style.opacity = '0';
            observer.observe(card);
        });
    }
}

// Fade-in-up animation keyframe (add to CSS if not present)
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

// Initialize all animations when page loads
document.addEventListener('load', () => {
    initCounterAnimation();
    initButtonAnimations();
    initCardAnimations();
    initSmoothScroll();
});

// Re-initialize on dynamic content load
window.addEventListener('contentLoaded', () => {
    initScrollAnimations();
    initCounterAnimation();
    initCardAnimations();
});
