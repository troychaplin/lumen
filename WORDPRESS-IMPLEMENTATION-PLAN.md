# WordPress Block Theme Implementation Plan

## TC Projects Theme

## Table of Contents
1. [Theme Overview](#theme-overview)
2. [Design System](#design-system)
3. [File Structure](#file-structure)
4. [Phase 1: Block Theme Foundation](#phase-1-block-theme-foundation)
5. [Phase 2: Custom Blocks](#phase-2-custom-blocks)
6. [Implementation Steps](#implementation-steps)
7. [Code Reference](#code-reference)

---

## Theme Overview

**Theme Name:** TC Projects
**Type:** Block Theme  
**WordPress Version:** 6.4+  
**PHP Version:** 7.4+

### Design Characteristics
- **Color Scheme:** Dark theme with emerald green (#10b981) primary, teal accents (#14b8a6), deep charcoal backgrounds
- **Typography:** 
  - Headers: Space Grotesk (Google Font)
  - Body: Roboto Flex weight 300 (Google Font)
- **Layout Style:** Asymmetric layouts, varied card sizes, CSS Grid and Flexbox
- **Effects:** Semi-transparent cards (70% opacity), gradient underlines, hover transitions

### Template Strategy
- **Homepage (Front Page):** Custom front-page.html template
- **About Page:** Default page.html template
- **Projects (Blog Posts):** Default single.html template
- **Projects Archive:** Default index.html template

---

## Design System

### Color Palette
```json
{
  "primary": "#10b981",      // Emerald green
  "accent": "#14b8a6",       // Teal
  "background": "#0a0a0a",   // Deep black
  "surface": "#141414",      // Dark charcoal
  "text": "#ffffff",         // White
  "textMuted": "#9ca3af"     // Gray-400
}
```

### Typography Scale
- **Hero Headings:** 48px - 96px (fluid)
- **Section Headings:** 36px - 48px (fluid)
- **Body:** 16px (base)
- **Font Weights:** 
  - Body: 300 (light)
  - Headings: 400-500 (medium)

### Spacing System
- Use WordPress fluid spacing scale
- Key values: 1rem, 1.5rem, 2rem, 3rem, 4rem, 6rem

---

## File Structure

```
tc-projects/
├── style.css
├── theme.json
├── functions.php
├── templates/
│   ├── index.html
│   ├── front-page.html
│   ├── page.html
│   ├── single.html
│   └── home.html
├── parts/
│   ├── header.html
│   ├── footer.html
│   └── background-pattern.html
├── patterns/
│   ├── hero-stats.php
│   ├── skills-section.php
│   └── featured-project-placeholder.php
├── assets/
│   ├── css/
│   │   └── custom-styles.css
│   └── js/
│       └── theme.js (if needed)
└── blocks/
    └── featured-project/
        ├── block.json
        ├── edit.js
        ├── save.js
        ├── style.css
        └── editor.css
```

---

## Phase 1: Block Theme Foundation

### Step 1: Create style.css

```css
/*
Theme Name: TC Projects
Theme URI: https://troychaplin.com
Author: Troy Chaplin
Author URI: https://troychaplin.com
Description: A modern dark portfolio theme with emerald green accents
Version: 1.0.0
Requires at least: 6.4
Tested up to: 6.5
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: tc-projects
*/
```

### Step 2: Create theme.json

**Key Sections to Include:**

#### Color Palette
```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "slug": "primary",
          "color": "#10b981",
          "name": "Primary (Emerald)"
        },
        {
          "slug": "accent",
          "color": "#14b8a6",
          "name": "Accent (Teal)"
        },
        {
          "slug": "background",
          "color": "#0a0a0a",
          "name": "Background"
        },
        {
          "slug": "surface",
          "color": "#141414",
          "name": "Surface"
        },
        {
          "slug": "white",
          "color": "#ffffff",
          "name": "White"
        },
        {
          "slug": "gray-400",
          "color": "#9ca3af",
          "name": "Gray 400"
        },
        {
          "slug": "white-10",
          "color": "rgba(255, 255, 255, 0.1)",
          "name": "White 10%"
        }
      ]
    }
  }
}
```

#### Typography
```json
{
  "settings": {
    "typography": {
      "fontFamilies": [
        {
          "fontFamily": "'Space Grotesk', sans-serif",
          "slug": "heading",
          "name": "Space Grotesk"
        },
        {
          "fontFamily": "'Roboto Flex', sans-serif",
          "slug": "body",
          "name": "Roboto Flex"
        }
      ],
      "fontSizes": [
        {
          "slug": "small",
          "size": "0.875rem",
          "name": "Small"
        },
        {
          "slug": "base",
          "size": "1rem",
          "name": "Base"
        },
        {
          "slug": "large",
          "size": "1.5rem",
          "name": "Large"
        },
        {
          "slug": "x-large",
          "size": "2.25rem",
          "name": "Extra Large"
        },
        {
          "slug": "xx-large",
          "size": "3rem",
          "fluid": {
            "min": "2.25rem",
            "max": "3rem"
          },
          "name": "2X Large"
        },
        {
          "slug": "huge",
          "size": "4rem",
          "fluid": {
            "min": "3rem",
            "max": "6rem"
          },
          "name": "Huge"
        }
      ]
    }
  }
}
```

#### Spacing
```json
{
  "settings": {
    "spacing": {
      "units": ["px", "rem", "vh", "vw", "%"],
      "spacingSizes": [
        {
          "slug": "small",
          "size": "1rem",
          "name": "Small"
        },
        {
          "slug": "medium",
          "size": "2rem",
          "name": "Medium"
        },
        {
          "slug": "large",
          "size": "3rem",
          "name": "Large"
        },
        {
          "slug": "x-large",
          "size": "4rem",
          "name": "Extra Large"
        },
        {
          "slug": "xx-large",
          "size": "6rem",
          "name": "2X Large"
        }
      ]
    }
  }
}
```

#### Global Styles
```json
{
  "styles": {
    "color": {
      "background": "var(--wp--preset--color--background)",
      "text": "var(--wp--preset--color--white)"
    },
    "typography": {
      "fontFamily": "var(--wp--preset--font-family--body)",
      "fontSize": "var(--wp--preset--font-size--base)",
      "fontWeight": "300",
      "lineHeight": "1.6"
    },
    "elements": {
      "h1": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      },
      "h2": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      },
      "h3": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      },
      "h4": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      },
      "h5": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      },
      "h6": {
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--heading)",
          "fontWeight": "500"
        }
      }
    }
  }
}
```

### Step 3: Create functions.php

```php
<?php
/**
 * Troy Chaplin Portfolio Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Google Fonts
 */
function tcp_enqueue_google_fonts() {
    wp_enqueue_style(
        'tcp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@300;400;500&family=Space+Grotesk:wght@400;500;600;700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'tcp_enqueue_google_fonts');

/**
 * Enqueue custom styles
 */
function tcp_enqueue_custom_styles() {
    wp_enqueue_style(
        'tcp-custom-styles',
        get_template_directory_uri() . '/assets/css/custom-styles.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'tcp_enqueue_custom_styles');

/**
 * Register block patterns category
 */
function tcp_register_block_patterns_category() {
    register_block_pattern_category(
        'tcp-portfolio',
        array('label' => __('Portfolio Sections', 'tc-projects'))
    );
}
add_action('init', 'tcp_register_block_patterns_category');

/**
 * Register custom block styles
 */
function tcp_register_block_styles() {
    // Stat item with gradient underline
    register_block_style(
        'core/group',
        array(
            'name'  => 'stat-item',
            'label' => __('Stat Item', 'tc-projects'),
        )
    );
    
    // Skill card style
    register_block_style(
        'core/group',
        array(
            'name'  => 'skill-card',
            'label' => __('Skill Card', 'tc-projects'),
        )
    );
    
    // Tool pill style
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'tool-pill',
            'label' => __('Tool Pill', 'tc-projects'),
        )
    );
}
add_action('init', 'tcp_register_block_styles');
```

### Step 4: Create assets/css/custom-styles.css

```css
/**
 * Custom Styles for Troy Chaplin Portfolio
 */

/* ===========================
   Background Pattern (Global)
   =========================== */
body::before {
    content: '';
    position: fixed;
    inset: 0;
    z-index: -1;
    pointer-events: none;
    background-image: 
        radial-gradient(circle at top right, rgba(16, 185, 129, 0.15) 0%, transparent 60%),
        radial-gradient(circle at bottom left, rgba(20, 184, 166, 0.1) 0%, transparent 60%);
}

/* SVG Grid Pattern */
body::after {
    content: '';
    position: fixed;
    inset: 0;
    z-index: -1;
    pointer-events: none;
    background-image: 
        repeating-linear-gradient(0deg, transparent, transparent 63px, rgba(255, 255, 255, 0.08) 63px, rgba(255, 255, 255, 0.08) 64px),
        repeating-linear-gradient(90deg, transparent, transparent 63px, rgba(255, 255, 255, 0.08) 63px, rgba(255, 255, 255, 0.08) 64px);
}

/* ===========================
   Stat Item with Gradient Underline
   =========================== */
.is-style-stat-item {
    position: relative;
    padding-bottom: 1rem;
}

.is-style-stat-item::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, #10b981 0%, #14b8a6 100%);
    opacity: 0.5;
}

.is-style-stat-item .wp-block-heading {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 500;
    color: #ffffff;
    margin-bottom: 0.5rem;
}

.is-style-stat-item p {
    font-size: 0.875rem;
    color: #9ca3af;
    font-weight: 300;
    margin: 0;
}

/* ===========================
   Skill Card
   =========================== */
.is-style-skill-card {
    background-color: rgba(20, 20, 20, 0.7) !important;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
    padding: 1.5rem !important;
    transition: all 0.3s ease;
}

.is-style-skill-card:hover {
    border-color: rgba(16, 185, 129, 0.5);
    box-shadow: 0 10px 40px rgba(16, 185, 129, 0.1);
    transform: translateY(-4px);
}

.is-style-skill-card .wp-block-heading {
    color: #ffffff;
    margin-bottom: 0.75rem;
}

.is-style-skill-card p {
    color: #9ca3af;
    font-size: 0.875rem;
    line-height: 1.6;
}

/* ===========================
   Tool Pill (Paragraph)
   =========================== */
.is-style-tool-pill {
    display: inline-block !important;
    padding: 0.5rem 1rem !important;
    background-color: rgba(16, 185, 129, 0.1) !important;
    border: 1px solid rgba(16, 185, 129, 0.3) !important;
    border-radius: 9999px !important;
    font-size: 0.875rem !important;
    color: #10b981 !important;
    font-weight: 300 !important;
    margin: 0.25rem !important;
}

/* ===========================
   Query Loop - Project Cards
   =========================== */
.wp-block-post-template {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
}

.wp-block-post {
    background-color: transparent;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

.wp-block-post:hover {
    border-color: rgba(16, 185, 129, 0.5);
    box-shadow: 0 10px 40px rgba(16, 185, 129, 0.1);
}

.wp-block-post .wp-block-post-featured-image {
    aspect-ratio: 4/3;
    overflow: hidden;
}

.wp-block-post .wp-block-post-featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.wp-block-post:hover .wp-block-post-featured-image img {
    transform: scale(1.05);
}

.wp-block-post .wp-block-group {
    padding: 1.5rem;
    background-color: rgba(20, 20, 20, 0.7);
}

.wp-block-post .wp-block-post-terms {
    font-size: 0.875rem;
    color: #10b981;
    margin-bottom: 0.5rem;
}

.wp-block-post .wp-block-post-terms a {
    color: #10b981;
    text-decoration: none;
}

.wp-block-post .wp-block-post-title {
    color: #ffffff;
    transition: color 0.3s ease;
    margin-bottom: 0.5rem;
}

.wp-block-post:hover .wp-block-post-title,
.wp-block-post:hover .wp-block-post-title a {
    color: #10b981;
}

.wp-block-post .wp-block-post-excerpt {
    color: #9ca3af;
}

.wp-block-post .wp-block-post-excerpt p {
    font-size: 0.875rem;
    line-height: 1.6;
}

/* ===========================
   Navigation Customization
   =========================== */
.wp-block-site-title,
.wp-block-site-tagline {
    margin: 0;
    line-height: 1;
}

.wp-block-site-tagline {
    color: #ffffff;
}

.wp-block-site-title a {
    color: #10b981;
    text-decoration: none;
}

/* Navigation links */
.wp-block-navigation-item a {
    color: #9ca3af;
    text-decoration: none;
    transition: color 0.3s ease;
}

.wp-block-navigation-item a:hover,
.wp-block-navigation-item.current-menu-item a {
    color: #10b981;
}

/* ===========================
   About Page - Decorative Background
   =========================== */
body.page-template-default .wp-site-blocks::before {
    content: '';
    position: fixed;
    top: -20%;
    right: -10%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle at center, #fbbf24 0%, #10b981 40%, #14b8a6 60%, transparent 100%);
    opacity: 0.2;
    filter: blur(60px);
    transform: rotate(-25deg);
    pointer-events: none;
    z-index: -1;
}

/* ===========================
   Single Post (Project) Gallery
   =========================== */
.single-post .wp-block-gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: 280px;
    gap: 1rem;
}

.single-post .wp-block-gallery .wp-block-image:first-child {
    grid-column: span 2;
    grid-row: span 2;
}

.single-post .wp-block-gallery .wp-block-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0.5rem;
}

/* ===========================
   Responsive Adjustments
   =========================== */
@media (max-width: 782px) {
    .wp-block-post-template {
        grid-template-columns: 1fr;
    }
    
    .single-post .wp-block-gallery {
        grid-template-columns: 1fr;
        grid-auto-rows: 240px;
    }
    
    .single-post .wp-block-gallery .wp-block-image:first-child {
        grid-column: span 1;
        grid-row: span 1;
    }
}

/* ===========================
   Utility Classes
   =========================== */
.text-primary {
    color: #10b981 !important;
}

.text-accent {
    color: #14b8a6 !important;
}

.bg-surface-70 {
    background-color: rgba(20, 20, 20, 0.7) !important;
}

.border-white-10 {
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}
```

### Step 5: Create Template Parts

#### parts/header.html
```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","orientation":"horizontal"}} -->
        <div class="wp-block-group">
            <!-- wp:site-tagline {"fontSize":"large"} /-->
            <!-- wp:site-title {"fontSize":"large"} /-->
        </div>
        <!-- /wp:group -->

        <!-- wp:navigation {"layout":{"type":"flex","justifyContent":"right"}} /-->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

#### parts/footer.html
```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"1.5rem","right":"1.5rem"}},"elements":{"link":{"color":{"text":"var:preset|color|gray-400"}}}},"backgroundColor":"surface","textColor":"gray-400","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-400-color has-surface-background-color has-text-color has-background has-link-color" style="padding-top:3rem;padding-right:1.5rem;padding-bottom:3rem;padding-left:1.5rem">
    <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:paragraph {"fontSize":"small"} -->
        <p class="has-small-font-size">© 2024 Troy Chaplin. All rights reserved.</p>
        <!-- /wp:paragraph -->

        <!-- wp:social-links {"iconColor":"gray-400","iconColorValue":"#9ca3af","size":"has-small-icon-size","className":"is-style-logos-only"} -->
        <ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only">
            <!-- Add your social links here -->
        </ul>
        <!-- /wp:social-links -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

#### parts/background-pattern.html
```html
<!-- wp:html -->
<div class="global-background-pattern" aria-hidden="true"></div>
<!-- /wp:html -->
```

### Step 6: Create Templates

#### templates/index.html (Fallback)
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:query-title {"type":"archive","align":"wide","style":{"spacing":{"margin":{"top":"6rem","bottom":"2rem"}}}} /-->
    
    <!-- wp:post-template {"align":"wide"} /-->
    
    <!-- wp:query-pagination {"align":"wide"} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-numbers /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

#### templates/front-page.html
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- Hero Section - Will use pattern -->
    
    <!-- Featured Project - Will use custom block -->
    
    <!-- Recent Projects - Will use Query Loop -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

#### templates/page.html
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10rem","bottom":"4rem"}}}} -->
    <div class="wp-block-group alignwide" style="padding-top:10rem;padding-bottom:4rem">
        <!-- wp:post-title {"level":1,"fontSize":"huge"} /-->
        <!-- wp:post-content {"align":"wide"} /-->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

#### templates/single.html
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10rem","bottom":"2rem"}}}} -->
    <div class="wp-block-group alignwide" style="padding-top:10rem;padding-bottom:2rem">
        <!-- wp:post-terms {"term":"category","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"small","textColor":"primary"} /-->
        
        <!-- wp:post-title {"level":1,"style":{"spacing":{"margin":{"bottom":"0.75rem"}}},"fontSize":"huge"} /-->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem"}}}} -->
    <div class="wp-block-group alignwide" style="padding-top:2.5rem;padding-bottom:2.5rem">
        <!-- wp:columns {"align":"wide"} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column {"width":"33.33%"} -->
            <div class="wp-block-column" style="flex-basis:33.33%">
                <!-- wp:group {"style":{"spacing":{"blockGap":"2rem"}}} -->
                <div class="wp-block-group">
                    <!-- wp:group -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"small","textColor":"gray-400"} -->
                        <p class="has-gray-400-color has-text-color has-small-font-size" style="letter-spacing:0.1em;text-transform:uppercase">Role</p>
                        <!-- /wp:paragraph -->
                        
                        <!-- wp:paragraph {"fontSize":"x-large","textColor":"white"} -->
                        <p class="has-white-color has-text-color has-x-large-font-size"><!-- Add role custom field --></p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"fontSize":"small","textColor":"gray-400"} -->
                        <p class="has-gray-400-color has-text-color has-small-font-size" style="letter-spacing:0.1em;text-transform:uppercase">Tools</p>
                        <!-- /wp:paragraph -->
                        
                        <!-- wp:post-terms {"term":"post_tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"className":"project-tags"} /-->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"66.66%"} -->
            <div class="wp-block-column" style="flex-basis:66.66%">
                <!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"fontSize":"x-large","textColor":"gray-400"} /-->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"6rem"}}}} -->
    <div class="wp-block-group alignwide" style="padding-bottom:6rem">
        <!-- wp:heading {"fontSize":"xx-large"} -->
        <h2 class="wp-block-heading has-xx-large-font-size">Project Gallery</h2>
        <!-- /wp:heading -->

        <!-- wp:post-content {"align":"wide"} /-->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

