/* =====================================
   SwaziLegal - Main JavaScript
   Core Functionality & Data Management
   ===================================== */

// Global content data
let contentData = {};

// Initialize site on page load
document.addEventListener('DOMContentLoaded', function () {
    loadContent();
    setupInteractivity();
    setupAccordions();
    setupForms();
    initializeSearch();
});

/**
 * Resolve image path for WordPress compatibility
 */
function resolveImagePath(path) {
    if (!path) return '';
    // If it's already an absolute URL or data URI, return as is
    if (path.startsWith('http') || path.startsWith('data:')) return path;
    
    // Prefix with template directory URI if available
    const baseUrl = (typeof wpData !== 'undefined' && wpData.templateUrl) ? wpData.templateUrl : '';
    // Ensure path doesn't start with / if baseUrl ends with / or vice versa
    const cleanPath = path.startsWith('/') ? path.substring(1) : path;
    const cleanBase = baseUrl.endsWith('/') ? baseUrl : baseUrl + '/';
    
    return cleanBase + cleanPath;
}

/**
 * Load JSON content data with robust fallback
 */
async function loadContent() {
    // Initial hardcoded data for immediate visibility & offline support
    contentData = {
        firm: {
            name: "SwaziLegal",
            whatsapp: "26878132527",
            phone: "+268 76 805 805",
            email: "info@swazilegal.sz"
        },
        team: [
            { id: 1, name: "Malumane Thembumenzi S", title: "Senior Partner", specialty: "Corporate Law", image: "images/team/malumane.jpg" },
            { id: 2, name: "Mabuza S'cabangile", title: "Partner", specialty: "Family Law", image: "images/team/scabangile.jpg" },
            { id: 3, name: "Nhlanhla Masango", title: "Senior Associate", specialty: "Criminal Law", image: "images/team/nhlanhla.jpg" },
            { id: 4, name: "Thandi Khubone", title: "Associate", specialty: "Labor Law", image: "images/team/thandi.jpg" }
        ],
        practices: [
            { id: 1, name: "Property & Conveyancing", faIcon: "fas fa-home", services: ["Property Transfers", "Bond Registrations"] },
            { id: 2, name: "Family & Customary Law", faIcon: "fas fa-heart", services: ["Civil & Customary Divorce", "Child Custody"] },
            { id: 3, name: "Estate Administration", faIcon: "fas fa-file-contract", services: ["Will Drafting", "Deceased Estate Registration"] },
            { id: 4, name: "Corporate & Commercial", faIcon: "fas fa-building", services: ["Company Registrations", "Partnership Agreements"] },
            { id: 5, name: "Labor & Employment", faIcon: "fas fa-briefcase", services: ["CMAC Representation", "Industrial Court"] },
            { id: 6, name: "Civil Litigation", faIcon: "fas fa-balance-scale", services: ["Debt Collection", "Personal Injury"] },
            { id: 7, name: "Notarial Services", faIcon: "fas fa-pen-nib", services: ["Antenuptial Contracts", "Document Authentication"] }
        ],
        testimonials: [
            { id: 1, client: "John Dlamini", company: "Dlamini Enterprises", text: "SwaziLegal handled our corporate merger with exceptional professionalism. Their strategic advice saved us significant time and resources.", rating: 5, avatar: "https://randomuser.me/api/portraits/men/32.jpg" },
            { id: 2, client: "Thandi Mhlongo", company: "Individual", text: "I was going through a difficult divorce and Mabuza's compassion and expertise made all the difference. Highly recommend their family law services!", rating: 4, avatar: "https://randomuser.me/api/portraits/women/47.jpg" },
            { id: 3, client: "Sizwe Khumalo", company: "Khumalo Manufacturing Ltd", text: "The team at SwaziLegal provided outstanding criminal defense representation. Their dedication to justice is unparalleled.", rating: 5, avatar: "https://randomuser.me/api/portraits/men/18.jpg" },
            { id: 4, client: "Lindiwe Zwane", company: "Zwane Property Investments", text: "Excellent service in handling our property transfers and bond registrations. Professional, efficient, and transparent throughout the process.", rating: 5, avatar: "https://randomuser.me/api/portraits/women/62.jpg" },
            { id: 5, client: "Mpumelelo Sibaya", company: "Sibaya & Co Legal Consulting", text: "Their labor law expertise helped us navigate complex employment disputes with ease. Truly exceptional legal guidance.", rating: 5, avatar: "https://randomuser.me/api/portraits/men/45.jpg" },
            { id: 6, client: "Naledi Motlanthe", company: "Individual", text: "The estate administration services were seamless and professional. They made a difficult time much easier for our family.", rating: 5, avatar: "https://randomuser.me/api/portraits/women/28.jpg" }
        ]
    };

    // Render immediately with hardcoded data
    renderPageContent();

    // Try to fetch latest data from JSON
    try {
        const fetchPath = (typeof wpData !== 'undefined' && wpData.jsonPath) ? wpData.jsonPath : 'data/content.json';
        const response = await fetch(fetchPath);
        if (response.ok) {
            const freshData = await response.json();
            contentData = { ...contentData, ...freshData };
            renderPageContent(); // Re-render with fresh data if available
        }
    } catch (error) {
        console.warn('Using fallback content. Run with a local server for full dynamic features.');
    }
}

