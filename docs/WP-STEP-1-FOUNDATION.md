# WordPress Theme Step 1: Foundation & Design System

## Goal
Create the foundational theme files that establish the design system, colors, typography, and spacing. This is the base that everything else builds upon.

**Testing checkpoint:** After this step, you should be able to activate the theme in WordPress and see the dark background and Google Fonts loading.

---

## Files to Create

### 1. `/style.css` (Theme Header)
This is required for WordPress to recognize your theme.

**Location:** Root of theme folder  
**What it does:** Contains theme metadata (name, author, description, etc.)

```css
/*
Theme Name: TC Projects
Theme URI: https://troychaplin.com
Author: Troy Chaplin
Author URI: https://troychaplin.com
Description: A modern portfolio theme with emerald green accents, asymmetric layouts, and creative positioning. Features dark charcoal backgrounds with Roboto Flex body text and Space Grotesk headers.
Version: 1.0.0
Requires at least: 6.4
Tested up to: 6.7
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: tc-projects
Tags: portfolio, dark, full-site-editing, block-theme, grid-layout

TC Projects is a modern block theme designed for creative portfolios with asymmetric layouts and bold typography.
*/
```

**Important:** This file must be in the root folder and have this exact comment format.

---

### 2. `/theme.json` (Design System)
This is the heart of your block theme - it defines all your design tokens.

**Location:** Root of theme folder  
**What it does:** Sets up colors, fonts, spacing, and default styles

**Key sections:**

#### Colors
```json
"palette": [
  {
    "slug": "charcoal-dark",
    "color": "#1a1a1a",
    "name": "Charcoal Dark"
  },
  {
    "slug": "emerald",
    "color": "#10b981",
    "name": "Emerald"
  }
]
```

**How to use in templates:**
- Background: `"backgroundColor": "charcoal-dark"`
- Text color: `"textColor": "emerald"`
- CSS var: `var(--wp--preset--color--emerald)`

#### Typography - Font Families

**Important:** WordPress 6.5+ uses the Font Library approach. You reference Google Fonts directly in theme.json:

```json
"fontFamilies": [
  {
    "fontFamily": "'Roboto Flex', sans-serif",
    "slug": "body",
    "name": "Body (Roboto Flex)",
    "fontFace": [
      {
        "fontFamily": "Roboto Flex",
        "fontStyle": "normal",
        "fontWeight": "100 900",
        "src": ["https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100..900&display=swap"]
      }
    ]
  },
  {
    "fontFamily": "'Space Grotesk', sans-serif",
    "slug": "heading",
    "name": "Heading (Space Grotesk)",
    "fontFace": [
      {
        "fontFamily": "Space Grotesk",
        "fontStyle": "normal",
        "fontWeight": "300 700",
        "src": ["https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap"]
      }
    ]
  }
]
```

**How to use in templates:**
- Body font: `"fontFamily": "body"`
- Heading font: `"fontFamily": "heading"`

#### Typography - Font Sizes

```json
"fontSizes": [
  {
    "slug": "6xl",
    "size": "3.75rem",
    "name": "6X Large"
  }
]
```

**How to use in templates:**
- `"fontSize": "6xl"` for large hero text
- `"fontSize": "base"` for body text

#### Spacing

```json
"spacingSizes": [
  {
    "slug": "xl",
    "size": "3rem",
    "name": "Extra Large"
  }
]
```

**How to use in templates:**
```json
"spacing": {
  "padding": {
    "top": "var(--wp--preset--spacing--xl)"
  }
}
```

#### Global Styles

The `styles` section sets defaults for the entire site:

```json
"styles": {
  "color": {
    "background": "var(--wp--preset--color--charcoal-dark)",
    "text": "var(--wp--preset--color--white)"
  },
  "typography": {
    "fontFamily": "var(--wp--preset--font-family--body)",
    "fontWeight": "300"
  }
}
```

#### Element Styles