#### templates/home.html (Blog/Projects Archive)
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"10rem","bottom":"4rem"}}}} -->
    <div class="wp-block-group alignwide" style="padding-top:10rem;padding-bottom:4rem">
        <!-- wp:heading {"level":1,"fontSize":"huge"} -->
        <h1 class="wp-block-heading has-huge-font-size">Projects</h1>
        <!-- /wp:heading -->
    </div>
    <!-- /wp:group -->

    <!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
    <div class="wp-block-query alignwide">
        <!-- wp:post-template {"align":"wide"} -->
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3"} /-->

            <!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}}},"className":"bg-surface-70"} -->
            <div class="wp-block-group bg-surface-70" style="padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem">
                <!-- wp:post-terms {"term":"category","fontSize":"small","textColor":"primary"} /-->
                <!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
                <!-- wp:post-excerpt {"excerptLength":20} /-->
            </div>
            <!-- /wp:group -->
        <!-- /wp:post-template -->

        <!-- wp:query-pagination {"align":"wide"} -->
            <!-- wp:query-pagination-previous /-->
            <!-- wp:query-pagination-numbers /-->
            <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:query -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

### Step 7: Create Block Patterns

#### patterns/hero-stats.php
```php
<?php
/**
 * Title: Hero Stats Section
 * Slug: tcp/hero-stats
 * Categories: tcp-portfolio
 * Description: Three-column stats section with gradient underlines
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:6rem;padding-right:1.5rem;padding-bottom:6rem;padding-left:1.5rem">
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"3rem","left":"3rem"}}}} -->
    <div class="wp-block-columns alignwide">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-stat-item"} -->
            <div class="wp-block-group is-style-stat-item">
                <!-- wp:heading {"level":2} -->
                <h2 class="wp-block-heading">50+</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Projects Completed</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-stat-item"} -->
            <div class="wp-block-group is-style-stat-item">
                <!-- wp:heading {"level":2} -->
                <h2 class="wp-block-heading">10+</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Years Experience</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-stat-item"} -->
            <div class="wp-block-group is-style-stat-item">
                <!-- wp:heading {"level":2} -->
                <h2 class="wp-block-heading">30+</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Happy Clients</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
```

