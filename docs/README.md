# TC Projects Theme - Implementation Plan

**Project:** Custom WordPress Block Theme from Figma Make Design  
**Developer:** Troy Chaplin  
**Purpose:** Personal portfolio site (projects.troychaplin.ca)  
**Status:** Planning Phase  
**Last Updated:** 2025-11-09

---

## Project Context

### Source Materials
- **Design Documentation:** Complete step-by-step guides in `/docs/` folder (created by Figma Make)
- **Design Reference:** React app format (Figma designs converted to React)
- **Implementation Guides:** 6-step process covering foundation to optional enhancements

### Development Environment
- **Platform:** WordPress Studio (local development)
- **Version Control:** Already connected to GitHub repository
- **Theme Location:** `/wp-content/themes/tc-projects/`
- **Deployment:** Will be deployed to live site after completion

---

## Critical Decisions Made

### 1. Font Loading Strategy
**Decision:** Use WordPress Font Library (Site Editor)  
**Method:** Load fonts via Appearance → Editor → Styles → Typography → Manage Fonts  
**Fonts:**
- Space Grotesk (weights: 400, 500, 600, 700) - Headings
- Roboto Flex (weights: 300, 400, 500) - Body text

**Implementation:** Reference in `theme.json` fontFace array, WordPress handles loading

---

### 2. Content Type for Projects
**Decision:** Use regular WordPress Posts (not Custom Post Type)  
**Rationale:** Simpler implementation, sufficient for personal portfolio  
**Templates:**
- Use `single.html` for individual projects
- Use `archive.html` or `home.html` for projects listing
- Utilize categories/tags for project organization

**Note:** Can migrate to CPT later if needed

---

### 3. Development Workflow
**Setup:** WordPress Studio (local) → GitHub → Production  
**Current Status:** Theme folder structure exists, connected to Git  
**Workflow:**
1. Develop and test locally in WordPress Studio
2. Commit changes to GitHub after each phase
3. Deploy to production when complete

---

### 4. Scope - Phase 1 Only
**Current Focus:** Steps 1-5 (Core theme functionality)  
**Deferred:** Step 6 (Optional Enhancements) - review after core is complete  
**Must-Have Features:**
- Foundation (theme.json, functions.php, custom CSS)
- Header & Footer template parts
- Homepage template with hero and stats
- Block patterns for content sections
- Page templates for standard pages and posts

**Nice-to-Have (Later):**
- Custom Post Type for projects (if needed)
- Advanced animations
- Performance optimizations
- SEO enhancements
- Contact forms

---

### 5. Blocks Strategy
**Approach:** TBD - Need to determine core vs custom blocks  
**Preference:** Use core blocks wherever possible  
**Custom Blocks:** Only where core blocks cannot achieve design requirements

**To Discuss:**
- Featured Project block (7-5 column layout with image) - Custom or Pattern?
- Project grid cards - Query Loop or Custom?
- Skills section - Columns pattern or Custom?
- Stat items with gradient underlines - Custom block style or CSS class?

---

### 6. Content Strategy
**Starting Point:** Build from scratch after theme completion  
**No Migration:** No existing content to import  
**Content Types Needed:**
- Homepage content (hero text, stats)
- About page
- Project posts (with featured images, descriptions, tech stack)
- Navigation menu

---

## Design System Reference

### Color Palette
```
Primary (Emerald):     #10b981
Accent (Teal):         #14b8a6
Background (Dark):     #1a1a1a
Surface (Charcoal):    #262626
Text (White):          #ffffff
Text Muted (Gray):     #9ca3af
```

### Typography
```
Body Font:     Roboto Flex (weight 300)
Heading Font:  Space Grotesk (weights 400-700)

Font Sizes:
- sm:   0.875rem
- base: 1rem
- xl:   1.25rem
- 2xl:  1.5rem
- 3xl:  1.875rem
- 4xl:  2.25rem
- 5xl:  3rem
- 6xl:  3.75rem
- 7xl:  4.5rem (hero text)
```

### Spacing Scale
```
xs:  0.5rem  (8px)
sm:  1rem    (16px)
md:  1.5rem  (24px)
lg:  2rem    (32px)
xl:  3rem    (48px)
2xl: 4rem    (64px)
3xl: 6rem    (96px)
```

