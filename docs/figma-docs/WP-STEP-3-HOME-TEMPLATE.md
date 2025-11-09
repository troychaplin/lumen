# WordPress Theme Step 3: Homepage Template (Front Page)

## Goal
Create the homepage template with hero section, stats with gradient underlines, and featured projects. This is where the design really comes together.

**Testing checkpoint:** After this step, your homepage should display the complete hero section and stats (projects will be added via patterns in Step 4).

---

## What is front-page.html?

In WordPress, `front-page.html` is a special template that only applies to your homepage (when you set a static front page in Settings → Reading).

**Location:** `/templates/front-page.html`  
**When it's used:** Homepage only (other pages use `page.html`)

---

## File to Create: `/templates/front-page.html`

This template has three main sections:
1. **Header** (template part)
2. **Hero Section** with grid background, large title, and stats
3. **Featured Projects** (we'll add this via pattern in Step 4)
4. **Footer** (template part)

### Complete Code:

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","className":"has-grid-background","style":{"spacing":{"padding":{"top":"var:preset|spacing|3xl","bottom":"var:preset|spacing|3xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"charcoal-dark","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull has-grid-background has-charcoal-dark-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--3xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--3xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- HERO SECTION -->
    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">
        
        <!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"700","lineHeight":"1.1"}},"textColor":"white","fontSize":"7xl","fontFamily":"heading"} -->
        <h1 class="wp-block-heading has-white-color has-text-color has-heading-font-family has-7xl-font-size" style="font-weight:700;line-height:1.1">Creative Developer &<br>Digital Designer</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"textColor":"gray-400","fontSize":"xl"} -->
        <p class="has-gray-400-color has-text-color has-xl-font-size" style="margin-top:var(--wp--preset--spacing--lg)">Building modern web experiences with clean code and creative design</p>
        <!-- /wp:paragraph -->

    </div>
    <!-- /wp:group -->

    <!-- STATS SECTION -->
    <!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|3xl"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--3xl)">
        
        <!-- wp:columns {"align":"wide"} -->
        <div class="wp-block-columns alignwide">
            
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"gradient-underline","style":{"typography":{"fontWeight":"700"}},"textColor":"emerald","fontSize":"5xl","fontFamily":"heading"} -->
                <p class="gradient-underline has-emerald-color has-text-color has-heading-font-family has-5xl-font-size" style="font-weight:700">50+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Projects Completed</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"gradient-underline","style":{"typography":{"fontWeight":"700"}},"textColor":"emerald","fontSize":"5xl","fontFamily":"heading"} -->
                <p class="gradient-underline has-emerald-color has-text-color has-heading-font-family has-5xl-font-size" style="font-weight:700">8+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Years Experience</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:paragraph {"className":"gradient-underline","style":{"typography":{"fontWeight":"700"}},"textColor":"emerald","fontSize":"5xl","fontFamily":"heading"} -->
                <p class="gradient-underline has-emerald-color has-text-color has-heading-font-family has-5xl-font-size" style="font-weight:700">25+</p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Happy Clients</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

        </div>
        <!-- /wp:columns -->

    </div>
    <!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- FEATURED PROJECTS SECTION (Will be added in Step 4) -->
<!-- Future pattern will go here -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

---

## Code Breakdown

### Hero Section

**Outer Group (Main Container):**
```json
{
  "tagName": "main",
  "align": "full",
  "className": "has-grid-background",
  "backgroundColor": "charcoal-dark"
}
```

- `tagName: "main"` → Outputs semantic `<main>` element
- `align: "full"` → Full viewport width
- `className: "has-grid-background"` → Applies SVG grid pattern from custom CSS
- Large padding (3xl) creates generous whitespace

**Heading:**
```json
{
  "fontSize": "7xl",
  "fontFamily": "heading",
  "style": {
    "typography": {
      "fontWeight": "700",
      "lineHeight": "1.1"
    }
  }
}
```