#### patterns/skills-section.php
```php
<?php
/**
 * Title: Skills Section
 * Slug: tcp/skills-section
 * Categories: tcp-portfolio
 * Description: Grid of skill cards with hover effects
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:4rem;padding-right:1.5rem;padding-bottom:4rem;padding-left:1.5rem">
    <!-- wp:heading {"align":"wide","fontSize":"xx-large"} -->
    <h2 class="wp-block-heading alignwide has-xx-large-font-size">Design</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"},"margin":{"top":"2rem"}}}} -->
    <div class="wp-block-columns alignwide" style="margin-top:2rem">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-skill-card"} -->
            <div class="wp-block-group is-style-skill-card">
                <!-- wp:heading {"level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-large-font-size">User Research</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Understanding user needs through interviews, surveys, and usability testing.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-skill-card"} -->
            <div class="wp-block-group is-style-skill-card">
                <!-- wp:heading {"level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-large-font-size">UI/UX Design</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Creating intuitive and beautiful interfaces that users love.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"is-style-skill-card"} -->
            <div class="wp-block-group is-style-skill-card">
                <!-- wp:heading {"level":3,"fontSize":"large"} -->
                <h3 class="wp-block-heading has-large-font-size">Prototyping</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>Building interactive prototypes to test and validate design decisions.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->
```

