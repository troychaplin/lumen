# TC Projects - WordPress Theme Documentation

This folder contains comprehensive step-by-step guides for building and customizing your WordPress block theme.

---

## 📚 Documentation Guide

### Start Here

**[WP-QUICK-START.md](./WP-QUICK-START.md)** - Fastest way to get your theme running in WordPress  
⏱️ Time: 10 minutes  
📦 Get theme installed and see it live

---

### Step-by-Step Guides

Follow these in order for deep understanding and customization:

#### **Step 1: Foundation & Design System**
**[WP-STEP-1-FOUNDATION.md](./WP-STEP-1-FOUNDATION.md)**  
⏱️ Time: 15 minutes  
📋 Learn: `style.css`, `theme.json`, `functions.php`, custom CSS  
✅ Test: Dark background, fonts loading, grid pattern

---

#### **Step 2: Header & Footer Template Parts**
**[WP-STEP-2-HEADER-FOOTER.md](./WP-STEP-2-HEADER-FOOTER.md)**  
⏱️ Time: 20 minutes  
📋 Learn: Template parts, navigation, block markup syntax  
✅ Test: Header with logo, footer with copyright

---

#### **Step 3: Homepage Template**
**[WP-STEP-3-HOME-TEMPLATE.md](./WP-STEP-3-HOME-TEMPLATE.md)**  
⏱️ Time: 30 minutes  
📋 Learn: `front-page.html`, hero section, stats with gradient underlines  
✅ Test: Complete homepage with hero and stats

---

#### **Step 4: Block Patterns**
**[WP-STEP-4-PATTERNS.md](./WP-STEP-4-PATTERNS.md)**  
⏱️ Time: 45 minutes  
📋 Learn: Creating patterns for featured projects, grids, skills  
✅ Test: Insert patterns into pages

---

#### **Step 5: Page Templates**
**[WP-STEP-5-PAGE-TEMPLATES.md](./WP-STEP-5-PAGE-TEMPLATES.md)**  
⏱️ Time: 30 minutes  
📋 Learn: `page.html`, `single.html`, `blank.html`, template hierarchy  
✅ Test: About page, blog posts, custom templates

---

#### **Step 6: Optional Enhancements**
**[WP-STEP-6-OPTIONAL-ENHANCEMENTS.md](./WP-STEP-6-OPTIONAL-ENHANCEMENTS.md)**  
⏱️ Time: 1-2 hours  
📋 Learn: Custom post types, animations, SEO, performance  
✅ Bonus: Advanced features and optimizations

---

## 🎯 Choose Your Learning Path

### Path 1: "Just Make It Work" (Fastest)
1. Read [WP-QUICK-START.md](./WP-QUICK-START.md)
2. Install the theme from `/wordpress-theme/` folder
3. Add content
4. Done! ✅

**Best for:** Getting live quickly, learning by doing

---

### Path 2: "Understand Everything" (Thorough)
1. Start with [WP-STEP-1-FOUNDATION.md](./WP-STEP-1-FOUNDATION.md)
2. Work through Steps 2-5 in order
3. Test each step before moving on
4. Read Step 6 for advanced features

**Best for:** Deep understanding, full customization control

---

### Path 3: "I Just Need to Fix/Change Something" (Targeted)
- **Change colors?** → Step 1 (theme.json colors section)
- **Edit header/footer?** → Step 2 (template parts)
- **Modify homepage?** → Step 3 (front-page.html)
- **Add project cards?** → Step 4 (block patterns)
- **New page layouts?** → Step 5 (page templates)
- **Custom post types?** → Step 6 (enhancements)

**Best for:** Specific tasks, troubleshooting

---

## 📁 What's in `/wordpress-theme/`?

The actual, ready-to-use WordPress theme files:

```
wordpress-theme/
├── style.css           ← Theme metadata
├── theme.json          ← Design system (YOUR DESIGN TOKENS)
├── functions.php       ← PHP functionality
├── README.txt          ← WordPress theme readme
│
├── assets/css/
│   └── custom-styles.css  ← Grid backgrounds, utilities
│
├── parts/
│   ├── header.html     ← Site header
│   └── footer.html     ← Site footer
│
└── templates/
    ├── index.html      ← Fallback
    ├── front-page.html ← Homepage
    ├── page.html       ← Standard pages
    ├── single.html     ← Blog posts
    └── blank.html      ← Minimal template
```

**To use:** Zip this folder and upload to WordPress

---

## 🎨 Design System Reference

Your theme uses these design tokens (from `theme.json`):

### Colors
- **Charcoal Dark** - `#1a1a1a` (main background)
- **Charcoal** - `#262626` (card backgrounds)
- **Emerald** - `#10b981` (primary accent)
- **Teal** - `#14b8a6` (secondary accent)
- **White** - `#ffffff` (text)
- **Gray 400** - `#9ca3af` (secondary text)

### Fonts
- **Body** - Roboto Flex (weight 300)
- **Headings** - Space Grotesk (weight 600-700)

### Spacing Scale
- **xs** - 0.5rem (8px)
- **sm** - 1rem (16px)
- **md** - 1.5rem (24px)
- **lg** - 2rem (32px)
- **xl** - 3rem (48px)
- **2xl** - 4rem (64px)
- **3xl** - 6rem (96px)

### Font Sizes
- **sm** - 0.875rem
- **base** - 1rem
- **xl** - 1.25rem
- **2xl** - 1.5rem
- **3xl** - 1.875rem
- **4xl** - 2.25rem
- **5xl** - 3rem
- **6xl** - 3.75rem
- **7xl** - 4.5rem (hero text)

