<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <div class="header-container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="display: flex; align-items: center; text-decoration: none; gap: 1rem;">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="SwaziLegal Logo" style="height: 50px; width: auto;">
            <span style="color: var(--primary-dark); font-weight: 700; font-size: 1.3rem;">SwaziLegal</span>
        </a>
        <nav>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_id'        => 'nav-menu',
                'fallback_cb'    => 'swazilegal_fallback_menu',
            ) );
            
            function swazilegal_fallback_menu() {
                ?>
                <ul id="nav-menu">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/practices' ) ); ?>">Practice Areas</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/team' ) ); ?>">Our Team</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                </ul>
                <?php
            }
            ?>
        </nav>
    </div>
</header>
