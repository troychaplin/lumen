# WordPress Theme Step 6: Optional Enhancements

## Goal
Add advanced features, optimizations, and polish to your theme. These are optional but recommended for a production-ready portfolio site.

---

## Enhancement 1: Dynamic Copyright Year

### Problem
The footer copyright year is hardcoded and needs manual updating.

### Solution: PHP Block Pattern for Footer

**Update `/parts/footer.html`:**

Replace the static copyright paragraph with a PHP-generated one:

```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"top":{"color":"var:preset|color|gray-600","width":"1px"}}},"backgroundColor":"charcoal","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-charcoal-background-color has-background" style="border-top-color:var(--wp--preset--color--gray-600);border-top-width:1px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group">
        
        <!-- wp:paragraph {"textColor":"gray-400","fontSize":"sm"} -->
        <p class="has-gray-400-color has-text-color has-sm-font-size">© <?php echo date('Y'); ?> Troy Chaplin. All rights reserved.</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Note:** Block theme templates support PHP when you need dynamic content!

---

## Enhancement 2: Custom Post Type for Projects

### Why?
Separating projects from regular pages gives you better organization and allows for project archives.

### Implementation

**Add to `/functions.php`:**

```php
/**
 * Register Projects Custom Post Type
 */
function tc_projects_register_cpt() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'tc-projects' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'tc-projects' ),
        'menu_name'             => __( 'Projects', 'tc-projects' ),
        'all_items'             => __( 'All Projects', 'tc-projects' ),
        'add_new_item'          => __( 'Add New Project', 'tc-projects' ),
        'add_new'               => __( 'Add New', 'tc-projects' ),
        'edit_item'             => __( 'Edit Project', 'tc-projects' ),
        'update_item'           => __( 'Update Project', 'tc-projects' ),
        'view_item'             => __( 'View Project', 'tc-projects' ),
        'search_items'          => __( 'Search Projects', 'tc-projects' ),
    );

    $args = array(
        'label'                 => __( 'Project', 'tc-projects' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'public'                => true,
        'show_in_rest'          => true, // Required for block editor
        'menu_icon'             => 'dashicons-portfolio',
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'projects' ),
        'menu_position'         => 5,
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'tc_projects_register_cpt', 0 );

/**
 * Register Project Categories Taxonomy
 */