- `7xl` = 4.5rem (from theme.json)
- `heading` = Space Grotesk font
- Tight line-height (1.1) for impact
- `&` is HTML entity for `&` character

**Subtitle:**
- Gray text for contrast (`gray-400`)
- `xl` font size (1.25rem)
- Top margin using spacing token

---

### Stats Section

**Columns Block:**
```html
<!-- wp:columns {"align":"wide"} -->
```

- Creates equal-width columns (3 columns by default)
- `alignwide` keeps within wide content width

**Each Stat:**

1. **Number with gradient underline:**
```html
<p class="gradient-underline has-emerald-color ... has-5xl-font-size">50+</p>
```

- `gradient-underline` class applies the emerald-to-teal line
- `5xl` font size (3rem) for big numbers
- Emerald green color
- Bold weight (700)

2. **Label:**
```html
<p class="has-gray-400-color ... has-base-font-size">Projects Completed</p>
```

- Gray color for secondary text
- Base font size (1rem)
- Small top margin (`sm` = 1rem)

---

## Responsive Behavior

WordPress handles responsive automatically:

- **Desktop:** 3 columns side by side
- **Tablet:** Columns stack but maintain some width
- **Mobile:** Full stack, one stat per row

No custom CSS needed!

---

## Folder Structure After Step 3

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
    ├── index.html
    └── front-page.html
```

---

## Testing This Step

1. **Upload updated theme**

2. **Set static front page:**
   - WordPress Admin → Settings → Reading
   - Select "A static page"
   - Choose "Home" (create a new page called "Home" if needed)
   - Save

3. **View homepage:**
   - ✅ SVG grid background visible (subtle emerald lines)
   - ✅ Large hero heading in Space Grotesk
   - ✅ Subtitle in gray
   - ✅ Three stats with emerald numbers
   - ✅ Green gradient underline beneath each number

4. **Test responsive:**
   - Shrink browser window
   - Stats should stack on mobile
   - Text should remain readable

5. **Inspect gradient underline:**
   - Right-click a stat number → Inspect
   - Check for `::after` pseudo-element with gradient
   - If not showing, verify custom-styles.css is loaded

---

## Customization Options

### Change Hero Text
Edit the heading content directly in the template:
```html
<h1 ...>Your New Headline Here</h1>
```

### Adjust Stats
Change the numbers and labels:
```html
<p class="gradient-underline ...">100+</p>
<p ...>Awards Won</p>
```

### Add More Stats
Duplicate a `<!-- wp:column -->` block and add a 4th stat. Columns will auto-adjust width.

### Change Grid Background Opacity
In `/assets/css/custom-styles.css`:
```css
.has-grid-background::before {
    opacity: 0.2; /* Lower = more subtle */
}
```

### Different Background Color
Change `backgroundColor` in main group:
```json
"backgroundColor": "charcoal" // Instead of charcoal-dark
```

---

## Common Issues

**Grid background not showing:**
- Verify `has-grid-background` class is in the main group's className
- Check custom-styles.css is loading (view source, search for "custom-styles")
- Check `::before` pseudo-element in browser inspector

**Gradient underline not appearing:**
- Verify class name is exactly `gradient-underline` (no typo)
- Check that custom-styles.css has the `.gradient-underline::after` rule
- Clear browser cache

**Stats not in columns:**
- Verify `<!-- wp:columns -->` wrapper
- Check each stat is in its own `<!-- wp:column -->`

**Wrong font showing:**
- Check browser Network tab for Google Fonts loading
- Verify `fontFamily: "heading"` is set
- Force refresh (Cmd+Shift+R / Ctrl+Shift+F5)

**Layout breaking:**
- Validate HTML (blocks must be properly closed)
- Check for missing `/-->` closings
- Look for JSON syntax errors in attributes

---

## Next Step

Once your homepage hero and stats are displaying correctly, proceed to **Step 4: Block Patterns** to create the featured projects section and other reusable content blocks.
