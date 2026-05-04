<footer>
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-section">
                <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="SwaziLegal Logo" style="height: 45px; width: auto;">
                    <h4 style="margin: 0; color: white;">SwaziLegal</h4>
                </div>
                <p style="color: rgba(255,255,255,0.8); margin-bottom: 1rem;">
                    <?php bloginfo( 'description' ); ?>
                </p>
                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">
                    <strong>Address:</strong><br>
                    Mbabane, Eswatini
                </p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'fallback_cb'    => 'swazilegal_footer_fallback_menu',
                ) );
                
                function swazilegal_footer_fallback_menu() {
                    ?>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About Us</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/practices' ) ); ?>">Practice Areas</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Our Services</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/team' ) ); ?>">Our Team</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            <div class="footer-section">
                <h4>Contact Info</h4>
                <ul>
                    <li><a href="tel:+26878132527"><i class="fas fa-phone"></i> +268 76 805 805</a></li>
                    <li><a href="https://wa.me/26878132527" target="_blank"><i class="fab fa-whatsapp"></i>
                            WhatsApp</a></li>
                    <li><a href="mailto:info@swazilegal.sz"><i class="fas fa-envelope"></i> info@swazilegal.sz</a>
                    </li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Legal</h4>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Terms of Service</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Disclaimer</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> SwaziLegal. All rights reserved. Licensed to practice in Eswatini.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