### Key Design Features
- Dark theme with emerald green accents
- SVG grid background pattern (subtle, semi-transparent)
- Gradient underlines on stats (emerald to teal)
- Card backgrounds at 70% opacity
- Asymmetric layouts
- Hover effects and transitions
- Clean, modern aesthetic

---

## Implementation Phases

### Phase 1: Foundation (Step 1) ⏳ NOT STARTED
**Priority:** CRITICAL - Must be completed first  
**Estimated Time:** 2-3 hours

**Files to Create/Update:**

1. **`style.css`** ✅ EXISTS (needs expansion)
   - Expand theme metadata
   - Add tags, tested versions, license info

2. **`theme.json`** ❌ EMPTY (critical)
   - Complete color palette
   - Font families and sizes
   - Spacing scale
   - Global styles
   - Element styles (h1-h6, links, buttons)
   - Layout settings

3. **`functions.php`** ❌ EMPTY (critical)
   - Enqueue custom styles
   - Register block pattern category
   - Register custom block styles (gradient-underline, card variants)

4. **`assets/css/custom-styles.css`** ❌ DOESN'T EXIST
   - SVG grid background pattern
   - Gradient underlines
   - Card backgrounds
   - Hover effects
   - Utility classes

**Testing Checkpoint:**
- [ ] Theme activates without errors
- [ ] Dark background (#1a1a1a) visible
- [ ] Fonts load from Font Library
- [ ] Grid background pattern visible
- [ ] No console errors

---

### Phase 2: Template Parts (Step 2) ⏳ NOT STARTED
**Priority:** HIGH  
**Estimated Time:** 1-2 hours

**Files to Create:**

1. **`parts/header.html`** ✅ EXISTS (empty)
   - "Troy Chaplin Portfolio" branding
   - Navigation menu
   - Flex layout (space-between)
   - Responsive mobile menu

2. **`parts/footer.html`** ✅ EXISTS (empty)
   - Copyright with dynamic year
   - Centered layout
   - Subtle top border

**Testing Checkpoint:**
- [ ] Header appears on all pages
- [ ] "Portfolio" text is emerald green
- [ ] Navigation menu works
- [ ] Footer appears on all pages
- [ ] Responsive on mobile

---

### Phase 3: Homepage Template (Step 3) ⏳ NOT STARTED
**Priority:** HIGH  
**Estimated Time:** 2-3 hours

**Files to Create/Update:**

1. **`templates/front-page.html`** ❌ DOESN'T EXIST
   - Hero section with large heading
   - Subtitle text
   - Stats section (3 columns)
   - Gradient underlines on stats
   - Grid background

2. **`templates/index.html`** ✅ EXISTS (empty)
   - Basic fallback template
   - Header, post content, footer

**Testing Checkpoint:**
- [ ] Homepage uses front-page.html
- [ ] Hero text displays correctly
- [ ] Stats show with gradient underlines
- [ ] Grid background visible
- [ ] Responsive layout works

---

### Phase 4: Block Patterns (Step 4) ⏳ NOT STARTED
**Priority:** MEDIUM  
**Estimated Time:** 3-4 hours

**Files to Create:**

1. **`patterns/featured-project.php`** ❌ DOESN'T EXIST
   - 7-5 column layout
   - Image on left, content on right
   - Project details, tech stack
   - CTA button

2. **`patterns/project-grid.php`** ❌ DOESN'T EXIST
   - 3-column grid
   - Card layout with images
   - Hover effects

3. **`patterns/skills-grid.php`** ❌ DOESN'T EXIST
   - 3-column skills display
   - Card backgrounds
   - Emerald headings

**Testing Checkpoint:**
- [ ] Patterns appear in Patterns inserter
- [ ] TC Projects category visible
- [ ] Patterns insert correctly
- [ ] Content is editable after insertion
- [ ] Images can be added/replaced

---

### Phase 5: Page Templates (Step 5) ⏳ NOT STARTED
**Priority:** MEDIUM  
**Estimated Time:** 2-3 hours

**Files to Create:**

1. **`templates/page.html`** ❌ DOESN'T EXIST
   - Standard page template
   - Centered title
   - Wide content area

2. **`templates/single.html`** ❌ DOESN'T EXIST
   - Individual project/post template
   - Featured image
   - Post meta (date, author optional)
   - Content area

3. **`templates/blank.html`** ❌ DOESN'T EXIST
   - Minimal template
   - No header/footer
   - Full-width content

4. **`templates/archive.html`** ❌ DOESN'T EXIST (optional)
   - Projects listing
   - 3-column grid
   - Query loop for posts
   - Pagination

**Testing Checkpoint:**
- [ ] About page uses page.html
- [ ] Individual posts use single.html
- [ ] Blank template available in editor
- [ ] Archive shows all projects
- [ ] Template hierarchy works correctly

---

### Phase 6: Optional Enhancements (Step 6) 🔄 DEFERRED
**Priority:** LOW (for later review)  
**Estimated Time:** TBD

**Potential Features to Review Later:**
- Dynamic copyright year (PHP in footer)
- Custom Post Type for projects (if needed)
- Advanced block styles
- Page transitions and animations
- Performance optimizations
- SEO schema markup
- Contact form pattern
- Analytics integration

**Decision:** Will review and prioritize after Phases 1-5 are complete

---

## Block Strategy Discussion

### Questions to Address:

**1. Featured Project Section**
- **Current Plan:** Pattern in `/patterns/featured-project.php`
- **Question:** Should this be a custom block instead?
- **Considerations:**
  - Pattern = easier to implement, fully editable after insertion
  - Custom block = more control, reusable, can have custom UI
  - Design: 7-5 column layout with single image and content card

**2. Project Grid Cards**
- **Options:**
  - A) Use Query Loop block (core) with custom CSS
  - B) Create custom block for individual project cards
  - C) Use pattern with manual content
