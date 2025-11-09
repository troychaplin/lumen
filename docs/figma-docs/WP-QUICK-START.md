# WordPress Theme Quick Start Guide

## What You Have

You now have a complete WordPress block theme in two formats:

1. **Actual theme files** in `/wordpress-theme/` folder (ready to use)
2. **Step-by-step guides** in `/docs/` folder (for understanding and customization)

---

## Fastest Path to WordPress

### 1. Package the Theme (30 seconds)

**Option A: Manual Zip**
- Navigate to `/wordpress-theme/` folder
- Select all files and folders inside
- Right-click → Compress/Create Archive
- Name it: `tc-projects.zip`

**Option B: Command Line**
```bash
cd wordpress-theme
zip -r tc-projects.zip .
```

### 2. Install in WordPress (2 minutes)

1. Log into WordPress Admin
2. Go to: **Appearance → Themes → Add New → Upload Theme**
3. Choose your `tc-projects.zip` file
4. Click **Install Now**
5. Click **Activate**

### 3. Initial Setup (5 minutes)

**Set Homepage:**
1. Create a new Page called "Home"
2. Go to **Settings → Reading**
3. Select "A static page"
4. Choose "Home" as your front page
5. Save

**Create Navigation:**
1. Go to **Appearance → Menus** (or use Navigation in Site Editor)
2. Create a new menu
3. Add pages: "Home" and "About"
4. Save menu

**View Your Site:**
- Your homepage should now show the hero section with stats
- Grid background pattern visible
- Header with "Troy Chaplin Portfolio" branding

---

## What Works Right Now

✅ **Design System** - Colors, fonts, spacing all configured  
✅ **Homepage** - Hero section + stats with gradient underlines  
✅ **Header** - Logo and navigation  
✅ **Footer** - Copyright notice  
✅ **Page Template** - For About page and others  
✅ **Custom CSS** - Grid backgrounds, card styles, hover effects  

---

## Next Steps (Choose Your Path)

### Path 1: Quick Content Addition (15 minutes)

**Add About Page:**
1. Create new Page → "About"
2. Click (+) → Patterns → TC Projects → "Skills Grid"
3. Customize the skill titles and descriptions
4. Add paragraphs above/below the pattern
5. Publish

**Customize Homepage:**
1. Edit "Home" page
2. Below the stats, click (+) to add blocks
3. Insert patterns or create custom content
4. Publish

### Path 2: Deep Customization (Follow Step Guides)

Work through each guide in order:
1. ✅ `WP-STEP-1-FOUNDATION.md` - Already complete
2. ✅ `WP-STEP-2-HEADER-FOOTER.md` - Already complete
3. ✅ `WP-STEP-3-HOME-TEMPLATE.md` - Already complete
4. 📝 `WP-STEP-4-PATTERNS.md` - Add project patterns
5. 📝 `WP-STEP-5-PAGE-TEMPLATES.md` - Understand templates
6. 📝 `WP-STEP-6-OPTIONAL-ENHANCEMENTS.md` - Advanced features

### Path 3: Pattern-Based Content (Recommended)

The theme includes ready-to-use block patterns. Access them:

1. Edit any page
2. Click the **(+)** button
3. Go to **Patterns** tab
4. Find **TC Projects** category
5. Click to insert:
   - **Featured Project** - Large project showcase
   - **Project Grid** - 3-column project cards
   - **Skills Grid** - 3-column skills/services

**Note:** Patterns need to be created first (see Step 4).

---

## File Structure Explained

```
wordpress-theme/
├── style.css              ← Theme header (required)
├── theme.json             ← Design system (colors, fonts, spacing)
├── functions.php          ← PHP functionality
├── README.txt             ← Theme documentation
│
├── assets/
│   └── css/
│       └── custom-styles.css  ← Grid backgrounds, utilities
│
├── parts/
│   ├── header.html        ← Site header (logo + nav)
│   └── footer.html        ← Site footer (copyright)
│
└── templates/
    ├── index.html         ← Fallback template
    ├── front-page.html    ← Homepage only
    ├── page.html          ← Standard pages
    ├── single.html        ← Blog posts
    └── blank.html         ← No header/footer
```

**Optional folders to add:**
- `/patterns/` - Block patterns (Step 4)
- `/assets/images/` - Theme images

---

## Customization Quick Reference

### Change Colors

