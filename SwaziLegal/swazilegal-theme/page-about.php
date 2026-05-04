<?php get_header(); ?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/H3.jpg'); min-height: 40vh; height: 40vh;">
        <div class="hero-content">
            <h1 style="color: white;" class="text-reveal">About <span class="accent">SwaziLegal</span></h1>
            <p style="color: rgba(255,255,255,0.9);" class="text-reveal">
                Dedicated to excellence and justice since 2015
            </p>
        </div>
        <div class="hero-gradient-bottom"></div>
        <div class="hero-floating-card right text-reveal">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 5px;">
                <i class="fas fa-balance-scale" style="color: var(--accent-gold); font-size: 1.5rem;"></i>
                <span style="font-weight: 700;">Est. 2015</span>
            </div>
            <div style="font-size: 0.8rem; color: rgba(255,255,255,0.8);">Decades of experience</div>
        </div>
    </section>

    <!-- FIRM HISTORY - INSIGHTS LAYOUT -->
    <section style="background: var(--white-off); padding: 5rem 1.5rem; position: relative;">
        <div class="section-container">
            <div class="insights-layout text-reveal">
                <div>
                    <h2 style="font-size: 2.8rem; line-height: 1.2; margin-bottom: 1.5rem; font-weight: 800;">Our
                        Firm's<br><span
                            style="font-style: italic; font-weight: 400; color: var(--primary-dark);">history &
                            vision</span></h2>
                    <p style="color: var(--gray-dark); margin-bottom: 3rem; font-size: 1.1rem; max-width: 90%;">
                        SwaziLegal was founded with a simple mission: to provide exceptional legal services to the
                        people and businesses of Eswatini. Today, we stand as one of the leading law firms in the
                        country.</p>

                    <div class="insights-list">
                        <div class="insight-item">
                            <h4><span style="color: var(--primary-blue); font-weight: 300;">2015</span> Foundation</h4>
                            <p>Established as a small practice focusing on integrity and expertise.</p>
                        </div>
                        <div class="insight-item active">
                            <h4><span style="color: var(--primary-blue); font-weight: 300;">2019</span> National
                                Recognition</h4>
                            <p>Recognized as a Top Law Firm in Eswatini, handling major corporate and civil cases.</p>
                        </div>
                        <div class="insight-item">
                            <h4><span style="color: var(--primary-blue); font-weight: 300;">2024</span> Digital Expansion
                            </h4>
                            <p>Launched a modern, data-driven platform to better serve our clients remotely.</p>
                        </div>
                    </div>
                </div>

                <div class="insight-visual"
                    style="background: linear-gradient(135deg, rgba(33, 150, 243, 0.1) 0%, rgba(13, 71, 161, 0.1) 100%);">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/malumane.png"
                        alt="Law Firm"
                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); opacity: 0.9;">

                    <div class="bento-mockup"
                        style="position: absolute; bottom: 30px; right: -20px; width: 60%; background: rgba(255,255,255,0.95); padding: 1.5rem;">
                        <div style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark);">Client
                            Satisfaction</div>
                        <div style="font-size: 2.5rem; font-weight: 800; color: var(--primary-dark); margin: 5px 0;">98%
                        </div>
                        <div class="mockup-bar"
                            style="width: 100%; background: linear-gradient(90deg, #4CAF50, #81C784); height: 12px; margin-top: 10px; border-radius: 6px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION & VALUES -->
    <section style="background: var(--gradient-accent); padding: 4rem 1.5rem; color: white;">
        <div class="section-container">
            <div class="grid grid-3">
                <div class="text-center">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Our Mission</h3>
                    <p style="color: rgba(255,255,255,0.95);">
                        To provide exceptional legal services that uphold justice,
                        protect rights, and advance the interests of our clients
                        with integrity and professionalism.
                    </p>
                </div>
                <div class="text-center">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Our Vision</h3>
                    <p style="color: rgba(255,255,255,0.95);">
                        To be the most trusted and respected law firm in Eswatini,
                        known for our expertise, ethical practices, and outstanding
                        results for our clients.
                    </p>
                </div>
                <div class="text-center">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Our Values</h3>
                    <p style="color: rgba(255,255,255,0.95);">
                        Integrity, Excellence, Client-Focused Service, Professionalism,
                        and Access to Justice for all.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE VALUES -->
    <section
        style="background: linear-gradient(135deg, rgba(13, 71, 161, 0.04) 0%, rgba(33, 150, 243, 0.02) 100%); padding: 4rem 1.5rem; position: relative;">
        <div class="section-container">
            <div class="section-title">
                <h2>Our Core Values</h2>
                <p class="section-subtitle">The principles that guide everything we do</p>
            </div>
            <div class="grid grid-3">
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);">🎯 Integrity</h3>
                    <p>
                        We believe in honest dealings, transparent communication, and ethical practices.
                        Your trust is our most valuable asset.
                    </p>
                </div>
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);">🏆 Excellence</h3>
                    <p>
                        We strive for the highest standards in every case. Attention to detail and
                        thorough preparation are our hallmarks.
                    </p>
                </div>
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);"><i class="fas fa-heart"
                            style="color: var(--accent-gold);"></i> Compassion</h3>
                    <p>
                        We understand that legal matters are often sensitive. We approach each case
                        with empathy and personal attention.
                    </p>
                </div>
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);">🤝 Collaboration</h3>
                    <p>
                        We work closely with our clients to understand their needs and develop
                        strategies that serve their best interests.
                    </p>
                </div>
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);">🔒 Confidentiality</h3>
                    <p>
                        What you share with us is protected by attorney-client privilege.
                        Your privacy is paramount.
                    </p>
                </div>
                <div class="minimal">
                    <h3 style="color: var(--accent-blue);">⚡ Innovation</h3>
                    <p>
                        We embrace modern legal practices and technologies to serve our clients more effectively.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section style="background: var(--gradient-subtle); padding: 4rem 1.5rem; text-align: center;">
        <div class="section-container">
            <h2 style="color: white; margin-bottom: 1.5rem;">
                Experience the SwaziLegal Difference
            </h2>
            <p style="color: rgba(255,255,255,0.9); margin-bottom: 2rem; font-size: 1.2rem;">
                Contact us today for a consultation with one of our expert attorneys
            </p>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary">Schedule Consultation</a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