---

## Phase 2: Custom Blocks

### Custom Block: Featured Project

**Purpose:** Display a large asymmetric featured project on the homepage with full editorial control.

**Location:** `blocks/featured-project/`

#### block.json
```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "tcp/featured-project",
  "version": "1.0.0",
  "title": "Featured Project",
  "category": "tcp-portfolio",
  "icon": "star-filled",
  "description": "Display a featured project with asymmetric layout",
  "supports": {
    "html": false,
    "align": ["wide", "full"]
  },
  "attributes": {
    "category": {
      "type": "string",
      "default": "Featured Project"
    },
    "title": {
      "type": "string",
      "default": "Project Title"
    },
    "description": {
      "type": "string",
      "default": "Project description goes here..."
    },
    "buttonText": {
      "type": "string",
      "default": "View Project"
    },
    "buttonLink": {
      "type": "string",
      "default": ""
    },
    "imageMain": {
      "type": "object",
      "default": {
        "url": "",
        "alt": "",
        "id": null
      }
    },
    "imageSecondary": {
      "type": "object",
      "default": {
        "url": "",
        "alt": "",
        "id": null
      }
    }
  },
  "textdomain": "tc-projects",
  "editorScript": "file:./index.js",
  "editorStyle": "file:./editor.css",
  "style": "file:./style.css"
}
```