Style all headings, links, and buttons globally:

```json
"elements": {
  "h1": {
    "typography": {
      "fontSize": "var(--wp--preset--font-size--6xl)",
      "fontWeight": "700"
    }
  },
  "link": {
    "color": {
      "text": "var(--wp--preset--color--emerald)"
    }
  }
}
```

---

### 3. `/functions.php` (Theme Setup)
Your theme's PHP functionality.

**Location:** Root of theme folder  
**What it does:** Enqueues styles and registers pattern categories

```php
<?php
/**
 * TC Projects Theme Functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue custom styles
 */
function tc_projects_enqueue_styles() {
    wp_enqueue_style(
        'tc-projects-custom-styles',
        get_template_directory_uri() . '/assets/css/custom-styles.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'tc_projects_enqueue_styles' );

/**
 * Register custom block patterns category
 */
function tc_projects_register_pattern_categories() {
    register_block_pattern_category(
        'tc-projects',
        array( 'label' => __( 'TC Projects', 'tc-projects' ) )
    );
}
add_action( 'init', 'tc_projects_register_pattern_categories' );
```

**What each part does:**
- `tc_projects_enqueue_styles()` - Loads your custom CSS file
- `tc_projects_register_pattern_categories()` - Creates a category for your block patterns

---

### 4. `/assets/css/custom-styles.css` (Custom CSS)
Background patterns and utility classes that can't be done in theme.json.

**Location:** `/assets/css/custom-styles.css`  
**What it does:** Provides the SVG grid background and special effects

**Key classes:**

#### Grid Background Pattern
```css
.has-grid-background {
    position: relative;
    background-color: #1a1a1a;
}

.has-grid-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.4;
    background-image: url('data:image/svg+xml;base64,...');
    pointer-events: none;
    z-index: 0;
}
```

**How to use:** Add `has-grid-background` to a Group block's Additional CSS class field.

#### Gradient Underline
```css
.gradient-underline {
    position: relative;
    display: inline-block;
}

.gradient-underline::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(to right, #10b981, #14b8a6);
}
```

**How to use:** Wrap your stat numbers in a paragraph with class `gradient-underline`.

#### Card Backgrounds
```css
.card-bg-charcoal {
    background-color: rgba(38, 38, 38, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.1);
}
```

**How to use:** Add to Group blocks for semi-transparent card backgrounds.

---

## Folder Structure After Step 1

```
tc-projects/
├── style.css
├── theme.json
├── functions.php
└── assets/
    └── css/
        └── custom-styles.css
```

---

## Testing This Step

1. **Zip the theme folder:** Select all files/folders → Right click → Compress
2. **Upload to WordPress:** Appearance → Themes → Add New → Upload Theme
3. **Activate the theme**
4. **Check the following:**
   - ✅ Dark background (#1a1a1a) appears
   - ✅ Default text is white and light weight (300)
   - ✅ Font loads (look in browser inspector for "Roboto Flex")
   - ✅ No errors in browser console

5. **Create a test page:**
   - Create new page
   - Add a Heading block, type "Test Heading" 
   - Add a Paragraph block, type "Test paragraph"
   - Check that heading uses Space Grotesk and body uses Roboto Flex
   - Add a Group block, go to Advanced → Additional CSS class(es) → type `has-grid-background`
   - Check that subtle grid pattern appears

---

## Common Issues

**Fonts not loading:**
- Check browser Network tab for Google Fonts request
- Verify Font Library in WordPress (Settings → Font Library)

**Grid background not showing:**
- Make sure `/assets/css/custom-styles.css` exists
- Check that functions.php is enqueueing it correctly
- Clear WordPress cache and browser cache

**Theme not appearing:**
- Verify `style.css` has the correct comment header
- Check file permissions (folders 755, files 644)

---

## Next Step

Once foundation is working, proceed to **Step 2: Header & Footer** to create the navigation and footer template parts.
