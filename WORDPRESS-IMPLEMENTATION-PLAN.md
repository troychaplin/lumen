# TC Projects

WordPress Block Theme Implementation Plan

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
- **Projects Archive:** Default home.html template

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
 * TC Projects Theme Functions
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
        'tc-projects',
        array('label' => __('TC Projects', 'tc-projects'))
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
 * Custom Styles for TC Projects
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
 * Categories: tc-projects
 * Description: Hero intro with stats featuring gradient underlines
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"10rem","bottom":"5rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:10rem;padding-right:1.5rem;padding-bottom:5rem;padding-left:1.5rem">
    <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"4rem"}}} -->
    <div class="wp-block-group alignwide" style="display:flex;flex-direction:column;gap:4rem">
        
        <!-- Hero Text -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"1.5rem"}}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"level":1,"fontSize":"huge"} -->
            <h1 class="wp-block-heading has-huge-font-size">Creative<br><span style="color:#10b981">Developer &</span><br>Designer</h1>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"typography":{"fontSize":"1.5rem"}},"textColor":"gray-400"} -->
            <p class="has-gray-400-color has-text-color" style="font-size:1.5rem">Crafting digital experiences through code and design. Specializing in WordPress, web development, and modern design systems.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- Stats Grid -->
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"0.25rem"}}} -->
        <div class="wp-block-columns alignwide">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"is-style-stat-item"} -->
                <div class="wp-block-group is-style-stat-item">
                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":2,"textColor":"primary","fontSize":"huge"} -->
                        <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size">12</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small","textColor":"gray-400"} -->
                        <p class="has-gray-400-color has-text-color has-small-font-size">Selected Projects</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"is-style-stat-item"} -->
                <div class="wp-block-group is-style-stat-item">
                    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
                    <div class="wp-block-group">
                        <!-- wp:heading {"level":2,"textColor":"primary","fontSize":"huge"} -->
                        <h2 class="wp-block-heading has-primary-color has-text-color has-huge-font-size">20+</h2>
                        <!-- /wp:heading -->

                        <!-- wp:paragraph {"fontSize":"small","textColor":"gray-400"} -->
                        <p class="has-gray-400-color has-text-color has-small-font-size">Years Experience</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->

    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

#### patterns/skills-section.php
```php
<?php
/**
 * Title: Skills Section
 * Slug: tcp/skills-section
 * Categories: tc-projects
 * Description: Grid of skill cards with hover effects
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"1.5rem","right":"1.5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:4rem;padding-right:1.5rem;padding-bottom:4rem;padding-left:1.5rem">
    <!-- wp:group {"align":"wide"} -->
    <div class="wp-block-group alignwide">
        <!-- wp:heading {"fontSize":"xx-large"} -->
        <h2 class="wp-block-heading has-xx-large-font-size">What I Do</h2>
        <!-- /wp:heading -->

        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem","margin":{"top":"3rem"}}}} -->
        <div class="wp-block-columns alignwide" style="margin-top:3rem">
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"is-style-skill-card"} -->
                <div class="wp-block-group is-style-skill-card">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">WordPress Development</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Custom themes and plugins built with modern development practices and best coding standards.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"is-style-skill-card"} -->
                <div class="wp-block-group is-style-skill-card">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">UI/UX Design</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>Creating intuitive user experiences with beautiful, accessible interfaces that users love.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"is-style-skill-card"} -->
                <div class="wp-block-group is-style-skill-card">
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading">Rapid Prototyping</h3>
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
</div>
<!-- /wp:group -->
```

---

## Phase 2: Custom Blocks

### Custom Block: Featured Project

**Purpose:** Display a featured project on the homepage with clean column layout and simple image treatment.

**Location:** `blocks/featured-project/`

**Design:** 7-5 column grid with content on left and a single clean image on right with hover effects.

#### block.json
```json
{
  "$schema": "https://schemas.wp.org/trunk/block.json",
  "apiVersion": 3,
  "name": "tcp/featured-project",
  "version": "1.0.0",
  "title": "Featured Project",
  "category": "tc-projects",
  "icon": "star-filled",
  "description": "Display a featured project with clean column layout",
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
        imageMain
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
                                            __('Upload Image', 'tc-projects')
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
        imageMain
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
            </div>
        </div>
    );
}
```