#### edit.js
```javascript
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls, URLInput } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';
import './editor.css';

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps({
        className: 'featured-project-block'
    });

    const {
        category,
        title,
        description,
        buttonText,
        buttonLink,
        imageMain,
        imageSecondary
    } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Button Settings', 'tc-projects')}>
                    <TextControl
                        label={__('Button Text', 'tc-projects')}
                        value={buttonText}
                        onChange={(value) => setAttributes({ buttonText: value })}
                    />
                    <URLInput
                        label={__('Button Link', 'tc-projects')}
                        value={buttonLink}
                        onChange={(value) => setAttributes({ buttonLink: value })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <div className="featured-project-grid">
                    {/* Content Column */}
                    <div className="featured-project-content">
                        <RichText
                            tagName="div"
                            className="featured-project-category"
                            value={category}
                            onChange={(value) => setAttributes({ category: value })}
                            placeholder={__('Category', 'tc-projects')}
                        />
                        
                        <RichText
                            tagName="h2"
                            className="featured-project-title"
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                            placeholder={__('Project Title', 'tc-projects')}
                        />
                        
                        <RichText
                            tagName="p"
                            className="featured-project-description"
                            value={description}
                            onChange={(value) => setAttributes({ description: value })}
                            placeholder={__('Project description...', 'tc-projects')}
                        />
                        
                        <div className="featured-project-button">
                            {buttonText}
                        </div>
                    </div>

                    {/* Main Image */}
                    <div className="featured-project-image-main">
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) =>
                                    setAttributes({
                                        imageMain: {
                                            url: media.url,
                                            alt: media.alt,
                                            id: media.id
                                        }
                                    })
                                }
                                allowedTypes={['image']}
                                value={imageMain.id}
                                render={({ open }) => (
                                    <Button
                                        onClick={open}
                                        className={imageMain.url ? 'image-button' : 'button button-large'}
                                    >
                                        {imageMain.url ? (
                                            <img src={imageMain.url} alt={imageMain.alt} />
                                        ) : (
                                            __('Upload Main Image', 'tc-projects')
                                        )}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>
                    </div>

                    {/* Secondary Image */}
                    <div className="featured-project-image-secondary">
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) =>
                                    setAttributes({
                                        imageSecondary: {
                                            url: media.url,
                                            alt: media.alt,
                                            id: media.id
                                        }
                                    })
                                }
                                allowedTypes={['image']}
                                value={imageSecondary.id}
                                render={({ open }) => (
                                    <Button
                                        onClick={open}
                                        className={imageSecondary.url ? 'image-button' : 'button button-large'}
                                    >
                                        {imageSecondary.url ? (
                                            <img src={imageSecondary.url} alt={imageSecondary.alt} />
                                        ) : (
                                            __('Upload Secondary Image', 'tc-projects')
                                        )}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>
                    </div>
                </div>
            </div>
        </>
    );
}
```