- **Question:** Which approach for project listings?

**3. Skills Section**
- **Options:**
  - A) Columns block (core) with Groups for cards
  - B) Custom skills grid block
  - C) Pattern (as currently planned)
- **Question:** Pattern sufficient, or need custom block?

**4. Stat Items with Gradient Underlines**
- **Options:**
  - A) Paragraph with custom CSS class (`.gradient-underline`)
  - B) Custom block style for Paragraph block
  - C) Custom stat block component
- **Question:** Which approach best balances flexibility and design control?

**5. Card Backgrounds and Hover Effects**
- **Current Plan:** CSS utility classes (`.card-bg-charcoal`, `.hover-lift`)
- **Question:** Sufficient, or need custom blocks?

**6. Navigation and Header**
- **Plan:** Use core Navigation block
- **Question:** Any special requirements needing custom implementation?

### Recommendation Needed:
**Should we map out the blocks strategy now, or implement Phases 1-3 first and then evaluate?**

**Pros of Deciding Now:**
- Clear roadmap before coding
- Can plan custom blocks in parallel
- Understand full scope

**Pros of Deciding After Phase 3:**
- See how core blocks work with our design
- Make informed decisions based on real implementation
- Potentially avoid unnecessary custom blocks

---

## File Structure Status

```
tc-projects/
├── _plans/
│   └── README.md ...................... ✅ THIS FILE
├── assets/
│   └── css/ ........................... ❌ EMPTY (needs custom-styles.css)
├── blocks/
│   └── .gitignore ..................... ✅ EXISTS (empty folder ready)
├── docs/ .............................. ✅ COMPLETE (Figma Make guides)
│   ├── README.md
│   ├── WORDPRESS-IMPLEMENTATION-PLAN.md
│   ├── WP-QUICK-START.md
│   ├── WP-STEP-1-FOUNDATION.md
│   ├── WP-STEP-2-HEADER-FOOTER.md
│   ├── WP-STEP-3-HOME-TEMPLATE.md
│   ├── WP-STEP-4-PATTERNS.md
│   ├── WP-STEP-5-PAGE-TEMPLATES.md
│   └── WP-STEP-6-OPTIONAL-ENHANCEMENTS.md
├── parts/
│   ├── footer.html .................... ✅ EXISTS (empty)
│   └── header.html .................... ✅ EXISTS (empty)
├── patterns/ .......................... ❌ EMPTY (needs 3 pattern files)
├── templates/
│   └── index.html ..................... ✅ EXISTS (empty)
├── functions.php ...................... ✅ EXISTS (empty)
├── README.md .......................... ✅ EXISTS
├── style.css .......................... ✅ EXISTS (minimal)
└── theme.json ......................... ✅ EXISTS (empty)
```

