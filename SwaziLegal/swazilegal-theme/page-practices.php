<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/H2.jpg'); min-height: 40vh; height: 40vh;">
        <div class="hero-content">
            <h1 style="color: white;" class="text-reveal">Practice <span class="accent">Areas</span></h1>
            <p style="color: rgba(255,255,255,0.9);" class="text-reveal">
                Comprehensive legal services across multiple practice areas
            </p>
        </div>
        <div class="hero-gradient-bottom"></div>
        <div class="hero-floating-card left text-reveal">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <i class="fas fa-file-contract" style="color: var(--accent-gold); font-size: 1.5rem;"></i>
                <span style="font-weight: 700;">Full Service</span>
            </div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.8);">All legal disciplines</div>
        </div>
    </section>

    <!-- PRACTICE AREAS FULL LIST -->
    <div class="section-container overlap-section">
        <div id="practices-full-list" class="overlap-grid">
            <!-- Loaded via JS -->
        </div>
    </div>

    <!-- DETAILED PRACTICES -->
    <section id="practice-details"
        style="background: linear-gradient(135deg, rgba(21, 101, 192, 0.05) 0%, rgba(33, 150, 243, 0.03) 100%); padding: 4rem 1.5rem; position: relative;">
        <div class="section-container" id="detailed-practices">
            <!-- Loaded via JS -->
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section style="padding: 4rem 1.5rem;">
        <div class="section-container">
            <div class="section-title">
                <h2>Practice Area FAQs</h2>
            </div>
            <div class="accordion" style="max-width: 800px; margin: 0 auto;">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>What practice area should I contact?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        Based on your legal issue, choose the relevant practice area from our list.
                        However, if you're unsure, feel free to contact us directly at +268 2687 8132527
                        and we can guide you to the appropriate attorney.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Do you handle matters outside these practice areas?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        While these are our main practice areas, we may be able to assist with other matters
                        or refer you to appropriate specialists. Please contact us to discuss your specific situation.
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Can I have one attorney handling multiple types of cases?</span>
                        <span class="accordion-icon"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="accordion-content">
                        Yes! Some of our experienced attorneys practice in multiple areas.
                        We'll ensure you have the most appropriate expertise for your situation.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section style="background: var(--gradient-accent); padding: 4rem 1.5rem; text-align: center;">
        <div class="section-container">
            <h2 style="color: white; margin-bottom: 1.5rem;">
                Need Legal Assistance?
            </h2>
            <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem;">
                Contact us to discuss your legal matter with an experienced attorney
            </p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary">Contact Us Today</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
