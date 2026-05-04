<?php
/**
 * Template Name: SwaziLegal Canvas (Elementor Friendly)
 * Description: A full-width canvas template that removes default headers/footers for total design control.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="elementor-canvas-content">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