**Summary:**
- Structure exists ✅
- Core files empty ❌
- Ready for implementation 🚀

---

## Risk Assessment

### Low Risk
- Foundation implementation (well-documented in guides)
- Template parts (straightforward HTML/block markup)
- Basic page templates (standard WordPress)

### Medium Risk
- Grid background pattern (CSS complexity)
- Gradient underlines (needs testing across browsers)
- Font loading via Font Library (newer WordPress feature)
- Responsive layouts (needs thorough testing)

### High Risk
- None identified at this stage

### Mitigation Strategies
- Test incrementally after each phase
- Use browser DevTools for debugging
- Reference documentation at each step
- Commit to Git after each working milestone
- Test in multiple browsers (Chrome, Firefox, Safari)

---

## Testing Strategy

### After Each Phase
1. Clear WordPress cache
2. Clear browser cache (Cmd+Shift+R)
3. Inspect elements with DevTools
4. Check browser console for errors
5. Test responsive (mobile/tablet/desktop)
6. Verify in Firefox and Safari (not just Chrome)

### Before Moving to Next Phase
- All checkboxes in phase must be ✅
- No console errors
- Visual design matches documentation
- Responsive layouts work correctly

### Final Testing (Before Production)
- [ ] Lighthouse audit (target 90+ all metrics)
- [ ] WAVE accessibility check
- [ ] Cross-browser testing (Chrome, Firefox, Safari)
- [ ] Cross-device testing (phone, tablet, desktop)
- [ ] Link checker (no broken links)
- [ ] Image optimization
- [ ] Performance baseline established

---

## Git Workflow

### Branch Strategy
- `main` - production-ready code
- `develop` - active development
- `feature/*` - individual features (optional for solo dev)

### Commit Strategy
- Commit after each phase completion
- Meaningful commit messages
- Tag releases (v1.0.0, v1.1.0, etc.)

### Suggested Commits
1. "Phase 1: Foundation - theme.json, functions.php, custom CSS"
2. "Phase 2: Template parts - header and footer"
3. "Phase 3: Homepage template with hero and stats"
4. "Phase 4: Block patterns - featured project, grids"
5. "Phase 5: Page templates - page, single, blank, archive"
6. "Phase 6: Optional enhancements" (if implemented)

---

## Next Steps - DECISION NEEDED

### Option A: Discuss Blocks Strategy Now
**Approach:** Map out all core vs custom blocks before starting Phase 1  
**Timeline:** 30-60 min discussion, then start Phase 1  
**Pros:** Complete roadmap, understand full scope  
**Cons:** Might over-plan, decisions may change during implementation

### Option B: Implement Phases 1-3, Then Discuss Blocks
**Approach:** Get foundation working, see how core blocks perform, then decide  
**Timeline:** Start Phase 1 immediately, discuss blocks after Phase 3  
**Pros:** Informed decisions based on real implementation, avoid premature optimization  
**Cons:** Might need to refactor if custom blocks needed

### Recommendation: **Option B**

**Rationale:**
1. Foundation (Phase 1-3) is independent of block decisions
2. Can evaluate core blocks in practice before committing to custom
3. Faster time to visible progress
4. Patterns can always be converted to custom blocks later
5. Theme will be functional sooner for testing

**Proposed Timeline:**
1. **Now:** Start Phase 1 (Foundation) - 2-3 hours
2. **Next:** Phase 2 (Template Parts) - 1-2 hours
3. **Then:** Phase 3 (Homepage) - 2-3 hours
4. **After Phase 3:** Review and decide block strategy for Phase 4

---

## Questions for Immediate Next Steps

1. **Do you agree with Option B (implement foundation first, discuss blocks later)?**

2. **Are you ready to start Phase 1 (Foundation) now?**

3. **Any other decisions or clarifications needed before we begin?**

---

## Notes & References

- All implementation steps documented in `/docs/` folder
- Reference `WP-STEP-*.md` files for detailed code examples
- Design tokens are authoritative (colors, fonts, spacing)
- WordPress Studio provides local development environment
- Theme will be deployed to projects.troychaplin.ca when complete

---

**Status:** Awaiting decision on next steps  
**Ready to Start:** Phase 1 - Foundation  
**Estimated Time to Completion:** 12-15 hours (Phases 1-5)

