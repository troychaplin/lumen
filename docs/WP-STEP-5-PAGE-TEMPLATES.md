# WordPress Theme Step 5: Page Templates

## Goal
Create templates for standard pages (About) and single project pages. These templates define the overall structure, and users add content via patterns or blocks.

**Testing checkpoint:** After this step, you can create About pages and individual project pages with proper layouts.

---

## What Are Templates?

Templates are the overall page structure that WordPress uses to display content. Unlike patterns (which are inserted by users), templates automatically apply based on page type.

**Location:** `/templates/` folder  
**File format:** `.html` files

**Common templates:**
- `front-page.html` - Homepage only (✅ already created)
- `page.html` - All standard pages
- `single.html` - Blog posts
- `single-project.html` - Custom post type (optional)
- `blank.html` - Minimal template with no header/footer

---

## Files to Create

### 1. `/templates/page.html`

This is the default template for all standard pages (About, Contact, etc.).

**Structure:**
- Header
- Full-width content area with constrained inner width
- Footer

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">

        <!-- wp:post-title {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"white","fontSize":"6xl","fontFamily":"heading"} /-->

        <!-- wp:post-content {"align":"wide","layout":{"type":"constrained"}} /-->

    </div>
    <!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Key elements:**

- `wp:post-title` - Auto-displays page title
  - Centered
  - Large font (6xl = 3.75rem)
  - Space Grotesk heading font

- `wp:post-content` - Auto-displays page content
  - Wide alignment for more breathing room
  - This is where users add blocks and patterns

**Styling:**
- Clean, generous spacing (2xl padding)
- Content constrained to max-width from theme.json
- Wide alignment gives more room than default

---

### 2. `/templates/single.html`

Template for blog posts (if you add a blog later).

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
    <div class="wp-block-group">

        <!-- wp:post-title {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|md"}}},"textColor":"white","fontSize":"6xl","fontFamily":"heading"} /-->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} -->
        <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
            
            <!-- wp:post-date {"textColor":"gray-400","fontSize":"sm"} /-->
            
            <!-- wp:paragraph {"textColor":"gray-400","fontSize":"sm"} -->
            <p class="has-gray-400-color has-text-color has-sm-font-size">•</p>
            <!-- /wp:paragraph -->
            
            <!-- wp:post-author {"showAvatar":false,"textColor":"gray-400","fontSize":"sm"} /-->

        </div>
        <!-- /wp:group -->

        <!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}}} /-->

        <!-- wp:post-content {"layout":{"type":"constrained"}} /-->

    </div>
    <!-- /wp:group -->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

**Key elements:**

- Narrower content width (800px) for better reading
- Post meta: date and author
- Featured image with 16:9 aspect ratio
- Centered title

---

### 3. `/templates/blank.html`

Minimal template with no header/footer (for landing pages, etc.).

```html
<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">

    <!-- wp:post-content {"align":"full","layout":{"type":"constrained"}} /-->

</main>
<!-- /wp:group -->
```

**Use cases:**
- Landing pages
- Full-screen sections
- Pages where you want complete control

**How to use:**
- Edit page in WordPress
- Sidebar → Template → Select "Blank"

---

### 4. Optional: `/templates/archive.html`

For blog archive / projects listing page.

```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">

        <!-- wp:query-title {"type":"archive","textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"textColor":"white","fontSize":"6xl","fontFamily":"heading"} /-->

        <!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
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

**Key features:**
- 3-column grid of posts
- Card-style layout matching your design
- Pagination at bottom

---

## Folder Structure After Step 5

```
tc-projects/
├── templates/
│   ├── front-page.html
│   ├── index.html
│   ├── page.html
│   ├── single.html
│   ├── blank.html
│   └── archive.html (optional)
```

---

## Template Hierarchy in WordPress

WordPress chooses templates in this order:

1. **Homepage:** `front-page.html` → `home.html` → `index.html`
2. **Pages:** `page-{slug}.html` → `page.html` → `index.html`
3. **Single Posts:** `single.html` → `index.html`
4. **Archives:** `archive.html` → `index.html`

**Custom per-page templates:**
Users can override via the Template selector in the editor sidebar.

---

## Testing This Step

### Test Page Template

1. **Create a new page** called "About"
2. **Add content:**
   - Insert "Skills Grid" pattern
   - Add some paragraphs
   - Add headings

3. **Publish and view:**
   - ✅ Page title at top (large, centered)
   - ✅ Content displays below
   - ✅ Header and footer present
   - ✅ Content width is constrained

### Test Single Post Template

1. **Create a blog post** (Posts → Add New)
2. **Add:**
   - Title
   - Featured image
   - Some content

3. **View the post:**
   - ✅ Featured image displays (16:9 aspect ratio)
   - ✅ Date and author show
   - ✅ Content is readable width (800px max)

### Test Blank Template

1. **Edit About page**
2. **Sidebar → Template → Select "Blank"**
3. **View page:**
   - ✅ No header
   - ✅ No footer
   - ✅ Content goes edge-to-edge

---

## Customization Options

### Change Content Width

In `page.html`, adjust the `contentSize`:

```json
"layout": {"type":"constrained","contentSize":"900px"}
```

### Add Breadcrumbs

Install a breadcrumb plugin, then add before `post-title`:

```html
<!-- wp:shortcode -->
[breadcrumb]
<!-- /wp:shortcode -->
```

### Add Sidebar Layout

Create a new template `page-sidebar.html`:

```html
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide">
    
    <!-- wp:column {"width":"66.66%"} -->
    <div class="wp-block-column" style="flex-basis:66.66%">
        <!-- wp:post-content /-->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"width":"33.33%"} -->
    <div class="wp-block-column" style="flex-basis:33.33%">
        <!-- Sidebar content here -->
    </div>
    <!-- /wp:column -->

</div>
<!-- /wp:columns -->
```

### Different Header Per Template

Create alternate header: `/parts/header-minimal.html`

Use in template:
```html
<!-- wp:template-part {"slug":"header-minimal","tagName":"header"} /-->
```

---

## Common Issues

**Template not applying:**
- Check file is in `/templates/` folder
- File name must end in `.html`
- Check template hierarchy (WordPress may be using a different template)
- Try setting template manually in editor sidebar

**Content width issues:**
- Verify `layout: {"type":"constrained"}` is set
- Check `contentSize` in theme.json
- Use `alignwide` for wider content

**Blank template still showing header:**
- Make sure you selected "Blank" in Template selector
- Clear cache and refresh
- Check that blank.html doesn't have template-part includes

**Post content not showing:**
- Verify you have `<!-- wp:post-content /-->` block
- Check that you're editing the right template
- Make sure there's actual content on the page

---

## WordPress Template Editing

You can also edit templates visually:

1. **Go to:** Appearance → Editor → Templates
2. **Click a template** to edit it
3. **Add/remove blocks** visually
4. **Export changes** back to theme files (Appearance → Editor → Export)

**Caution:** Changes made in the editor override theme files. For version control, keep templates in your theme files.

---

## Next Step

You now have a complete, functional WordPress block theme! 

**Optional enhancements:**
- Add custom post type for Projects (requires plugin or code)
- Create more patterns for specific layouts
- Add animation CSS
- Optimize performance (lazy loading, etc.)
- Add schema markup for SEO

See **WP-STEP-6-OPTIONAL-ENHANCEMENTS.md** for advanced features.