#### style.css
```css
/**
 * Featured Project Block Styles
 * Clean column layout with single image
 */

.featured-project-block {
    margin: 4rem 0;
}

.featured-project-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 3rem;
    align-items: center;
}

/* Content - 7 columns on left */
.featured-project-content {
    grid-column: 1 / 8;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.featured-project-category {
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #10b981;
    font-weight: 500;
}

.featured-project-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: clamp(2.25rem, 5vw, 3.75rem);
    color: #ffffff;
    line-height: 1.1;
    margin: 0;
}

.featured-project-description {
    font-size: 1.25rem;
    color: #9ca3af;
    line-height: 1.6;
    font-weight: 300;
    margin: 0;
}

.featured-project-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.3);
    border-radius: 9999px;
    color: #10b981;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.featured-project-button:hover {
    background-color: rgba(16, 185, 129, 0.2);
    border-color: rgba(16, 185, 129, 0.5);
    gap: 0.75rem;
}

/* Image - 5 columns on right */
.featured-project-image-main {
    grid-column: 8 / 13;
    border-radius: 1rem;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    background-color: rgba(20, 20, 20, 0.7);
    transition: border-color 0.3s ease;
}

.featured-project-image-main:hover {
    border-color: rgba(16, 185, 129, 0.3);
}

.featured-project-image-main img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    display: block;
    transition: transform 0.7s ease;
}

.featured-project-image-main:hover img {
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 782px) {
    .featured-project-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .featured-project-content,
    .featured-project-image-main {
        grid-column: 1 / -1;
    }
}
```

#### editor.css
```css
/**
 * Editor Styles for Featured Project Block
 */

.featured-project-block {
    padding: 2rem;
    background-color: rgba(20, 20, 20, 0.3);
    border: 1px dashed rgba(255, 255, 255, 0.2);
    border-radius: 0.5rem;
}

.featured-project-block .image-button {
    padding: 0;
    border: none;
    background: none;
    display: block;
    width: 100%;
}

.featured-project-block .image-button img {
    width: 100%;
    height: auto;
    display: block;
}
```

---

## Implementation Steps

### Quick Start Guide

1. **Set up the theme structure:**
   ```bash
   mkdir -p tc-projects/{templates,parts,patterns,assets/css,blocks/featured-project}
   ```

2. **Create core files:**
   - Copy `style.css` header
   - Create `theme.json` with full configuration
   - Set up `functions.php` with hooks
   - Add `custom-styles.css` to assets

3. **Build templates and parts:**
   - Create all template files in `/templates`
   - Create header and footer in `/parts`
   - Add block patterns in `/patterns`

4. **Phase 2 (Optional - Custom Block):**
   - Set up block directory structure
   - Create `block.json`, `edit.js`, `save.js`
   - Add block styles in `style.css`
   - Register block in `functions.php`

5. **Activate and configure:**
   - Upload theme to WordPress
   - Activate theme
   - Set static front page
   - Create navigation menu
   - Insert patterns on homepage

---

## Code Reference

### Navigation Setup

In WordPress admin, configure your site to display:
- **Site Tagline:** "Troy Chaplin" (displays in white)
- **Site Title:** "Portfolio" (displays in green via CSS)

### Custom Fields for Projects

For the single post template, you can add custom fields using:
- ACF (Advanced Custom Fields)
- CMB2
- Or WordPress native custom fields

Recommended fields:
- **Role:** Text field
- **Tools:** Taxonomy (post_tag)
- **Project Link:** URL field

### Menus

Create a navigation menu with:
- Home
- About
- Projects (link to blog page)

---

## Summary

This implementation plan provides a complete WordPress block theme that faithfully recreates your React portfolio design. **Phase 1** uses only WordPress core blocks, patterns, and CSS - no custom development required. **Phase 2** adds a custom Featured Project block for enhanced editorial control.

The theme uses modern WordPress best practices:
- ✅ Block theme architecture (theme.json)
- ✅ Fluid typography and spacing
- ✅ Custom block styles
- ✅ Reusable block patterns
- ✅ Semantic HTML
- ✅ Accessibility-ready
- ✅ Clean, maintainable code

**Key Features:**
- Dark theme with emerald/teal accents
- Google Fonts (Space Grotesk + Roboto Flex)
- SVG grid background pattern
- Gradient stat underlines
- 70% opacity skill cards
- Asymmetric project galleries
- Hover effects and transitions
- Fully responsive design
- Clean single image featured project layout

The theme is ready for WordPress 6.4+ and follows all modern development standards.