Edit `/theme.json`:

```json
"palette": [
  {
    "slug": "emerald",
    "color": "#10b981",  ← Change this hex value
    "name": "Emerald"
  }
]
```

### Change Fonts

Edit `/theme.json`:

```json
"fontFamilies": [
  {
    "fontFamily": "'Your Font', sans-serif",
    "slug": "body",
    "name": "Body Font",
    "fontFace": [{
      "src": ["https://fonts.googleapis.com/css2?family=Your+Font..."]
    }]
  }
]
```

### Change Hero Text

Edit `/templates/front-page.html`, find:

```html
<h1 ...>Creative Developer &<br>Digital Designer</h1>
```

Change to your text.

### Change Stats

Edit `/templates/front-page.html`, find:

```html
<p class="gradient-underline ...">50+</p>
<p ...>Projects Completed</p>
```

Update numbers and labels.

### Add Custom CSS

Edit `/assets/css/custom-styles.css` and add your styles.

---

## Common Tasks

### Add New Page

1. Pages → Add New
2. Enter title
3. Add content (blocks or patterns)
4. Publish

### Change Logo/Site Title

Edit `/parts/header.html`:

```html
<p ...>Your Name <span style="color:#10b981">Portfolio</span></p>
```

Or replace with an image block for a logo.

### Add Blog Posts

1. Posts → Add New
2. Add title, content, featured image
3. Publish
4. View at `/blog/` (or your posts page)

### Create Custom Page Template

1. Duplicate `/templates/page.html`
2. Rename to `page-custom.html`
3. Edit the structure
4. Users can select it in page sidebar → Template

---

## Troubleshooting

### Grid Background Not Showing

1. Check `/assets/css/custom-styles.css` exists
2. Verify class `has-grid-background` is on the main group
3. Clear browser cache (Cmd+Shift+R / Ctrl+Shift+F5)

### Fonts Not Loading

1. Check browser Network tab for Google Fonts request
2. Verify Font Library in Settings → Font Library
3. Check `theme.json` font syntax

### Navigation Not Appearing

1. Create a menu in Appearance → Menus
2. Add pages to the menu
3. Save
4. WordPress will auto-populate the navigation block

### Patterns Not Available

Patterns need to be created in `/patterns/` folder. See Step 4 guide.

### Changes Not Appearing

1. Clear WordPress cache (if using caching plugin)
2. Clear browser cache
3. Check you're editing the right template/file
4. Verify you saved changes

---

## Testing Checklist

Before going live:

- [ ] Homepage displays correctly
- [ ] Header shows on all pages
- [ ] Footer shows on all pages
- [ ] Navigation menu works
- [ ] Grid background visible
- [ ] Stats have gradient underlines
- [ ] Fonts loading (Roboto Flex + Space Grotesk)
- [ ] Colors match design (emerald green #10b981)
- [ ] Mobile responsive (test on phone)
- [ ] All pages accessible
- [ ] No console errors (F12 → Console tab)

---

## Resources

**WordPress Documentation:**
- Block Theme Handbook: https://developer.wordpress.org/themes/block-themes/
- theme.json Reference: https://developer.wordpress.org/themes/advanced-topics/theme-json/

**Your Documentation:**
- Step-by-step guides in `/docs/` folder
- Theme README in `/wordpress-theme/README.txt`

**Design Reference:**
- React prototype in this project (for visual reference)
- Design tokens documented in theme.json

---

## Getting Help

**If something doesn't work:**

1. Check the relevant step guide in `/docs/`
2. Verify file structure matches the guide
3. Look for typos in filenames or code
4. Check WordPress error log (wp-content/debug.log)
5. Test with a default WordPress theme (to rule out conflicts)

**Common issues documented in:**
- Each step guide has a "Common Issues" section
- Check Step 6 for advanced troubleshooting

---

## What's Next?

Once basic setup is complete:

1. **Add Content** - Create projects, about page, etc.
2. **Add Patterns** - Follow Step 4 to create reusable blocks
3. **Customize Design** - Tweak colors, fonts, spacing in theme.json
4. **Add Features** - Follow Step 6 for custom post types, forms, etc.
5. **Optimize** - Add caching, image optimization
6. **Launch** - Deploy to production!

---

Your WordPress theme is ready to go! 🚀

Start with the Quick Content Addition path above, then explore the detailed guides as needed.