#### save.js
```javascript
import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const blockProps = useBlockProps.save({
        className: 'featured-project-block'
    });

    const {
        category,
        title,
        description,
        buttonText,
        buttonLink,
        imageMain,
        imageSecondary
    } = attributes;

    return (
        <div {...blockProps}>
            <div className="featured-project-grid">
                <div className="featured-project-content">
                    <div className="featured-project-category">
                        {category}
                    </div>
                    
                    <RichText.Content
                        tagName="h2"
                        className="featured-project-title"
                        value={title}
                    />
                    
                    <RichText.Content
                        tagName="p"
                        className="featured-project-description"
                        value={description}
                    />
                    
                    {buttonLink && (
                        <a href={buttonLink} className="featured-project-button">
                            {buttonText}
                        </a>
                    )}
                </div>

                {imageMain.url && (
                    <div className="featured-project-image-main">
                        <img src={imageMain.url} alt={imageMain.alt} />
                    </div>
                )}

                {imageSecondary.url && (
                    <div className="featured-project-image-secondary">
                        <img src={imageSecondary.url} alt={imageSecondary.alt} />
                    </div>
                )}
            </div>
        </div>
    );
}
```

#### style.css
```css
.featured-project-block {
    margin: 4rem 0;
}

.featured-project-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-template-rows: repeat(6, 120px);
    gap: 1.5rem;
}

.featured-project-content {
    grid-column: 1 / 6;
    grid-row: 2 / 5;
    z-index: 2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 2rem;
    background-color: rgba(20, 20, 20, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
}

.featured-project-category {
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #10b981;
    margin-bottom: 1rem;
}

.featured-project-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(2rem, 4vw, 3rem);
    color: #ffffff;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.featured-project-description {
    font-size: 1.125rem;
    color: #9ca3af;
    line-height: 1.6;
    margin-bottom: 2rem;
}

.featured-project-button {
    display: inline-block;
    padding: 0.75rem 2rem;
    background-color: #10b981;
    color: #ffffff;
    text-decoration: none;
    border-radius: 0.375rem;
    font-weight: 500;
    transition: all 0.3s ease;
    align-self: flex-start;
}

.featured-project-button:hover {
    background-color: #14b8a6;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
}

.featured-project-image-main {
    grid-column: 6 / 13;
    grid-row: 1 / 5;
    overflow: hidden;
    border-radius: 0.5rem;
}

.featured-project-image-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.featured-project-image-secondary {
    grid-column: 8 / 13;
    grid-row: 4 / 7;
    overflow: hidden;
    border-radius: 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.featured-project-image-secondary img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media (max-width: 782px) {
    .featured-project-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 1rem;
    }

    .featured-project-content,
    .featured-project-image-main,
    .featured-project-image-secondary {
        grid-column: 1 / -1;
        grid-row: auto;
    }

    .featured-project-image-main,
    .featured-project-image-secondary {
        min-height: 300px;
    }
}
```