/**
 * Render content based on current page
 */
function renderPageContent() {
    // Check for specific page elements first (more specific)
    const isTeamPage = document.getElementById('team-full-list');
    const isPracticesPage = document.getElementById('practices-full-list') || document.getElementById('detailed-practices');
    const isServicesPage = document.getElementById('services-grid');
    // Homepage check last (least specific)
    const isHomePage = document.querySelector('.hero') || window.location.pathname === '/' || window.location.pathname.endsWith('index.php');

    if (isTeamPage) {
        renderTeamPage();
    } else if (isPracticesPage) {
        renderPracticesPage();
    } else if (isServicesPage) {
        renderServicesPage();
    } else if (isHomePage) {
        renderHomePage();
    }
}

/**
 * Render home page content
 */
function renderHomePage() {
    // Render practice area previews (Original 3 cards)
    const practicesPreview = document.getElementById('practices-preview');
    if (practicesPreview) {
        const practices = contentData.practices ? contentData.practices.slice(0, 3) : [];
        practicesPreview.innerHTML = practices.map(practice => `
            <div class="practice-card">
                ${practice.image ? `<img src="${resolveImagePath(practice.image)}" alt="${practice.name}" class="practice-image" loading="lazy">` : ''}
                <div class="practice-card-content">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;"><i class="${practice.faIcon || 'fas fa-briefcase'}"></i></div>
                    <h3>${practice.name}</h3>
                    <p>${practice.description}</p>
                </div>
            </div>
        `).join('');
    }

    // Render Experts & Services Highlight (Homepage 4x1 Grid)
    const featuredServicesGrid = document.getElementById('featured-services-grid');
    if (featuredServicesGrid) {
        const practices = contentData.practices ? contentData.practices.slice(0, 4) : [];
        featuredServicesGrid.innerHTML = practices.map(p => `
            <div class="premium-glass" style="padding: 2rem; text-align: center; color: var(--primary-dark);">
                <div style="font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 1rem;"><i class="${p.faIcon}"></i></div>
                <h4 style="margin-bottom: 0.5rem; font-size: 1rem;">${p.name}</h4>
                <p style="font-size: 0.75rem; color: var(--gray-dark);">${p.services[0]}</p>
            </div>
        `).join('');
    }

    // Render Senior Partners preview (Home Page)
    const teamPreview = document.getElementById('team-preview');
    if (teamPreview) {
        const team = contentData.team ? contentData.team.slice(0, 2) : []; // Senior Partners
        teamPreview.innerHTML = team.map(member => `
            <div class="team-card-new" onclick="viewTeamMember(${member.id})" style="padding: 2rem; display: flex; align-items: center; gap: 2rem; text-align: left;">
                ${member.image ?
                `<img src="${resolveImagePath(member.image)}" alt="${member.name}" class="team-avatar-circle" style="width: 120px; height: 120px; margin: 0;" loading="lazy">` :
                `<div class="team-avatar-placeholder" style="width: 120px; height: 120px; font-size: 2rem; margin: 0;"><i class="fas fa-user"></i></div>`
            }
                <div>
                    <div class="team-card-name" style="font-size: 1.25rem;">${member.name}</div>
                    <div class="team-card-title" style="font-size: 0.9rem; color: var(--primary-blue);">${member.title}</div>
                    <div class="team-card-specialty" style="font-size: 0.8rem; margin-bottom: 1rem;">${member.specialty}</div>
                    <div class="team-card-cta" style="font-size: 0.8rem; margin-top: 0;">
                        View Full Profile <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Render testimonials carousel
    const carouselTrack = document.getElementById('carousel-track');
    if (carouselTrack) {
        const testimonials = contentData.testimonials || [];
        carouselTrack.innerHTML = testimonials.map(testimonial => `
            <div class="testimonial-slide">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        ${testimonial.avatar ?
                `<img src="${resolveImagePath(testimonial.avatar)}" alt="${testimonial.client}" class="testimonial-avatar" loading="lazy">` :
                `<div style="width: 60px; height: 60px; border-radius: 50%; background: var(--primary-blue); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;"><i class="fas fa-user"></i></div>`
            }
                        <div class="testimonial-info">
                            <span class="testimonial-name">${testimonial.client}</span>
                            <span class="testimonial-company">${testimonial.company || 'Client'}</span>
                        </div>
                    </div>
                    <p class="testimonial-text">${testimonial.text}</p>
                    <div class="testimonial-rating">
                        ${Array(testimonial.rating).fill('<i class="fas fa-star"></i>').join('')}
                    </div>
                </div>
            </div>
        `).join('');
        
        // Initialize carousel
        initTestimonialCarousel();
    }

    // Render services preview (Legacy)
    const servicesPreview = document.getElementById('services-preview');
    if (servicesPreview) {
        let allServices = [];
        contentData.practices.forEach(p => {
            p.services.forEach(s => allServices.push({ name: s, practice: p.name, icon: p.faIcon }));
        });

        // Pick 6 random/featured services
        const featured = allServices.slice(0, 6);
        servicesPreview.innerHTML = featured.map(s => `
            <div class="premium-glass" style="padding: 1.5rem; text-align: center; color: var(--primary-dark);">
                <div style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 1rem;"><i class="${s.icon}"></i></div>
                <h4 style="margin-bottom: 0.5rem;">${s.name}</h4>
                <p style="font-size: 0.85rem; color: var(--gray-dark);">${s.practice}</p>
            </div>
        `).join('');
    }

    updateAppointmentTracker();
    setupBookingForm();
}

/**
 * Render practices page
 */
function renderPracticesPage() {
    // Full practices list
    const practicesFullList = document.getElementById('practices-full-list');
    if (practicesFullList) {
        const practices = contentData.practices || [];
        practicesFullList.innerHTML = practices.map(practice => `
            <div class="masonry-item animate-on-scroll">
                <div class="practice-card overlap-card" style="min-height: 250px;">
                    ${practice.image ? `<img src="${resolveImagePath(practice.image)}" alt="${practice.name}" class="practice-image" loading="lazy">` : ''}
                    <div class="practice-card-content">
                        <div style="font-size: 3rem; margin-bottom: 1rem;"><i class="${practice.faIcon || 'fas fa-briefcase'}"></i></div>
                        <h3>${practice.name}</h3>
                        <p>${practice.description}</p>
                        <button class="btn btn-secondary" style="margin-top: 1rem;" onclick="viewPracticeDetails(${practice.id})">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
        
        // Initialize scroll animations
        initCardScrollAnimations();
    }

    // Detailed practices
    const detailedPractices = document.getElementById('detailed-practices');
    if (detailedPractices) {
        const practices = contentData.practices || [];
        detailedPractices.innerHTML = practices.map((practice, index) => `
            <div style="margin-bottom: 3rem;">
                <div class="grid grid-2" style="align-items: center; gap: 2rem;">
                    <div ${index % 2 === 1 ? 'style="order: 2;"' : ''}>
                        <div style="font-size: 4rem; margin-bottom: 1rem;"><i class="${practice.faIcon || 'fas fa-briefcase'}"></i></div>
                        <h3>${practice.name}</h3>
                        <p>${practice.description}</p>
                    </div>
                    <div ${index % 2 === 1 ? 'style="order: 1;"' : ''} class="glass-card" style="padding: 2rem;">
                        ${practice.image ? `<img src="${resolveImagePath(practice.image)}" alt="${practice.name}" class="about-image" style="margin-bottom: 1.5rem;" loading="lazy">` : ''}
                        <h4 style="color: var(--primary-blue); margin-bottom: 1rem;">Services Offered:</h4>
                        <ul style="list-style: none;">
                            ${practice.services.map(service => `
                                <li style="padding: 0.5rem 0; border-bottom: 1px solid rgba(0,0,0,0.1);">
                                    <i class="fas fa-check-circle" style="color: var(--primary-blue); margin-right: 0.5rem;"></i>${service}
                                </li>
                            `).join('')}
                        </ul>
                        <a href="contact.html" class="btn btn-primary" style="width: 100%; margin-top: 1.5rem; text-align: center;">
                            Get Consultation
                        </a>
                    </div>
                </div>
            </div>
        `).join('');
    }
}

/**
 * Render team page - Masonry layout with glass cards & circular avatars
 */
function renderTeamPage() {
    const teamFullList = document.getElementById('team-full-list');
    if (!teamFullList) return;

    const team = contentData.team || [];

    teamFullList.innerHTML = team.map(member => {
        // Alternate card heights for masonry visual variety
        const extraBio = member.bio && member.bio.length > 100 ? member.bio : (member.bio || '') + '';
        return `
        <div class="masonry-item animate-on-scroll">
            <div class="team-card-new" onclick="viewTeamMember(${member.id})">
                ${member.image
                ? `<img src="${resolveImagePath(member.image)}" alt="${member.name}" class="team-avatar-circle" loading="lazy">`
                : `<div class="team-avatar-placeholder"><i class="fas fa-user"></i></div>`
            }
                <div class="team-card-name">${member.name}</div>
                <div class="team-card-title">${member.title}</div>
                <div class="team-card-specialty">${member.specialty}</div>
                ${extraBio ? `<p class="team-card-bio">${extraBio.substring(0, 110)}${extraBio.length > 110 ? '…' : ''}</p>` : ''}
                <div class="team-card-cta">
                    View Profile <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </div>`;
    }).join('');

    // Initialize scroll animations for cards
    initCardScrollAnimations();
    
    // Lenis-style smooth scroll (vanilla JS, no library needed)
    initLenisScroll();
}

/**
 * View team member details
 */
function viewTeamMember(memberId) {
    const member = contentData.team.find(m => m.id === memberId);
    if (!member) return;

    const modal = document.getElementById('team-modal');
    const modalContent = document.getElementById('modal-content');

    if (!modal) return;

    modalContent.innerHTML = `
        <div style="text-align: center; margin-bottom: 1.5rem;">
            ${member.image ?
            `<img src="${resolveImagePath(member.image)}" alt="${member.name}" class="team-image" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; margin-bottom: 1.5rem; border: 4px solid var(--primary-blue);">` :
            `<div style="font-size: 5rem; margin-bottom: 1rem;"><i class="fas fa-user-circle"></i></div>`
        }
            <h2 style="color: var(--primary-dark); margin-bottom: 0.5rem;">${member.name}</h2>
            <div style="color: var(--accent-blue); font-weight: 600; margin-bottom: 0.5rem;">
                ${member.title}
            </div>
            <div style="color: var(--accent-gold); font-weight: 600; margin-bottom: 1.5rem;">
                ${member.specialty}
            </div>
        </div>
        <p style="margin-bottom: 1.5rem;">${member.bio}</p>
        <div style="background: var(--gray-light); padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p><strong>📧 Email:</strong> <a href="mailto:${member.email}">${member.email}</a></p>
        </div>
        <a href="contact.html" class="btn btn-primary" style="width: 100%; text-align: center;">
            Schedule Consultation with ${member.name.split(' ')[0]}
        </a>
    `;

    modal.style.display = 'flex';
}

/**
 * Setup accordions
 */
function setupAccordions() {
    const headers = document.querySelectorAll('.accordion-header');

    headers.forEach(header => {
        header.addEventListener('click', function () {
            const content = this.nextElementSibling;
            const isActive = this.classList.contains('active');

            // Close all other accordion items
            document.querySelectorAll('.accordion-header.active').forEach(h => {
                if (h !== this) {
                    h.classList.remove('active');
                    h.nextElementSibling.classList.remove('active');
                }
            });

            // Toggle current item
            this.classList.toggle('active');
            content.classList.toggle('active');
        });
    });
}

/**
 * Initialize card scroll animations using Intersection Observer
 */
function initCardScrollAnimations() {
    const cards = document.querySelectorAll('.masonry-item.animate-on-scroll');
    
    if ('IntersectionObserver' in window) {
        const options = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Stagger animation delay for sequential reveal
                    const delay = index * 0.08;
                    entry.target.style.animationDelay = `${delay}s`;
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        cards.forEach(card => {
            observer.observe(card);
        });
    } else {
        // Fallback for browsers without Intersection Observer
        cards.forEach(card => {
            card.classList.add('animated');
        });
    }
}

/**
 * Initialize testimonial carousel
 */
function initTestimonialCarousel() {
    const carouselTrack = document.getElementById('carousel-track');
    const carouselPrev = document.getElementById('carousel-prev');
    const carouselNext = document.getElementById('carousel-next');
    const indicatorsContainer = document.getElementById('carousel-indicators');
    
    if (!carouselTrack) return;
    
    const slides = document.querySelectorAll('.testimonial-slide');
    const slideCount = slides.length;
    let currentIndex = 0;
    let autoPlayInterval;
    
    if (slideCount === 0) return;
    
    // Generate indicators
    if (indicatorsContainer) {
        indicatorsContainer.innerHTML = Array(slideCount)
            .fill()
            .map((_, i) => `<div class="indicator ${i === 0 ? 'active' : ''}" data-index="${i}"></div>`)
            .join('');
        
        // Add click handlers to indicators
        document.querySelectorAll('.indicator').forEach(indicator => {
            indicator.addEventListener('click', () => {
                currentIndex = parseInt(indicator.dataset.index);
                updateCarousel();
            });
        });
    }
    
    // Update carousel position and indicators
    function updateCarousel() {
        const itemsPerView = getItemsPerView();
        const translateValue = -currentIndex * (100 / itemsPerView);
        carouselTrack.style.transform = `translateX(${translateValue}%)`;
        
        // Update indicators
        document.querySelectorAll('.indicator').forEach((ind, i) => {
            ind.classList.toggle('active', i === currentIndex);
        });
        
        // Update button states
        updateButtonStates();
        
        // Reset autoplay
        resetAutoPlay();
    }
    
    // Get items per view based on screen size
    function getItemsPerView() {
        if (window.innerWidth < 768) return 1;
        if (window.innerWidth < 1024) return 2;
        return 3;
    }
    
    // Update button disabled states
    function updateButtonStates() {
        const itemsPerView = getItemsPerView();
        const maxIndex = Math.max(0, slideCount - itemsPerView);
        
        if (carouselPrev) carouselPrev.disabled = currentIndex === 0;
        if (carouselNext) carouselNext.disabled = currentIndex >= maxIndex;
    }
    
    // Navigate to previous slide
    function goToPrevious() {
        currentIndex = Math.max(0, currentIndex - 1);
        updateCarousel();
    }
    
    // Navigate to next slide
    function goToNext() {
        const itemsPerView = getItemsPerView();
        const maxIndex = Math.max(0, slideCount - itemsPerView);
        currentIndex = Math.min(maxIndex, currentIndex + 1);
        updateCarousel();
    }
    
    // Auto-play carousel
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            const itemsPerView = getItemsPerView();
            const maxIndex = Math.max(0, slideCount - itemsPerView);
            
            if (currentIndex >= maxIndex) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            updateCarousel();
        }, 5000); // Change slide every 5 seconds
    }
    
    // Reset auto-play timer
    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }
    
    // Event listeners
    if (carouselPrev) carouselPrev.addEventListener('click', goToPrevious);
    if (carouselNext) carouselNext.addEventListener('click', goToNext);
    
    // Handle window resize
    window.addEventListener('resize', () => {
        updateCarousel();
    });
    
    // Initialize
    updateCarousel();
    startAutoPlay();
    
    // Pause autoplay on hover
    const carousel = document.getElementById('testimonials-carousel');
    if (carousel) {
        carousel.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
        carousel.addEventListener('mouseleave', startAutoPlay);
    }
}

/**
 * Setup form handling
 */
function setupForms() {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
}

/**
 * Handle contact form submission
 */
function handleContactForm(e) {
    e.preventDefault();

    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        practice: document.getElementById('practice').value,
        subject: document.getElementById('subject').value,
        message: document.getElementById('message').value
    };

    // Validate form
    if (!validateForm(formData)) {
        showFormMessage('Please fill in all required fields', 'error');
        return;
    }

    // Show success message
    showFormMessage(
        'Thank you for your message! We will contact you within 24 hours.',
        'success'
    );

    // Reset form
    document.getElementById('contact-form').reset();

    // In a real application, you would send this data to a server
    console.log('Form submitted:', formData);
}

/**
 * Validate form data
 */
function validateForm(data) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^[0-9\s\-\+\(\)]+$/;

    if (!data.name || data.name.trim() === '') return false;
    if (!data.email || !emailRegex.test(data.email)) return false;
    if (!data.phone || !phoneRegex.test(data.phone)) return false;
    if (!data.practice || data.practice === '') return false;
    if (!data.subject || data.subject.trim() === '') return false;
    if (!data.message || data.message.trim() === '') return false;

    return true;
}

/**
 * Show form message
 */
function showFormMessage(message, type) {
    const messageDiv = document.getElementById('form-message');
    if (!messageDiv) return;

    messageDiv.textContent = message;
    messageDiv.style.display = 'block';
    messageDiv.style.backgroundColor = type === 'success' ? '#d4edda' : '#f8d7da';
    messageDiv.style.color = type === 'success' ? '#155724' : '#721c24';
    messageDiv.style.border = `1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'}`;

    // Auto-hide after 5 seconds
    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 5000);
}