function tc_projects_register_taxonomy() {
    $labels = array(
        'name'              => _x( 'Project Categories', 'taxonomy general name', 'tc-projects' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'tc-projects' ),
        'search_items'      => __( 'Search Categories', 'tc-projects' ),
        'all_items'         => __( 'All Categories', 'tc-projects' ),
        'edit_item'         => __( 'Edit Category', 'tc-projects' ),
        'update_item'       => __( 'Update Category', 'tc-projects' ),
        'add_new_item'      => __( 'Add New Category', 'tc-projects' ),
        'menu_name'         => __( 'Categories', 'tc-projects' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'rewrite'           => array( 'slug' => 'project-category' ),
    );

    register_taxonomy( 'project_category', array( 'project' ), $args );
}
add_action( 'init', 'tc_projects_register_taxonomy', 0 );
```

### Create Templates for Projects

**`/templates/single-project.html`:**

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">

        <!-- wp:post-title {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"textColor":"white","fontSize":"6xl","fontFamily":"heading"} /-->

        <!-- wp:post-terms {"term":"project_category","textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"emerald"} /-->

        <!-- wp:post-featured-image {"aspectRatio":"16/9","align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} /-->

        <!-- wp:post-content {"align":"wide","layout":{"type":"constrained"}} /-->

    </div>
    <!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**`/templates/archive-project.html`:**

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">

        <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"textColor":"white","fontSize":"6xl","fontFamily":"heading"} -->
        <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-heading-font-family has-6xl-font-size" style="margin-bottom:var(--wp--preset--spacing--2xl)">All Projects</h1>
        <!-- /wp:heading -->

        <!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"project","order":"desc","orderBy":"date"},"align":"wide"} -->
        <div class="wp-block-query alignwide">

            <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->

                <!-- wp:group {"className":"card-bg-charcoal hover-lift","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|lg"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group card-bg-charcoal hover-lift" style="border-radius:0.5rem;padding-bottom:var(--wp--preset--spacing--lg)">

                    <!-- wp:post-featured-image {"aspectRatio":"4/3","isLink":true,"className":"project-image"} /-->

                    <!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">

                        <!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"white","fontSize":"2xl","fontFamily":"heading"} /-->

                        <!-- wp:post-excerpt {"moreText":"","excerptLength":20,"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"gray-400","fontSize":"sm"} /-->

                    </div>
                    <!-- /wp:group -->

                </div>
                <!-- /wp:group -->

            <!-- /wp:post-template -->

            <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|2xl"}}}} -->
                <!-- wp:query-pagination-previous /-->
                <!-- wp:query-pagination-numbers /-->
                <!-- wp:query-pagination-next /-->
            <!-- /wp:query-pagination -->

        </div>
        <!-- /wp:query -->

    </div>
    <!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

### After Activation

1. Go to Settings → Permalinks → Click "Save Changes" (flushes rewrite rules)
2. You'll now see "Projects" in admin menu
3. Create projects like you would posts
4. View at `/projects/` URL

---

## Enhancement 3: Custom Block Styles

Add variant styles for existing blocks without creating new blocks.

**Add to `/functions.php`:**

```php
/**
 * Register custom block styles
 */
function tc_projects_register_block_styles() {
    // Emerald button variant
    register_block_style(
        'core/button',
        array(
            'name'  => 'emerald-outline',
            'label' => __( 'Emerald Outline', 'tc-projects' ),
        )
    );

    // Teal button variant
    register_block_style(
        'core/button',
        array(
            'name'  => 'teal-solid',
            'label' => __( 'Teal Solid', 'tc-projects' ),
        )
    );

    // Card paragraph style
    register_block_style(
        'core/group',
        array(
            'name'  => 'emerald-card',
            'label' => __( 'Emerald Card', 'tc-projects' ),
        )
    );
}
add_action( 'init', 'tc_projects_register_block_styles' );
```

**Add CSS to `/assets/css/custom-styles.css`:**

```css
/* Button: Emerald Outline */
.wp-block-button.is-style-emerald-outline .wp-block-button__link {
    background-color: transparent;
    border: 2px solid #10b981;
    color: #10b981;
}

.wp-block-button.is-style-emerald-outline .wp-block-button__link:hover {
    background-color: #10b981;
    color: #1a1a1a;
}

/* Button: Teal Solid */
.wp-block-button.is-style-teal-solid .wp-block-button__link {
    background-color: #14b8a6;
    color: #1a1a1a;
}

.wp-block-button.is-style-teal-solid .wp-block-button__link:hover {
    background-color: #0d9488;
}

/* Group: Emerald Card */
.wp-block-group.is-style-emerald-card {
    background-color: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.3);
    border-radius: 0.5rem;
    padding: var(--wp--preset--spacing--xl);
}
```

**Usage:** When adding a button or group, select the style from the block sidebar.

---

## Enhancement 4: Page Transitions

Add smooth transitions between pages.

**Add to `/assets/css/custom-styles.css`:**

```css
/* Fade-in animation for content */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

main {
    animation: fadeIn 0.6s ease-out;
}

/* Smooth hover transitions on all interactive elements */
a, button, .wp-block-button__link {
    transition: all 0.3s ease;
}

/* Project card animations */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.3);
}
```

---

## Enhancement 5: Performance Optimizations

### Lazy Loading Images

Already built into WordPress 5.5+, but you can enhance it.

**Add to `/functions.php`:**

```php
/**
 * Add loading="eager" to hero images
 */