#### editor.css
```css
.featured-project-block .image-button {
    width: 100%;
    height: 100%;
    padding: 0;
    border: none;
    background: none;
}

.featured-project-block .image-button img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0.5rem;
}

.featured-project-block .button-large {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px dashed rgba(255, 255, 255, 0.3);
    border-radius: 0.5rem;
    background-color: rgba(20, 20, 20, 0.5);
    color: #9ca3af;
}
```

#### index.js
```javascript
import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';
import metadata from './block.json';

registerBlockType(metadata.name, {
    edit: Edit,
    save,
});
```

---

## Implementation Steps

### Phase 1: Core Theme Setup

1. **Create Theme Structure**
   - Create all folders: templates, parts, patterns, assets, blocks
   - Add style.css with theme headers
   - Create functions.php

2. **Configure theme.json**
   - Add color palette (emerald, teal, charcoal)
   - Configure typography (Space Grotesk, Roboto Flex)
   - Set spacing scale
   - Configure global styles

3. **Create Template Parts**
   - Header with Site Tagline + Site Title navigation
   - Footer with copyright and social links
   - Background pattern (if using template part approach)

4. **Create Templates**
   - index.html (fallback)
   - front-page.html (homepage)
   - page.html (About page)
   - single.html (project detail)
   - home.html (projects archive)

5. **Create Custom CSS**
   - Background patterns (gradients + SVG grid)
   - Block styles (stat-item, skill-card, tool-pill)
   - Query loop project card styling
   - Navigation customization
   - Gallery grid for single posts
   - Responsive adjustments

6. **Create Block Patterns**
   - Hero stats section (3-column with gradient underlines)
   - Skills section (grid of cards)
   - Additional patterns as needed

7. **Test Core Functionality**
   - Verify all templates render correctly
   - Test patterns insertion
   - Check responsive behavior
   - Validate block styles are applied

### Phase 2: Custom Block Development

1. **Setup Block Development Environment**
   - Install @wordpress/scripts: `npm install @wordpress/scripts --save-dev`
   - Create package.json with build scripts
   - Setup blocks directory structure

2. **Build Featured Project Block**
   - Create block.json
   - Build edit.js (editor interface)
   - Build save.js (frontend output)
   - Style with style.css and editor.css
   - Register in functions.php

3. **Compile and Test**
   - Run `npm run build`
   - Test in block editor
   - Verify frontend output
   - Check responsive behavior

4. **Enqueue Block Assets**
   - Update functions.php to register and enqueue block

### Phase 3: Content Setup

1. **Create Navigation Menu**
   - Add menu items: Home, About, Projects
   - Assign to Navigation block in header

2. **Create Sample Content**
   - Homepage: Add hero pattern + featured project block + query loop
   - About Page: Add bio, stats pattern, skills patterns, tools
   - Projects: Create 6-9 sample posts with categories and tags

3. **Configure Settings**
   - Set static front page to homepage
   - Configure permalink structure
   - Set default post category

4. **Final Testing**
   - Test all page templates
   - Verify navigation works
   - Check all hover states and transitions
   - Test responsive design on mobile/tablet
   - Validate accessibility

---

## Code Reference

### From React Implementation

Reference the following components from your React implementation for visual accuracy:

#### Background Patterns
- **File:** `components/BackgroundPattern.tsx`
- **Purpose:** SVG grid pattern with gradient blobs
- **WordPress Implementation:** CSS in custom-styles.css using ::before and ::after pseudo-elements

#### Decorative Background (About Page)
- **File:** `components/DecorativeBackground.tsx`
- **Purpose:** Halftone gradient pattern
- **WordPress Implementation:** CSS with page-specific class targeting

#### Project Cards
- **File:** `components/ProjectCard.tsx`
- **Purpose:** Card with image, category, title, description, hover effects
- **WordPress Implementation:** Query Loop styling in custom-styles.css

