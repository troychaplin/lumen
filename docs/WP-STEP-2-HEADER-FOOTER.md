# WordPress Theme Step 2: Header & Footer Template Parts

## Goal
Create reusable header and footer template parts that will appear on every page. The header features your "Troy Chaplin Portfolio" branding with "Portfolio" in green, and the footer has a simple copyright.

**Testing checkpoint:** After this step, you should see the header and footer on all pages.

---

## What Are Template Parts?

Template parts are reusable chunks of HTML that appear across multiple templates. Think of them like React components - you define them once and use them everywhere.

**Location:** `/parts/` folder  
**File format:** `.html` files containing block markup

---

## Files to Create

### 1. `/parts/header.html`

**What it includes:**
- Group block as container
- Site title styled as "Troy Chaplin" (white) + "Portfolio" (emerald green)
- Navigation menu with "Work" and "About" links

```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"backgroundColor":"charcoal","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-charcoal-background-color has-background" style="padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group">
        
        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group">
            <!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"xl","fontFamily":"heading"} -->
            <p class="has-heading-font-family has-xl-font-size" style="font-weight:600">Troy Chaplin <span style="color:#10b981">Portfolio</span></p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:navigation {"textColor":"white","overlayBackgroundColor":"charcoal-dark","overlayTextColor":"white","layout":{"type":"flex","justifyContent":"right"},"fontSize":"base","fontFamily":"body"} /-->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Key elements explained:**

- **Outer Group:** `"align":"full"` makes it full width
- **Container layout:** `"type":"constrained"` keeps content within max-width
- **Inner Group:** `"type":"flex"` with `"justifyContent":"space-between"` pushes logo left, nav right
- **Site Title:** Using a paragraph with inline `<span>` for the green "Portfolio" text
- **Navigation:** Self-closing tag - WordPress will populate this from Appearance → Menus

**Styling breakdown:**
- Padding: `var:preset|spacing|lg` references spacing tokens from theme.json
- Background: `charcoal` color from theme.json
- Font size: `xl` from theme.json font sizes
- Font family: `heading` (Space Grotesk) from theme.json

---

### 2. `/parts/footer.html`

**What it includes:**
- Full-width group with charcoal background
- Centered copyright text with current year
- Subtle border on top

```html
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"top":{"color":"var:preset|color|gray-600","width":"1px"}}},"backgroundColor":"charcoal","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-charcoal-background-color has-background" style="border-top-color:var(--wp--preset--color--gray-600);border-top-width:1px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--md)">
    
    <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
    <div class="wp-block-group">
        
        <!-- wp:paragraph {"textColor":"gray-400","fontSize":"sm"} -->
        <p class="has-gray-400-color has-text-color has-sm-font-size">© 2025 Troy Chaplin. All rights reserved.</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->
```

**Key elements explained:**

- **Border:** `"border":{"top":{"color":"var:preset|color|gray-600","width":"1px"}}` adds top border
- **Centered text:** Inner group uses flex layout with `"justifyContent":"center"`
- **Text color:** `gray-400` for subtle copyright

**Note on year:** WordPress doesn't have a dynamic year shortcode in block themes yet, so you'll need to update manually or use a small PHP snippet (covered in Step 5 optional enhancements).

---

### 3. `/templates/index.html` (Basic Template to Test)

Before you can see the header/footer, you need at least one template. Create a minimal template:

**Location:** `/templates/index.html`

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull">
    <!-- wp:post-content /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**What this does:**
- `wp:template-part` includes your header.html and footer.html
- `tagName` makes it use semantic HTML (`<header>` and `<footer>` tags)
- `wp:post-content` displays the page content (we'll replace this later)

---

## Folder Structure After Step 2

```
tc-projects/
├── style.css
├── theme.json
├── functions.php
├── assets/
│   └── css/
│       └── custom-styles.css
├── parts/
│   ├── header.html
│   └── footer.html
└── templates/
    └── index.html
```

---

## Testing This Step

1. **Re-zip and re-upload theme** (or use FTP to update files)
2. **Create your navigation menu:**
   - Go to Appearance → Menus (or Navigation in Site Editor)
   - Create menu items:
     - "Work" → Link to homepage
     - "About" → Link to about page
   - Save the menu

3. **View any page on your site**
   - Check for header at top
   - Check for footer at bottom
   - Verify "Troy Chaplin" is white and "Portfolio" is green (#10b981)

4. **Test responsive:**
   - Resize browser window
   - Navigation should collapse to hamburger menu on mobile (WordPress handles this automatically)

---

## Customization Tips

### Change Navigation Position
To center the navigation instead of right-align:
```json
"layout":{"type":"flex","justifyContent":"center"}
```

### Add Social Icons to Footer
Add before the copyright paragraph:
```html
<!-- wp:social-links {"iconColor":"emerald","iconColorValue":"#10b981","size":"has-small-icon-size"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color">
    <!-- wp:social-link {"url":"https://twitter.com/yourhandle","service":"twitter"} /-->
    <!-- wp:social-link {"url":"https://github.com/yourhandle","service":"github"} /-->
</ul>
<!-- /wp:social-links -->
```

### Sticky Header
Add to outer header Group:
```json
"style":{"position":{"type":"sticky","top":"0"}}
```

---

## Understanding Block Markup

WordPress block markup uses HTML comments with JSON:

```html
<!-- wp:blockname {"attribute":"value"} -->
<div class="wp-block-blockname">
    Content here
</div>
<!-- /wp:blockname -->
```

**Self-closing blocks:**
```html
<!-- wp:navigation /-->
```

**Nested blocks:**
```html
<!-- wp:group -->
<div>
    <!-- wp:paragraph -->
    <p>Text</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
```

---

## Common Issues

**Header/Footer not showing:**
- Verify files are in `/parts/` folder (not `/template-parts/`)
- Check template includes: `wp:template-part {"slug":"header"}`
- Clear WordPress cache

**Navigation not appearing:**
- Create a navigation menu in WordPress admin
- Assign it in Site Editor or Customizer

**"Portfolio" text not green:**
- Check the inline style: `style="color:#10b981"`
- Verify it's inside the `<span>` tag

**Layout breaking on mobile:**
- WordPress handles responsive navigation automatically
- Test in actual mobile browser, not just resized desktop

---

## Next Step

Once header and footer are displaying correctly, proceed to **Step 3: Homepage Template** to build the hero section, stats, and project grid.
