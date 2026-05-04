# WordPress Integration Guide - SwaziLegal

This guide provides step-by-step instructions for migrating the SwaziLegal website to WordPress while maintaining all design and functionality.

## Phase 1: WordPress Setup

### 1.1 Install WordPress
1. Set up a WordPress installation on your hosting
2. Install WordPress theme base (Underscores or GeneratePress)
3. Activate and configure theme

### 1.2 Install Required Plugins
```
Essential Plugins:
- Advanced Custom Fields (ACF Pro recommended)
- Contact Form 7
- Yoast SEO
- WP Super Cache
- Elementor (Optional, but recommended)
- WooCommerce (Optional, if adding appointment payments)
```

Command line installation:
```bash
wp plugin install advanced-custom-fields-pro contact-form-7 wordpress-seo
wp plugin activate advanced-custom-fields-pro contact-form-7 wordpress-seo
```

## Phase 2: Custom Post Types & Taxonomies

### 2.1 Register Custom Post Types

Create `wp-content/themes/swazilegal/inc/cpt.php`:

```php
<?php
// Register Attorney Custom Post Type
function swazilegal_register_cpt() {
    register_post_type('attorney', array(
        'label'       => __('Attorneys', 'swazilegal'),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'   => 'dashicons-admin-users',
        'rewrite'     => array('slug' => 'team')
    ));

    register_post_type('practice', array(
        'label'       => __('Practice Areas', 'swazilegal'),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'   => 'dashicons-briefcase',
        'rewrite'     => array('slug' => 'practices')
    ));

    register_post_type('testimonial', array(
        'label'       => __('Testimonials', 'swazilegal'),
        'public'      => false,
        'show_in_rest' => true,
        'supports'    => array('title', 'custom-fields'),
        'menu_icon'   => 'dashicons-format-quote'
    ));
}
add_action('init', 'swazilegal_register_cpt');
```

### 2.2 Create Custom Fields (ACF)

Using ACF Pro programmatically or via admin:

**Attorney Fields:**
- Full Name (Text)
- Title/Position (Text)
- Specialty (Taxonomy - practice-area)
- Biography (Textarea)
- Email (Email)
- Phone (Phone)
- Profile Photo (Image)
- Credentials (Repeater)

**Practice Area Fields:**
- Title (Text)
- Description (WYSIWYG)
- Featured Icon (Text/Select)
- Services (Repeater - Text)

**Testimonial Fields:**
- Quote (Textarea)
- Client Name (Text)
- Company (Text)
- Rating (Number, 1-5)

### 2.3 Create Taxonomies

```php
<?php
// Register Practice Area Taxonomy
function swazilegal_register_taxonomies() {
    register_taxonomy('practice-area', 'attorney', array(
        'label'       => __('Practice Areas', 'swazilegal'),
        'hierarchical' => true,
        'rewrite'     => array('slug' => 'practice-area'),
        'show_in_rest' => true
    ));
}
add_action('init', 'swazilegal_register_taxonomies');
```

## Phase 3: Template & Design Implementation

### 3.1 Create Custom Templates

**Template: Team Page (archive-attorney.php)**
```php
<?php get_header(); ?>

<section class="hero">
    <h1><?php post_type_archive_title(); ?></h1>
</section>

<section class="team-section">
    <div class="section-container">
        <!-- Search & Filter -->
        <div class="team-filters">
            <input type="text" id="team-search" placeholder="Search attorneys...">
            <?php wp_dropdown_categories(array(
                'taxonomy'       => 'practice-area',
                'show_option_all' => 'All Specialties'
            )); ?>
        </div>

        <!-- Team Grid -->
        <div class="grid grid-2">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <div class="team-member">
                        <div class="team-avatar">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="team-info">
                            <h3><?php the_title(); ?></h3>
                            <p class="team-title">
                                <?php echo get_field('title'); ?>
                            </p>
                            <p class="team-specialty">
                                <?php echo get_field('specialty'); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
```

**Template: Single Attorney (single-attorney.php)**
```php
<?php get_header(); ?>

<section class="attorney-detail">
    <div class="section-container">
        <div class="grid grid-2">
            <div>
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div>
                <h1><?php the_title(); ?></h1>
                <p class="attorney-title">
                    <?php echo get_field('title'); ?>
                </p>
                <div class="attorney-bio">
                    <?php the_content(); ?>
                </div>
                <div class="attorney-contact">
                    <p><strong>Email:</strong> 
                        <a href="mailto:<?php echo get_field('email'); ?>">
                            <?php echo get_field('email'); ?>
                        </a>
                    </p>
                    <p><strong>Phone:</strong> 
                        <a href="tel:<?php echo get_field('phone'); ?>">
                            <?php echo get_field('phone'); ?>
                        </a>
                    </p>
                </div>
                <a href="<?php echo site_url('/contact'); ?>" class="btn btn-primary">
                    Schedule Consultation
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
```

### 3.2 Port CSS Styling

1. Copy entire `css/style.css` to `wp-content/themes/swazilegal/style.css`
2. Update theme header comment:
```css
/*
Theme Name: SwaziLegal
Theme URI: https://swazilegal.sz
Description: Professional law firm website
Author: Your Team
Version: 1.0.0
*/
```

3. Enqueue stylesheet in `functions.php`:
```php
<?php
function swazilegal_enqueue_styles() {
    wp_enqueue_style('swazilegal-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'swazilegal_enqueue_styles');
```

## Phase 4: Data Migration

### 4.1 Import Data from JSON

Create a script `wp-content/plugins/swazilegal-importer/importer.php`:

