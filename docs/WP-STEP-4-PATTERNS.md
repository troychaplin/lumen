# WordPress Theme Step 4: Block Patterns

## Goal
Create reusable block patterns for featured projects and other content sections. Patterns let you (or your users) insert pre-designed content blocks with one click.

**Testing checkpoint:** After this step, you can insert patterns via the WordPress editor and build out your projects section.

---

## What Are Block Patterns?

Block patterns are pre-designed layouts made of blocks that users can insert into pages. Think of them as templates for specific sections.

**Location:** `/patterns/` folder  
**File format:** `.php` files (yes, PHP even though content is HTML)  
**Benefits:**
- Reusable across pages
- One-click insertion
- Easy to customize after insertion

---

## Files to Create

### 1. `/patterns/featured-project.php`

A single featured project card with large image and project details.

**Pattern Structure:**
- 7-5 column layout (7 columns for image, 5 for content)
- Charcoal card background with subtle border
- Project title, description, tech stack
- "View Project" button

```php
<?php
/**
 * Title: Featured Project
 * Slug: tc-projects/featured-project
 * Categories: tc-projects
 * Description: A featured project card with image and details in 7-5 column layout
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"backgroundColor":"charcoal","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-charcoal-background-color has-background" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
    <div class="wp-block-columns alignwide">

        <!-- wp:column {"width":"58.33%"} -->
        <div class="wp-block-column" style="flex-basis:58.33%">
            
            <!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"large","className":"project-image"} -->
            <figure class="wp-block-image size-large project-image"><img src="" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
            <!-- /wp:image -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"41.67%","verticalAlignment":"center"} -->
        <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:41.67%">

            <!-- wp:group {"className":"card-bg-charcoal","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group card-bg-charcoal" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">

                <!-- wp:heading {"level":2,"textColor":"white","fontSize":"4xl","fontFamily":"heading"} -->
                <h2 class="wp-block-heading has-white-color has-text-color has-heading-font-family has-4xl-font-size">Project Title</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--md)">A brief description of the project, highlighting key features and the problem it solves. Keep it concise and engaging.</p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|lg"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
                <div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--lg)">
                    
                    <!-- wp:paragraph {"className":"card-bg-emerald","style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1rem","right":"1rem"}},"border":{"radius":"0.375rem"}},"textColor":"emerald","fontSize":"sm"} -->
                    <p class="card-bg-emerald has-emerald-color has-text-color has-sm-font-size" style="border-radius:0.375rem;padding-top:0.5rem;padding-right:1rem;padding-bottom:0.5rem;padding-left:1rem">React</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"card-bg-emerald","style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1rem","right":"1rem"}},"border":{"radius":"0.375rem"}},"textColor":"emerald","fontSize":"sm"} -->
                    <p class="card-bg-emerald has-emerald-color has-text-color has-sm-font-size" style="border-radius:0.375rem;padding-top:0.5rem;padding-right:1rem;padding-bottom:0.5rem;padding-left:1rem">TypeScript</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:paragraph {"className":"card-bg-emerald","style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1rem","right":"1rem"}},"border":{"radius":"0.375rem"}},"textColor":"emerald","fontSize":"sm"} -->
                    <p class="card-bg-emerald has-emerald-color has-text-color has-sm-font-size" style="border-radius:0.375rem;padding-top:0.5rem;padding-right:1rem;padding-bottom:0.5rem;padding-left:1rem">Tailwind CSS</p>
                    <!-- /wp:paragraph -->

                </div>
                <!-- /wp:group -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}}} -->
                <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xl)">
                    <!-- wp:button {"backgroundColor":"emerald","textColor":"charcoal-dark"} -->
                    <div class="wp-block-button"><a class="wp-block-button__link has-charcoal-dark-color has-emerald-background-color has-text-color has-background wp-element-button">View Project →</a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
```

**Key Features:**

1. **7-5 Column Layout:**
   - Left column: `width: "58.33%"` (7/12)
   - Right column: `width: "41.67%"` (5/12)

2. **Image Block:**
   - `aspectRatio: "16/9"` maintains ratio
   - `scale: "cover"` crops to fit
   - Empty `src=""` for user to add their image

3. **Content Card:**
   - `card-bg-charcoal` class from custom CSS
   - Rounded corners (`border-radius: 0.5rem`)
   - Generous padding

4. **Tech Stack Tags:**
   - Flex layout wraps tags
   - `card-bg-emerald` class for green tinted background
   - Small text size

5. **Button:**
   - Emerald background
   - Dark charcoal text (good contrast)
   - Arrow for visual interest

---

### 2. `/patterns/project-grid.php`

A 3-column grid of project cards (for project archive pages).

```php
<?php
/**
 * Title: Project Grid
 * Slug: tc-projects/project-grid
 * Categories: tc-projects
 * Description: A 3-column grid layout for displaying multiple projects
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|2xl"}}},"textColor":"white","fontSize":"5xl","fontFamily":"heading"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-heading-font-family has-5xl-font-size" style="margin-bottom:var(--wp--preset--spacing--2xl)">Featured Work</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">

        <!-- wp:column -->
        <div class="wp-block-column">
            
            <!-- wp:group {"className":"card-bg-charcoal hover-lift","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|lg","left":"0","right":"0"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group card-bg-charcoal hover-lift" style="border-radius:0.5rem;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--lg);padding-left:0">

                <!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"large","className":"project-image"} -->
                <figure class="wp-block-image size-large project-image"><img src="" alt="" style="aspect-ratio:4/3;object-fit:cover"/></figure>
                <!-- /wp:image -->

                <!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--lg)">

                    <!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"white","fontSize":"2xl","fontFamily":"heading"} -->
                    <h3 class="wp-block-heading has-white-color has-text-color has-heading-font-family has-2xl-font-size" style="margin-top:var(--wp--preset--spacing--md)">Project Name</h3>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}},"textColor":"gray-400","fontSize":"sm"} -->
                    <p class="has-gray-400-color has-text-color has-sm-font-size" style="margin-top:var(--wp--preset--spacing--sm)">Short project description goes here</p>
                    <!-- /wp:paragraph -->

                </div>
                <!-- /wp:group -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

        <!-- Repeat column 2x more for 3 total columns -->
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- Same structure as above -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- Same structure as above -->
        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->
```