---

## 🔧 Common Customizations

### Change Primary Color
Edit `/wordpress-theme/theme.json`:
```json
{
  "slug": "emerald",
  "color": "#YOUR_COLOR_HERE"
}
```

### Change Fonts
Edit `/wordpress-theme/theme.json` fonts section:
```json
"fontFace": [{
  "src": ["https://fonts.googleapis.com/css2?family=Your+Font..."]
}]
```

### Modify Homepage
Edit `/wordpress-theme/templates/front-page.html`

### Edit Header/Footer
Edit `/wordpress-theme/parts/header.html` or `footer.html`

### Add Custom CSS
Edit `/wordpress-theme/assets/css/custom-styles.css`

---

## 🐛 Troubleshooting

Each guide has a "Common Issues" section at the end. Quick checks:

1. **Nothing showing?** - Check file paths and names
2. **Fonts not loading?** - Check Google Fonts URL in theme.json
3. **Styles not applying?** - Clear cache (WordPress + browser)
4. **Grid background missing?** - Verify `has-grid-background` class
5. **Template not working?** - Check template hierarchy order

**Detailed troubleshooting in each step guide**

---

## 📖 WordPress Block Theme Concepts

### What's a Block Theme?
Modern WordPress themes built entirely with blocks. No PHP templates for content rendering (unlike classic themes).

### Key Files

**style.css** - Theme metadata (name, author, etc.)  
**theme.json** - Design system and global settings  
**functions.php** - PHP functionality (enqueue styles, register features)  
**templates/** - Page structure (HTML with block markup)  
**parts/** - Reusable sections (header, footer)  
**patterns/** - Pre-designed content blocks  

### Block Markup Syntax

WordPress uses HTML comments with JSON attributes:

```html
<!-- wp:paragraph {"textColor":"emerald","fontSize":"xl"} -->
<p class="has-emerald-color has-text-color has-xl-font-size">Text</p>
<!-- /wp:paragraph -->
```

**Self-closing blocks:**
```html
<!-- wp:post-title {"level":1} /-->
```

**Nested blocks:**
```html
<!-- wp:group {"backgroundColor":"charcoal"} -->
<div class="wp-block-group has-charcoal-background-color">
    <!-- wp:paragraph -->
    <p>Nested content</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
```

More details in Step 2 guide.

---

## 🚀 Workflow Recommendations

### Development Workflow

1. **Make changes** to files in `/wordpress-theme/`
2. **Re-zip** the theme folder
3. **Re-upload** to WordPress (or use FTP/SFTP)
4. **Test** in WordPress
5. **Clear caches** if needed

### Alternative: Edit in Site Editor

WordPress lets you edit templates visually:
- Appearance → Editor → Templates
- Changes save to database (not files)
- Can export changes back to theme files

**Pro tip:** Develop in files for version control, refine in Site Editor if needed

---

## 📚 External Resources

**WordPress Official:**
- [Block Theme Handbook](https://developer.wordpress.org/themes/block-themes/)
- [theme.json Reference](https://developer.wordpress.org/themes/advanced-topics/theme-json/)
- [Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)

**Your Project:**
- React prototype (in this project root) - Visual reference
- `WORDPRESS-IMPLEMENTATION-PLAN.md` - Original conversion plan
- These step-by-step guides - Detailed instructions

---

## ✅ Getting Started Checklist

- [ ] Read WP-QUICK-START.md
- [ ] Zip `/wordpress-theme/` folder
- [ ] Upload to WordPress
- [ ] Activate theme
- [ ] Set static front page
- [ ] Create navigation menu
- [ ] View homepage (should show hero + stats)
- [ ] Create About page
- [ ] Test responsive design
- [ ] Add your content
- [ ] Celebrate! 🎉

---

## 💡 Tips for Success

1. **Test after each step** - Don't move forward if previous step isn't working
2. **Clear caches often** - Browser cache and WordPress cache
3. **Use browser DevTools** - Inspect elements, check console for errors
4. **Keep backups** - Version control or backup before major changes
5. **Read error messages** - WordPress debug log is your friend
6. **One change at a time** - Easier to identify what broke
7. **Reference the React prototype** - Visual guide for design intent

---

## 🎓 Learning Resources by Topic

**Understanding theme.json:**
- Step 1 guide (comprehensive breakdown)
- [WordPress theme.json docs](https://developer.wordpress.org/themes/advanced-topics/theme-json/)

**Block markup syntax:**
- Step 2 guide (examples and explanations)
- [Block Markup Language](https://developer.wordpress.org/block-editor/explanations/architecture/key-concepts/#blocks)

**Template hierarchy:**
- Step 5 guide (when each template is used)
- [Template Hierarchy diagram](https://developer.wordpress.org/themes/basics/template-hierarchy/)

**Block patterns:**
- Step 4 guide (create custom patterns)
- [Block Pattern directory](https://wordpress.org/patterns/)

**Custom post types:**
- Step 6 guide (projects CPT example)
- [register_post_type() reference](https://developer.wordpress.org/reference/functions/register_post_type/)

---

## 🏆 You've Got This!

This documentation is designed to take you from zero to a fully functional, custom WordPress block theme. Whether you zip through the Quick Start or dive deep into each step, you'll end up with:

✅ A production-ready WordPress theme  
✅ Complete understanding of how it works  
✅ Ability to customize every aspect  
✅ A portfolio site you can be proud of  

**Start with [WP-QUICK-START.md](./WP-QUICK-START.md) and let's build something great!**

---

Questions? Each guide has troubleshooting sections and common issues documented.

Happy building! 🚀
