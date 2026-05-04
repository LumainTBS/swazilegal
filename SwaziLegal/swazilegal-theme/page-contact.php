<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/Hero.jpeg'); min-height: 40vh; height: 40vh;">
        <div class="hero-content">
            <h1 style="color: white;" class="text-reveal">Contact <span class="accent">Us</span></h1>
            <p style="color: rgba(255,255,255,0.9);" class="text-reveal">
                We're here to help. Get in touch with our team
            </p>
        </div>
        <div class="hero-gradient-bottom"></div>
        <div class="hero-floating-card left text-reveal">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <i class="fas fa-headset" style="color: var(--accent-gold); font-size: 1.5rem;"></i>
                <span style="font-weight: 700;">24/7</span>
            </div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.8);">Support Availability</div>
        </div>
    </section>

    <!-- CONTACT INFORMATION & FORM -->
    <section style="padding: 0 1.5rem 5rem 1.5rem; background: var(--white-off);">
        <div class="section-container overlap-section">
            <div class="overlap-card grid grid-2" style="background: rgba(255,255,255,0.95); gap: 4rem;">
                <!-- CONTACT INFO -->
                <div>
                    <h2>Get In Touch</h2>
                    <p style="margin-bottom: 2rem;">
                        We're ready to discuss your legal matter. Contact us through any of the following channels:
                    </p>

                    <div class="glass-card minimal" style="margin-bottom: 1.5rem;">
                        <h4 style="color: var(--accent-blue); margin-bottom: 0.5rem;"><i class="fas fa-phone"></i> Phone
                        </h4>
                        <p style="margin-bottom: 0.5rem;"><strong>+268 2687 8132527</strong></p>
                        <p style="font-size: 0.9rem; color: var(--gray-dark);">Available Monday-Friday, 8am-5pm</p>
                    </div>

                    <div class="glass-card minimal" style="margin-bottom: 1.5rem;">
                        <h4 style="color: var(--accent-blue); margin-bottom: 0.5rem;"><i class="fab fa-whatsapp"></i>
                            WhatsApp</h4>
                        <p style="margin-bottom: 0.5rem;">
                            <a href="https://wa.me/26878132527" target="_blank"
                                style="color: var(--accent-blue); font-weight: 600;">
                                Message us on WhatsApp
                            </a>
                        </p>
                        <p style="font-size: 0.9rem; color: var(--gray-dark);">Quick responses to booking inquiries</p>
                    </div>

                    <div class="glass-card minimal" style="margin-bottom: 1.5rem;">
                        <h4 style="color: var(--accent-blue); margin-bottom: 0.5rem;"><i class="fas fa-envelope"></i>
                            Email</h4>
                        <p style="margin-bottom: 0.5rem;">
                            <a href="mailto:info@swazilegal.sz" style="color: var(--accent-blue); font-weight: 600;">
                                info@swazilegal.sz
                            </a>
                        </p>
                        <p style="font-size: 0.9rem; color: var(--gray-dark);">We'll respond within 24 hours</p>
                    </div>

                    <div class="glass-card minimal">
                        <h4 style="color: var(--accent-blue); margin-bottom: 0.5rem;"><i
                                class="fas fa-map-marker-alt"></i> Location</h4>
                        <p style="margin-bottom: 0.5rem;"><strong>Mbabane, Eswatini</strong></p>
                        <p style="font-size: 0.9rem; color: var(--gray-dark);">For office visits, please call ahead for
                            appointment</p>
                    </div>
                </div>

                <!-- CONTACT FORM -->
                <div class="form-container">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-dark);">Send us a Message</h3>
                    <form id="contact-form" style="margin: 0;">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="practice">Practice Area *</label>
                            <select id="practice" name="practice" required>
                                <option value="">Select a practice area...</option>
                                <option value="Corporate">Corporate & Commercial Law</option>
                                <option value="Family">Family Law</option>
                                <option value="Criminal">Criminal Law</option>
                                <option value="Employment">Labor & Employment Law</option>
                                <option value="Real Estate">Real Estate & Property Law</option>
                                <option value="Intellectual Property">Intellectual Property</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Send Message
                        </button>

                        <p style="font-size: 0.85rem; color: var(--gray-dark); margin-top: 1rem;">
                            By submitting this form, you agree that we may contact you regarding your inquiry.
                        </p>
                    </form>
                    <div id="form-message" style="display: none; margin-top: 1rem; padding: 1rem; border-radius: 8px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section
        style="background: linear-gradient(135deg, rgba(21, 101, 192, 0.05) 0%, rgba(33, 150, 243, 0.03) 100%); padding: 4rem 1.5rem; position: relative;">
        <div class="section-container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="accordion" style="max-width: 800px; margin: 0 auto;">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>How quickly will you respond to my inquiry?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        We aim to respond to all inquiries within 24 business hours. For urgent matters, please call us
                        directly at +268 2687 8132527.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Is the initial consultation free?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        We offer a free 30-minute initial consultation to discuss your legal matter and determine how we
                        can best assist you.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Do you offer virtual consultations?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        Yes! We offer phone, video, and in-person consultations to accommodate your preferences and
                        schedule.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>What information should I bring to my consultation?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        Please gather any relevant documents, contracts, correspondence, or information related to your
                        legal matter. This helps us provide more accurate guidance.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Is there a better time to reach you?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        We're available Monday through Friday from 8am to 5pm. For after-hours emergencies, you can
                        leave a voicemail and we'll respond the next business day.
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