/**
 * Initialize search functionality
 */
function initializeSearch() {
    const searchInput = document.getElementById('team-search');
    const filterSelect = document.getElementById('specialty-filter');

    if (searchInput) {
        searchInput.addEventListener('input', filterTeamMembers);
    }
    if (filterSelect) {
        filterSelect.addEventListener('change', filterTeamMembers);
    }
}

/**
 * Filter team members
 */
function filterTeamMembers() {
    const searchInput = document.getElementById('team-search');
    const filterSelect = document.getElementById('specialty-filter');

    if (!searchInput || !filterSelect) return;

    const searchTerm = searchInput.value.toLowerCase();
    const specialtyFilter = filterSelect.value.toLowerCase();

    const teamMembers = document.querySelectorAll('.team-member');

    teamMembers.forEach(member => {
        const name = member.querySelector('.team-name').textContent.toLowerCase();
        const specialty = member.querySelector('.team-specialty').textContent.toLowerCase();

        const matchesSearch = name.includes(searchTerm);
        const matchesSpecialty = specialtyFilter === '' || specialty.includes(specialtyFilter);

        member.style.display = (matchesSearch && matchesSpecialty) ? 'block' : 'none';
    });
}

/**
 * Setup interactivity
 */
function setupInteractivity() {
    // Close modal when X is clicked
    const closeButton = document.getElementById('close-modal');
    if (closeButton) {
        closeButton.addEventListener('click', function () {
            const modal = document.getElementById('team-modal');
            if (modal) modal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    const modal = document.getElementById('team-modal');
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
}

/**
 * Default content fallback
 */
function getDefaultContent() {
    return {
        firm: {
            name: "SwaziLegal",
            phone: "+268 2687 8132527",
            email: "info@swazilegal.sz",
            address: "Mbabane, Eswatini"
        },
        team: [],
        practices: [],
        faqs: [],
        testimonials: []
    };
}

/**
 * View practice details
 */
function viewPracticeDetails(practiceId) {
    const practice = contentData.practices.find(p => p.id === practiceId);
    if (practice) {
        // Scroll to detailed practices section
        const section = document.getElementById('practice-details');
        if (section) {
            section.scrollIntoView({ behavior: 'smooth' });
        }
    }
}

/**
 * Lenis-inspired smooth scroll (vanilla JS)
 * Adds momentum easing to the native scroll behaviour
 */
function initLenisScroll() {
    // Only run once
    if (window._lenisInitialized) return;
    window._lenisInitialized = true;

    let currentY = window.scrollY;
    let targetY = window.scrollY;
    let isRunning = false;
    const ease = 0.08; // lower = smoother / slower

    function lerp(a, b, t) { return a + (b - a) * t; }

    function update() {
        targetY = window.scrollY;
        currentY = lerp(currentY, targetY, ease);

        const diff = Math.abs(targetY - currentY);
        if (diff < 0.5) {
            currentY = targetY;
            isRunning = false;
            return;
        }
        requestAnimationFrame(update);
    }

    window.addEventListener('scroll', () => {
        if (!isRunning) {
            isRunning = true;
            requestAnimationFrame(update);
        }
    }, { passive: true });
}

/**
 * Render services page grid
 */
function renderServicesPage() {
    const servicesGrid = document.getElementById('services-grid');
    if (!servicesGrid) return;

    let html = '';
    contentData.practices.forEach(practice => {
        practice.services.forEach(service => {
            html += `
            <div class="masonry-item animate-on-scroll">
                <div class="premium-glass" style="color: var(--primary-dark);">
                    <div style="font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 1.5rem;">
                        <i class="${practice.faIcon}"></i>
                    </div>
                    <h3 style="margin-bottom: 1rem;">${service}</h3>
                    <p style="color: var(--gray-dark); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Professional legal assistance for ${service.toLowerCase()} within our ${practice.name} department.
                    </p>
                    <a href="#booking-section" class="btn btn-outlined" style="font-size: 0.8rem; padding: 0.6rem 1.2rem; margin-top: auto;">
                        Book Inquiry
                    </a>
                </div>
            </div>`;
        });
    });
    servicesGrid.innerHTML = html;

    // Initialize scroll animations
    initCardScrollAnimations();

    setupBookingForm();
}

/**
 * Setup WhatsApp Booking Form
 */
function setupBookingForm() {
    const form = document.getElementById('whatsapp-booking-form');
    const lawyerSelect = document.getElementById('booking-lawyer');
    const serviceSelect = document.getElementById('booking-service');

    if (!form || !lawyerSelect || !serviceSelect) return;

    // Populate Lawyers
    if (contentData.team) {
        lawyerSelect.innerHTML = '<option value="">Choose Lawyer...</option>' +
            contentData.team.map(l => `<option value="${l.name}">${l.name}</option>`).join('');
    }

    // Populate Services
    if (contentData.practices) {
        let allServices = [];
        contentData.practices.forEach(p => {
            p.services.forEach(s => allServices.push(s));
        });
        serviceSelect.innerHTML = '<option value="">Choose Service...</option>' +
            allServices.map(s => `<option value="${s}">${s}</option>`).join('');
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('booking-name').value;
        const phone = document.getElementById('booking-phone').value;
        const email = document.getElementById('booking-email').value;
        const date = document.getElementById('booking-date').value;
        const lawyer = lawyerSelect.value;
        const service = serviceSelect.value;
        const message = document.getElementById('booking-message').value;

        const appointment = {
            name, phone, email, date, lawyer, service,
            timestamp: new Date().getTime(),
            status: 'Pending Approval'
        };

        // Save to local storage for the tracker
        localStorage.setItem('latest_appointment', JSON.stringify(appointment));
        updateAppointmentTracker();

        const whatsappNumber = contentData.firm.whatsapp || "26878132527";
        const text = `*New Appointment Request - SwaziLegal*\n\n` +
            `*Client Name:* ${name}\n` +
            `*Phone:* ${phone}\n` +
            `*Email:* ${email}\n` +
            `*Preferred Date:* ${date}\n` +
            `*Lawyer:* ${lawyer}\n` +
            `*Service:* ${service}\n` +
            `*Case Summary:* ${message || "N/A"}\n\n` +
            `_Sent from SwaziLegal Website_`;

        const encodedText = encodeURIComponent(text);
        const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedText}`;

        window.open(whatsappUrl, '_blank');

        alert('Your request has been saved and prepared for WhatsApp!');
        form.reset();
    });
}

/**
 * Update Appointment Status Tracker UI
 */
function updateAppointmentTracker() {
    const trackerContainer = document.getElementById('appointment-tracker-ui');
    if (!trackerContainer) return;

    const latest = localStorage.getItem('latest_appointment');
    if (!latest) return;

    const appt = JSON.parse(latest);
    const dateObj = new Date(appt.timestamp);
    const timeString = dateObj.toLocaleDateString() + ' ' + dateObj.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    trackerContainer.innerHTML = `
        <div style="padding: 1rem; background: rgba(13, 71, 161, 0.05); border-radius: 12px; border-left: 4px solid var(--accent-gold);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                <span style="font-size: 0.75rem; color: var(--gray-medium);">${timeString}</span>
                <span style="font-size: 0.7rem; font-weight: 700; background: #FFF3E0; color: #E65100; padding: 2px 8px; border-radius: 10px;">${appt.status}</span>
            </div>
            <p style="font-weight: 700; font-size: 0.9rem; margin-bottom: 0.25rem;">${appt.service}</p>
            <p style="font-size: 0.8rem; color: var(--gray-dark); margin-bottom: 0.75rem;">with ${appt.lawyer}</p>
            
            <div style="font-size: 0.75rem; color: var(--gray-medium); line-height: 1.4;">
                <p><i class="fas fa-calendar"></i> Requested: ${appt.date}</p>
            </div>
            
            <div style="margin-top: 1rem; display: flex; gap: 10px;">
                <button onclick="localStorage.removeItem('latest_appointment'); updateAppointmentTracker();" 
                    style="background: none; border: none; color: #F44336; font-size: 0.75rem; cursor: pointer; text-decoration: underline;">
                    Cancel Request
                </button>
            </div>
        </div>
        
        <div style="margin-top: 1rem; text-align: center;">
            <p style="font-size: 0.75rem; color: var(--primary-blue); font-weight: 600;">
                <i class="fas fa-sync-alt fa-spin"></i> Awaiting Lawyer Response...
            </p>
        </div>
    `;
}

// Initialise smooth scroll globally on all pages
initLenisScroll();