```php
<?php
function swazilegal_import_data() {
    $json_file = plugin_dir_path(__FILE__) . 'data.json';
    $data = json_decode(file_get_contents($json_file), true);

    // Import Team Members
    foreach ($data['team'] as $attorney) {
        $post_id = wp_insert_post(array(
            'post_title'   => $attorney['name'],
            'post_content' => $attorney['bio'],
            'post_type'    => 'attorney',
            'post_status'  => 'publish'
        ));

        update_field('title', $attorney['title'], $post_id);
        update_field('email', $attorney['email'], $post_id);
        update_field('specialty', $attorney['specialty'], $post_id);
        update_field('phone', $attorney['phone'] ?? '', $post_id);
    }

    // Import Practice Areas
    foreach ($data['practices'] as $practice) {
        $post_id = wp_insert_post(array(
            'post_title'   => $practice['name'],
            'post_content' => $practice['description'],
            'post_type'    => 'practice',
            'post_status'  => 'publish'
        ));

        update_field('services', $practice['services'], $post_id);
        update_field('icon', $practice['icon'], $post_id);
    }

    // Import Testimonials
    foreach ($data['testimonials'] as $testimonial) {
        wp_insert_post(array(
            'post_title'   => $testimonial['client'],
            'post_type'    => 'testimonial',
            'post_status'  => 'publish'
        ));

        update_field('quote', $testimonial['text'], $post_id);
        update_field('company', $testimonial['company'], $post_id);
        update_field('rating', $testimonial['rating'], $post_id);
    }

    echo 'Data imported successfully!';
}

// Run on plugin activation
register_activation_hook(__FILE__, 'swazilegal_import_data');
```

### 4.2 JSON Data Format

Save data as `data.json` in the importer plugin folder with same structure as original `data/content.json`.

## Phase 5: Features & Functionality

### 5.1 Contact Form

Use Contact Form 7 or WPForms with custom styling:

```php
<?php
do_shortcode('[contact-form-7 id="123" title="Contact Us"]');
```

### 5.2 Search & Filter

Use AJAX for team member filtering:

```php
<?php
// functions.php
function swazilegal_filter_team() {
    $args = array(
        'post_type' => 'attorney',
        'posts_per_page' => -1
    );

    if (!empty($_POST['specialty'])) {
        $args['tax_query'] = array(array(
            'taxonomy' => 'practice-area',
            'field'    => 'slug',
            'terms'    => $_POST['specialty']
        ));
    }

    if (!empty($_POST['search'])) {
        $args['s'] = $_POST['search'];
    }

    $query = new WP_Query($args);
    wp_send_json($query->posts);
}
add_action('wp_ajax_filter_team', 'swazilegal_filter_team');
add_action('wp_ajax_nopriv_filter_team', 'swazilegal_filter_team');
```

### 5.3 Appointment Scheduling

Option 1: Calendly Integration
```php
<iframe src="https://calendly.com/swazilegal/consultation" 
        width="100%" height="600"></iframe>
```

Option 2: WP Simple Booking Calendar Plugin
```bash
wp plugin install wp-simple-booking-calendar
```

## Phase 6: SEO & Performance

### 6.1 SEO Configuration

Using Yoast SEO:
```php
<?php
// Set focus keyword for practice areas
update_field('_yoast_wpseo_focuskw', 'Practice Area Name');
```

### 6.2 Performance Optimization

1. Enable caching: WP Super Cache
2. Optimize images: Imagify or ShortPixel
3. Minify CSS/JS: Autoptimize
4. CDN: Cloudflare (Free tier)

## Phase 7: Testing & Deployment

### Testing Checklist
- [ ] All pages render correctly
- [ ] Forms submit and work
- [ ] Search/filter functionality works
- [ ] Mobile responsive
- [ ] Navigation links work
- [ ] Contact emails send
- [ ] Lightho use score > 85
- [ ] All plugins activated
- [ ] Backup created

### Go-Live Checklist
- [ ] SSL certificate (HTTPS)
- [ ] Domain configured
- [ ] Backup automated
- [ ] Monitoring enabled
- [ ] Google Analytics set up
- [ ] Search Console verified
- [ ] Sitemap submitted
- [ ] Contact email configured

## WordPress File Structure

```
wp-content/
├── themes/
│   └── swazilegal/
│       ├── functions.php
│       ├── header.php
│       ├── footer.php
│       ├── style.css
│       ├── archive-attorney.php
│       ├── single-attorney.php
│       ├── archive-practice.php
│       ├── single-practice.php
│       └── inc/
│           ├── cpt.php
│           └── taxonomies.php
└── plugins/
    └── swazilegal-importer/
        ├── plugin.php
        ├── importer.php
        └── data.json
```

## Key Considerations

1. **Design Consistency**: Port CSS exactly as-is to maintain design
2. **Performance**: Use caching and CDN for production
3. **SEO**: Configure Yoast and XML sitemaps
4. **Security**: Use security plugins and keep WordPress updated
5. **Backups**: Automated daily backups
6. **Updates**: Keep plugins and WordPress updated

## Support Resources

- WordPress Codex: https://codex.wordpress.org
- ACF Documentation: https://www.advancedcustomfields.com/resources/
- Yoast SEO Guide: https://yoast.com/wordpress/plugins/seo/
- GeneratePress Theme: https://generatepress.com/

## Timeline Estimate

- Phase 1-2: 1-2 days (WordPress setup & custom posts)
- Phase 3: 2-3 days (Template porting)
- Phase 4: 1 day (Data migration)
- Phase 5: 1-2 days (Features & functionality)
- Phase 6-7: 1-2 days (Testing & deployment)

**Total: 7-12 days depending on customization needs**

---

**Last Updated**: April 19, 2024  
**Version**: 1.0.0