#### Featured Project
- **File:** `components/FeaturedProject.tsx` and `components/FeaturedProjectCard.tsx`
- **Purpose:** Large asymmetric project display
- **WordPress Implementation:** Custom block (blocks/featured-project/)

#### Navigation
- **File:** `components/Navigation.tsx`
- **Purpose:** Header with logo and navigation links
- **WordPress Implementation:** Template part (parts/header.html) with core blocks

#### Stats Component (HomePage & AboutPage)
- **Reference:** Stats section from `pages/HomePage.tsx` and `pages/AboutPage.tsx`
- **Key Features:** Numbers with gradient underlines, Space Grotesk font
- **WordPress Implementation:** Pattern (patterns/hero-stats.php) with custom block style

#### Skills Cards (AboutPage)
- **Reference:** Skills section from `pages/AboutPage.tsx`
- **Key Features:** Grid of cards with hover effects, 70% opacity backgrounds
- **WordPress Implementation:** Pattern (patterns/skills-section.php) with skill-card block style

#### Tools Pills (AboutPage)
- **Reference:** Tools section from `pages/AboutPage.tsx`
- **Key Features:** Pill-style layout with green borders
- **WordPress Implementation:** Group of paragraphs with tool-pill block style

#### Project Page Layout
- **Reference:** `pages/ProjectPage.tsx`
- **Key Features:** Header, sidebar with role/tools, description, asymmetric gallery
- **WordPress Implementation:** Template (templates/single.html) with custom CSS for gallery

---

## Additional Notes

### Google Fonts Loading
The theme loads Google Fonts via functions.php to ensure fonts are available before page render, preventing flash of unstyled text (FOUT).

### Custom Block Styles vs CSS Classes
- **Block Styles:** Registered in functions.php, appear in block toolbar, semantic
- **CSS Classes:** Added manually via Advanced > Additional CSS class(es), more flexible
- **Recommendation:** Use block styles for repeatable components (stat-item, skill-card), CSS classes for one-off customizations

### Background Pattern Implementation
The global background pattern is applied via CSS pseudo-elements on the body tag. This ensures it appears on all pages without needing to add template parts to every template.

### Query Loop Customization
The project card styling in Query Loop is handled entirely via CSS targeting `.wp-block-post-template` and `.wp-block-post`. No custom PHP required.

### Responsive Strategy
- Mobile-first approach
- Use CSS Grid with auto-fit/auto-fill for responsive grids
- Breakpoint at 782px (WordPress standard)
- Test on common devices: iPhone, iPad, desktop

### Performance Considerations
- Use WebP images when possible
- Lazy load images (WordPress default)
- Minify CSS in production
- Consider caching plugin for production sites

### Accessibility
- Ensure proper heading hierarchy
- Add ARIA labels where needed
- Test keyboard navigation
- Verify color contrast ratios (WCAG AA minimum)

---

## Troubleshooting

### Fonts Not Loading
- Verify Google Fonts URL in functions.php
- Check browser console for blocked requests
- Clear WordPress cache

### Block Styles Not Appearing
- Ensure register_block_style() is hooked to 'init'
- Clear browser cache
- Check CSS file is enqueued

### Custom Block Not Showing
- Run `npm run build` to compile
- Verify block is registered in functions.php
- Check browser console for JavaScript errors

### Gallery Grid Not Working
- Ensure CSS is targeting `.single-post .wp-block-gallery`
- Check that gallery is added to post content, not custom field
- Verify grid CSS properties are not being overridden

---

## Future Enhancements

### Potential Additions
1. **Custom Post Type for Projects** - More control than regular posts
2. **ACF Integration** - For Role field and additional custom fields
3. **Animation Library** - Scroll-triggered animations for stats/cards
4. **Dark Mode Toggle** - Optional light mode
5. **Advanced Gallery Block** - Custom block for more control over layout
6. **Contact Form Block** - Custom block with modern styling
7. **Testimonials Pattern** - Repeatable testimonial cards
8. **Filter Controls** - Category/tag filters for projects archive

### Recommended Plugins
- **Advanced Custom Fields (ACF)** - For custom fields like "Role"
- **WP Migrate** - For moving site between environments
- **Query Monitor** - For debugging during development
- **Yoast SEO** - For SEO optimization

---

## Conclusion

This implementation plan provides a complete roadmap for converting the React portfolio into a WordPress block theme. The design maintains all visual characteristics while leveraging WordPress's native block system for maximum flexibility and ease of content management.

The two-phase approach allows you to:
1. Build the core theme foundation with patterns and custom CSS
2. Add custom blocks only where necessary for complex layouts

This strategy minimizes custom code while maximizing the use of WordPress core functionality, resulting in a maintainable, performant, and user-friendly theme.