*Note: I've abbreviated the repeated columns for brevity. Copy the first column structure for columns 2 and 3.*

**Key Features:**

1. **Centered Heading:** "Featured Work" title
2. **3 Equal Columns:** Auto-responsive
3. **Card Hover Effect:** `hover-lift` class from custom CSS
4. **4:3 Aspect Ratio:** Good for project screenshots

---

### 3. `/patterns/skills-grid.php`

A grid of skill cards for the About page.

```php
<?php
/**
 * Title: Skills Grid
 * Slug: tc-projects/skills-grid
 * Categories: tc-projects
 * Description: Grid of skill cards with icons and descriptions
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2xl","bottom":"var:preset|spacing|2xl","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2xl);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--2xl);padding-left:var(--wp--preset--spacing--md)">

    <!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|xl"}}},"textColor":"white","fontSize":"5xl","fontFamily":"heading"} -->
    <h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-heading-font-family has-5xl-font-size" style="margin-bottom:var(--wp--preset--spacing--xl)">Skills & Expertise</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">

        <!-- wp:column -->
        <div class="wp-block-column">
            
            <!-- wp:group {"className":"card-bg-charcoal","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group card-bg-charcoal" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">

                <!-- wp:heading {"level":3,"textColor":"emerald","fontSize":"3xl","fontFamily":"heading"} -->
                <h3 class="wp-block-heading has-emerald-color has-text-color has-heading-font-family has-3xl-font-size">Frontend Development</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--md)">React, TypeScript, Next.js, Tailwind CSS, and modern JavaScript frameworks</p>
                <!-- /wp:paragraph -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            
            <!-- wp:group {"className":"card-bg-charcoal","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group card-bg-charcoal" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">

                <!-- wp:heading {"level":3,"textColor":"emerald","fontSize":"3xl","fontFamily":"heading"} -->
                <h3 class="wp-block-heading has-emerald-color has-text-color has-heading-font-family has-3xl-font-size">UI/UX Design</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--md)">Figma, Adobe XD, user research, wireframing, and prototyping</p>
                <!-- /wp:paragraph -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            
            <!-- wp:group {"className":"card-bg-charcoal","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"}},"border":{"radius":"0.5rem"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group card-bg-charcoal" style="border-radius:0.5rem;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">

                <!-- wp:heading {"level":3,"textColor":"emerald","fontSize":"3xl","fontFamily":"heading"} -->
                <h3 class="wp-block-heading has-emerald-color has-text-color has-heading-font-family has-3xl-font-size">WordPress</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}},"textColor":"gray-400","fontSize":"base"} -->
                <p class="has-gray-400-color has-text-color has-base-font-size" style="margin-top:var(--wp--preset--spacing--md)">Block theme development, custom blocks, and headless WordPress</p>
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

## Folder Structure After Step 4

```
tc-projects/
├── patterns/
│   ├── featured-project.php
│   ├── project-grid.php
│   └── skills-grid.php
```

---

## Using Patterns in WordPress

1. **Edit any page**
2. **Click the (+) button** to add a block
3. **Go to the "Patterns" tab**
4. **Find "TC Projects" category**
5. **Click a pattern to insert it**
6. **Customize the content** (change text, add images, etc.)

---

## Testing This Step

1. **Upload updated theme**

2. **Edit your homepage:**
   - Click Edit Page
   - Click (+) to add block
   - Go to Patterns → TC Projects
   - Insert "Featured Project" pattern
   - Add an image (click the image placeholder)
   - Change the project title and description
   - Update tech stack tags
   - Add link to "View Project" button

3. **Test Project Grid:**
   - Create a new page called "Work" or "Projects"
   - Insert "Project Grid" pattern
   - Add images to all three project cards
   - Customize titles

4. **Test Skills Grid:**
   - Create "About" page
   - Insert "Skills Grid" pattern
   - Customize skill names and descriptions

---

## Common Issues

**Patterns not appearing:**
- Check that functions.php registers the category
- Verify files are in `/patterns/` folder (not `/pattern/` or `/block-patterns/`)
- File names must end in `.php`
- Clear WordPress cache

**Pattern header not working:**
```php
<?php
/**
 * Title: Your Title  ← This exact format
 * Slug: tc-projects/slug  ← Must start with theme text domain
 * Categories: tc-projects  ← Must match registered category
 */
?>
```

**Card backgrounds not showing:**
- Verify `card-bg-charcoal` class exists in custom-styles.css
- Check class name in pattern matches CSS (no typos)

**Images not responsive:**
- Make sure `aspectRatio` is set
- Verify `scale: "cover"` is included
- Check that image has no fixed width/height

---

## Next Step

Once patterns are working, proceed to **Step 5: Page Templates** to create templates for the About page and individual project pages.
