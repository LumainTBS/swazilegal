<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/Hero.jpeg'); min-height: 40vh; height: 40vh;">
        <div class="hero-content">
            <h1 style="color: white;" class="text-reveal">Our Team</h1>
            <p style="color: rgba(255,255,255,0.9);" class="text-reveal">
                Experienced attorneys dedicated to your legal success
            </p>
        </div>
        <div class="hero-gradient-bottom"></div>
        <div class="hero-floating-card right text-reveal">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <div class="mockup-avatar"
                    style="background-image: url('https://randomuser.me/api/portraits/women/68.jpg'); background-size: cover; width: 24px; height: 24px; border: none; margin: 0;">
                </div>
                <div class="mockup-avatar"
                    style="background-image: url('https://randomuser.me/api/portraits/men/22.jpg'); background-size: cover; width: 24px; height: 24px; border: none; margin: 0; margin-left: -10px;">
                </div>
                <div class="mockup-avatar"
                    style="background-image: url('https://randomuser.me/api/portraits/women/44.jpg'); background-size: cover; width: 24px; height: 24px; border: none; margin: 0; margin-left: -10px;">
                </div>
            </div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.8); margin-top: 5px;">Elite Legal Experts</div>
        </div>
    </section>

    <!-- TEAM MEMBERS DISPLAY -->
    <div class="section-container overlap-section">
        <div class="masonry-grid" id="team-full-list">
            <!-- Loaded via JS -->
        </div>
    </div>

    <!-- TEAM MEMBER DETAIL MODAL -->
    <div id="team-modal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 2000; align-items: center; justify-content: center;">
        <div style="background: rgba(255,255,255,0.55); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.9); border-radius: 28px; padding: 2.5rem; max-width: 560px; width: 90%; max-height: 90vh; overflow-y: auto; box-shadow: 0 30px 70px rgba(0,0,0,0.2);">
            <button id="close-modal"
                style="background: rgba(0,0,0,0.08); border: none; font-size: 1.1rem; cursor: pointer; float: right; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: background 0.2s ease;">✕</button>
            <div id="modal-content"></div>
        </div>
    </div>

    <!-- CREDENTIALS SECTION -->
    <section
        style="background: linear-gradient(135deg, rgba(13, 71, 161, 0.05) 0%, rgba(33, 150, 243, 0.03) 100%); padding: 4rem 1.5rem; position: relative;">
        <div class="section-container">
            <div class="section-title">
                <h2>Our Credentials</h2>
                <p class="section-subtitle">All attorneys are licensed and in good standing with the Law Society of
                    Eswatini</p>
            </div>
            <div class="grid grid-3">
                <div class="glass-card">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--accent-gold);"><i
                            class="fas fa-certificate"></i></div>
                    <h4 style="color: var(--primary-dark); margin-bottom: 1rem;">Licensed</h4>
                    <p style="color: var(--gray-dark);">All our attorneys hold valid licenses to practice law in
                        Eswatini and maintain continued legal education.</p>
                </div>
                <div class="glass-card">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--accent-light-blue);"><i
                            class="fas fa-trophy"></i></div>
                    <h4 style="color: var(--primary-dark); margin-bottom: 1rem;">Experienced</h4>
                    <p style="color: var(--gray-dark);">Our team brings decades of combined legal experience across
                        multiple practice areas.</p>
                </div>
                <div class="glass-card">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem; color: #4CAF50;"><i
                            class="fas fa-handshake"></i></div>
                    <h4 style="color: var(--primary-dark); margin-bottom: 1rem;">Professional</h4>
                    <p style="color: var(--gray-dark);">We adhere to the highest ethical standards and professional
                        conduct requirements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT TEAM -->
    <section style="background: var(--gradient-subtle); padding: 4rem 1.5rem;">
        <div class="section-container text-center">
            <h2 style="color: white; margin-bottom: 1.5rem;">Connect With Our Team</h2>
            <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem;">
                Speak directly with an attorney about your legal needs
            </p>
            <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-secondary">Schedule Consultation</a>
                <a href="tel:+26878132527" class="btn btn-outlined">Call Now</a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
