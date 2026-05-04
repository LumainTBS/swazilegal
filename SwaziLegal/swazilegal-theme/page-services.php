<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/Hero.jpeg'); min-height: 40vh; height: 40vh;">
        <div class="hero-content">
            <h1 style="color: white;" class="text-reveal">Our <span class="accent">Services</span></h1>
            <p style="color: rgba(255,255,255,0.9);" class="text-reveal">
                Comprehensive legal solutions tailored to your specific needs
            </p>
        </div>
        <div class="hero-gradient-bottom"></div>
    </section>

    <!-- SERVICES GRID SECTION -->
    <div class="section-container overlap-section">
        <div class="masonry-grid" id="services-grid">
            <!-- Dynamically loaded from JSON via JS -->
        </div>
    </div>

    <!-- WHATSAPP BOOKING SECTION -->
    <section id="booking-section" style="padding: 5rem 1.5rem; position: relative; overflow: hidden;">
        <div class="section-container">
            <div class="section-title">
                <h2 class="text-reveal">Secure Your Appointment</h2>
                <p class="section-subtitle text-reveal">Provide your details and we'll confirm via WhatsApp shortly</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 350px; gap: 2rem; align-items: start;">
                <!-- Booking Form -->
                <div class="premium-glass" style="padding: 3rem; color: var(--primary-dark);">
                    <form id="whatsapp-booking-form">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name</label>
                                <input type="text" id="booking-name" required placeholder="Full Name" 
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Phone Number</label>
                                <input type="tel" id="booking-phone" required placeholder="+268 7xxx xxxx" 
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email Address</label>
                                <input type="email" id="booking-email" required placeholder="email@example.sz" 
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Preferred Date</label>
                                <input type="date" id="booking-date" required
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Select Lawyer</label>
                                <select id="booking-lawyer" required
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                                    <option value="">Choose Lawyer...</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Select Service</label>
                                <select id="booking-service" required
                                    style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);">
                                    <option value="">Choose Service...</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-bottom: 2rem;">
                            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Brief Case Summary</label>
                            <textarea id="booking-message" rows="3" placeholder="Tell us more about your case"
                                style="width: 100%; padding: 0.8rem; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1); background: rgba(255,255,255,0.6);"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1.2rem; font-size: 1.1rem; border-radius: 12px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                            <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i> Request WhatsApp Confirmation
                        </button>
                    </form>
                </div>

                <!-- Appointment Status Sidecard -->
                <div class="premium-glass" style="padding: 2rem; color: var(--primary-dark); height: fit-content;">
                    <h3 style="margin-bottom: 1.5rem; font-size: 1.2rem; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 0.5rem;">
                        <i class="fas fa-clock"></i> Appointment Status
                    </h3>
                    <div id="appointment-tracker-ui">
                        <div style="text-align: center; padding: 2rem 1rem;">
                            <i class="fas fa-calendar-check" style="font-size: 3rem; color: var(--gray-medium); opacity: 0.3; margin-bottom: 1rem;"></i>
                            <p style="color: var(--gray-dark); font-size: 0.9rem;">No active requests found.<br>Fill out the form to start.</p>
                        </div>
                    </div>
                    
                    <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid rgba(0,0,0,0.05); font-size: 0.8rem; color: var(--gray-medium);">
                        <p><i class="fas fa-info-circle"></i> Once submitted, your request is sent to our legal team via WhatsApp. You will receive an "Approved" or "Rescheduled" message directly on your phone.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