function tc_projects_hero_image_loading( $attr ) {
    if ( is_front_page() && in_the_loop() && get_post_thumbnail_id() ) {
        $attr['loading'] = 'eager';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'tc_projects_hero_image_loading' );
```

### Preload Fonts

**Add to `/functions.php`:**

```php
/**
 * Preload critical fonts
 */
function tc_projects_preload_fonts() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action( 'wp_head', 'tc_projects_preload_fonts', 1 );
```

---

## Enhancement 6: SEO Improvements

### Add Schema Markup for Portfolio

**Add to `/functions.php`:**

```php
/**
 * Add portfolio schema markup
 */
function tc_projects_add_schema() {
    if ( is_front_page() ) {
        $schema = array(
            '@context'  => 'https://schema.org',
            '@type'     => 'Person',
            'name'      => 'Troy Chaplin',
            'jobTitle'  => 'Creative Developer & Digital Designer',
            'url'       => home_url(),
            'sameAs'    => array(
                // Add your social profiles
                'https://github.com/yourusername',
                'https://linkedin.com/in/yourusername',
            ),
        );
        ?>
        <script type="application/ld+json">
            <?php echo wp_json_encode( $schema ); ?>
        </script>
        <?php
    }
}
add_action( 'wp_head', 'tc_projects_add_schema' );
```

---

## Enhancement 7: Contact Form Pattern

Create a contact form pattern using default WordPress blocks.

**Create `/patterns/contact-form.php`:**

```php
<?php
/**
 * Title: Contact Form
 * Slug: tc-projects/contact-form
 * Categories: tc-projects
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"white","fontSize":"5xl","fontFamily":"heading"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-heading-font-family has-5xl-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">Get In Touch</h2>
    <!-- /wp:heading -->

    <!-- wp:shortcode -->
    [contact-form-7 id="1" title="Contact Form"]
    <!-- /wp:shortcode -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"textColor":"gray-400","fontSize":"sm"} -->
    <p class="has-text-align-center has-gray-400-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--lg)">Or email directly: <a href="mailto:hello@troychaplin.com">hello@troychaplin.com</a></p>
    <!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
```

**Note:** Requires Contact Form 7 plugin. Replace with your preferred form plugin.

---

## Enhancement 8: Mobile Navigation Improvements

**Add to `/assets/css/custom-styles.css`:**

```css
/* Better mobile navigation */
@media (max-width: 768px) {
    .wp-block-navigation__responsive-container {
        background-color: rgba(26, 26, 26, 0.98);
        backdrop-filter: blur(10px);
    }

    .wp-block-navigation__responsive-container-open {
        padding: var(--wp--preset--spacing--lg);
    }

    /* Larger tap targets on mobile */
    .wp-block-navigation-item__content {
        padding: 0.75rem 1rem;
    }
}
```

---

## Enhancement 9: Print Styles

**Add to `/assets/css/custom-styles.css`:**

```css
/* Print styles */
@media print {
    header, footer, .wp-block-navigation {
        display: none;
    }

    body {
        background: white;
        color: black;
    }

    a {
        color: black;
        text-decoration: underline;
    }

    .has-grid-background::before {
        display: none;
    }
}
```

---

## Enhancement 10: Analytics & Tracking

**Add to `/functions.php`:**

```php
/**
 * Add Google Analytics
 */
function tc_projects_analytics() {
    if ( ! is_user_logged_in() ) {
        ?>
        <!-- Google Analytics or your tracking code -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID');
        </script>
        <?php
    }
}
add_action( 'wp_head', 'tc_projects_analytics', 100 );
```

---

## Testing Enhancements

1. **Clear all caches** (WordPress, browser, CDN)
2. **Test on multiple devices** (desktop, tablet, mobile)
3. **Run Lighthouse audit** in Chrome DevTools
4. **Check accessibility** with WAVE or axe DevTools
5. **Validate HTML** at validator.w3.org
6. **Test forms** thoroughly

---

## Deployment Checklist

- [ ] Update all placeholder content
- [ ] Add real images and optimize (compress, proper sizes)
- [ ] Set up SSL certificate
- [ ] Configure caching plugin (WP Rocket, W3 Total Cache)
- [ ] Install security plugin (Wordfence, Sucuri)
- [ ] Set up backups (UpdraftPlus, BackWPup)
- [ ] Submit sitemap to Google Search Console
- [ ] Test contact forms
- [ ] Check all links (broken link checker)
- [ ] Set up analytics
- [ ] Configure CDN if needed
- [ ] Test in multiple browsers
- [ ] Mobile responsiveness check

---

Your theme is now production-ready! 🎉
