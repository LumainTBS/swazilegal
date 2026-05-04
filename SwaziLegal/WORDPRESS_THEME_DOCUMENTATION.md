# SwaziLegal WordPress Theme - Complete Documentation

**Theme Version:** 1.0.20  
**Author:** Malumane Thembumenzi S  
**Last Updated:** April 20, 2026  
**Deployment Status:** ✅ Ready for Production

---

## Table of Contents

1. [Theme Overview](#theme-overview)
2. [Installation & Setup](#installation--setup)
3. [File Structure](#file-structure)
4. [Key Features](#key-features)
5. [Customization Guide](#customization-guide)
6. [Content Management](#content-management)
7. [JavaScript Functionality](#javascript-functionality)
8. [CSS & Styling](#css--styling)
9. [Page Templates](#page-templates)
10. [Troubleshooting](#troubleshooting)
11. [Deployment Checklist](#deployment-checklist)

---

## Theme Overview

**SwaziLegal Premium** is a modern, professional legal services WordPress theme built with:

- **Design Pattern:** Glassmorphism with modern UI/UX principles
- **Framework:** Vanilla HTML/CSS/JavaScript (no dependencies)
- **Compatibility:** WordPress 5.0+, Elementor-ready
- **Performance:** Optimized for speed, CDN-ready
- **Responsive:** Mobile-first design, works on all devices
- **Accessibility:** WCAG 2.1 compliant

### Design Features

✅ **Glassmorphism UI** - Frosted glass effect cards and panels  
✅ **Dark Overlays** - Hero sections with darkened background images  
✅ **Smooth Animations** - Text reveal, card scale, scroll animations  
✅ **Icon-Free Navigation** - Clean, text-only menu items  
✅ **Testimonial Carousel** - Auto-rotating client testimonials with manual controls  
✅ **Premium Glass Cards** - Consistent styling across all card elements  
✅ **Hero Sections** - Full-width image backgrounds with content overlay  
✅ **Parallax Effects** - Subtle floating animations on cards  

---

## Installation & Setup

### 1. **Upload Theme to WordPress**

```bash
# Copy the swazilegal-theme folder to WordPress themes directory
cp -r swazilegal-theme /var/www/html/wp-content/themes/

# OR upload via WordPress Admin Dashboard
# Dashboard → Appearance → Themes → Upload Theme
```

### 2. **Activate the Theme**

```
WordPress Admin Dashboard → Appearance → Themes → SwaziLegal Premium → Activate
```

### 3. **Install Required Plugins** (Optional but Recommended)

- **Elementor Page Builder** - For advanced page editing
- **WP Super Cache** - For performance optimization
- **Yoast SEO** - For search engine optimization
- **Contact Form 7** - For advanced contact forms

### 4. **Configure Theme Settings**

```
Dashboard → Appearance → Customize
```

Configure:
- Site Title & Logo
- Header Image
- Primary Menu
- Footer Text
- Color Scheme (if applicable)

### 5. **Set Up Content**

```
Dashboard → Posts/Pages → Add New
```

Create pages for:
- Homepage (Front Page)
- About Us
- Practice Areas
- Services
- Our Team
- Contact
- Privacy Policy

---

## File Structure

```
swazilegal-theme/
├── css/
│   └── style.css              # All main styling (54.7 KB)
├── js/
│   ├── main.js               # Core functionality (37.3 KB)
│   └── scroll-animations.js   # Animation logic (7.98 KB)
├── data/
│   ├── content.json          # Dynamic content (7.85 KB)
│   └── README.md             # Data format guide
├── images/
│   ├── hero/                 # Hero section images
│   ├── about/                # About page images
│   ├── team/                 # Team member photos
│   ├── practices/            # Practice area images
│   └── testimonials/         # Client testimonial images
├── header.php                # Header template
├── footer.php                # Footer template
├── front-page.php            # Homepage template
├── page-about.php            # About page template
├── page-practices.php        # Practice areas template
├── page-services.php         # Services template
├── page-team.php             # Team page template
├── page-contact.php          # Contact page template
├── index.php                 # Fallback template
├── template-canvas.php       # Full-width canvas template
├── functions.php             # Theme functions & hooks
├── style.css                 # Theme header (info only)
├── screenshot.png            # Theme preview image
└── README.md                 # Theme readme
```

---

## Key Features

### 1. **Responsive Layout**

- **Desktop:** Full 3-column grids, full-sized carousels
- **Tablet (768px+):** 2-column layouts, 2-slide carousel
- **Mobile (<768px):** 1-column layout, single-slide carousel
- **Small Mobile (<480px):** Optimized single-column layout

**Breakpoints:**
```css
Mobile First: 480px, 768px, 992px, 1200px+
```

### 2. **Navigation Menu**

**Header Navigation:**
- Text-only menu items (icons removed)
- Sticky header with glassmorphism
- Responsive mobile-friendly design
- Fallback menu in `header.php` with 6 main items

```php
// Menu items in header.php:
- Home
- About
- Practice Areas
- Services
- Our Team
- Contact
```

### 3. **Hero Sections**

**Features:**
- Full viewport height (100vh) on homepage
- 40vh on secondary pages
- Background images with dark overlay
- Dark grey overlay: `rgba(40, 40, 50, 0.55)`
- Text shadow for readability
- Floating cards with animation

**HTML Structure:**
```html
<section class="hero" style="background-image: url(...);">
  <div class="hero-content">
    <h1>Title</h1>
    <p>Subtitle</p>
    <div class="hero-cta">
      <a href="#" class="btn btn-primary">CTA</a>
    </div>
  </div>
  <div class="hero-gradient-bottom"></div>
</section>
```

### 4. **Testimonial Carousel**

**Features:**
- Responsive slides (1/2/3 per view)
- Auto-rotates every 5 seconds
- Previous/Next navigation buttons
- Dot indicators with active state
- Pauses on hover
- Smooth cubic-bezier transitions

**Data Source:**
- Loads from `content.json` (6 testimonials included)
- Each testimonial has: client name, company, rating, text, avatar

**Files:**
- HTML: `index.html` (static) or `front-page.php` (WordPress)
- CSS: Lines 2400-2550 in `css/style.css`
- JS: `initTestimonialCarousel()` in `js/main.js`

### 5. **Content Loading (JSON)**

**Dynamic Content Source:**
```
data/content.json
```

**Structure:**
```json
{
  "firm": { name, phone, email, ... },
  "team": [ { id, name, title, specialty, image, ... } ],
  "practices": [ { id, name, description, services, ... } ],
  "testimonials": [ { id, client, company, text, rating, avatar } ],
  "faqs": [ { id, question, answer } ]
}
```

**Loading Method:**
1. HTML/PHP renders page structure
2. JavaScript loads `content.json` via fetch
3. Dynamically populates sections using template literals
4. Fallback to hardcoded data if JSON fails

**WordPress Path:**
```php
// In functions.php - JavaScript receives:
wpData.jsonPath = '/wp-content/themes/swazilegal-theme/data/content.json'
```

### 6. **Button Styles**

**Primary Button:**
```html
<a href="#" class="btn btn-primary">Schedule Consultation</a>
```
- Gradient background (blue to light blue)
- White text
- Hover: lifted with enhanced shadow

**Secondary Button:**
```html
<a href="#" class="btn btn-secondary">Contact Us</a>
```
- White background
- Blue text & border
- Hover: inverts to blue background with white text

**Outlined Button:**
```html
<a href="#" class="btn btn-outlined">Learn More</a>
```
- Transparent background
- White border & text
- Hover: white background with blue text

### 7. **Scroll Animations**

**Features:**
- Intersection Observer API (no jQuery)
- Fade-in + scale effect on scroll
- Staggered delays (0.08s per item)
- Applies to: team cards, practice cards, service cards

**CSS Animation:**
```css
@keyframes cardScaleIn {
  from { opacity: 0; transform: translateY(40px) scale(0.95); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}
```

**Applied to:**
- `.masonry-item.animate-on-scroll` (team, practices, services)
- Delay: index * 0.08s

---

## Customization Guide

### 1. **Colors**

**Primary Colors** (defined in `:root`):

```css
--primary-dark: #0f1419;          /* Dark backgrounds */
--primary-blue: #0d47a1;          /* Main accent blue */
--secondary-blue: #1565c0;        /* Lighter blue */
--accent-gold: #d4af37;           /* Gold highlights */
--accent-light-blue: #2196f3;     /* Light blue */
--white: #ffffff;
--white-off: #f8f9fa;
--gray-dark: #4a5568;             /* Body text */
--gray-medium: #d0dae8;           /* Borders */
--gray-light: #e8eef5;            /* Light backgrounds */
```

**How to Change:**
1. Edit `css/style.css` lines 8-23
2. Update color hex values
3. Clear WordPress cache
4. Refresh frontend

### 2. **Fonts**

**Current Typography:**

```css
--font-primary: 'Georgia', 'Garamond', serif;      /* Headings */
--font-secondary: 'Segoe UI', 'Roboto', sans-serif; /* Body text */
--font-size-base: 16px;
--line-height-base: 1.6;
```

**To Change:**
1. Edit `css/style.css` lines 32-35
2. Import custom fonts (Google Fonts, Typekit)
3. Update font-family in CSS variables
4. Test responsive sizing

### 3. **Spacing**

**Spacing Scale** (edit in `:root`):

```css
--spacing-xs: 0.5rem;   /* 8px */
--spacing-sm: 1rem;     /* 16px */
--spacing-md: 1.5rem;   /* 24px */
--spacing-lg: 2rem;     /* 32px */
--spacing-xl: 3rem;     /* 48px */
--spacing-2xl: 4rem;    /* 64px */
```

### 4. **Hero Section Overlay**

**Current Dark Overlay:**
```css
/* Line 447 in style.css */
background: rgba(40, 40, 50, 0.55);
```

**Customize Overlay:**
- Increase opacity: 0.55 → 0.70 (darker)
- Decrease opacity: 0.55 → 0.40 (lighter)
- Change color: `rgba(40, 40, 50, X)` to any RGB value

### 5. **Carousel Settings**

**Auto-rotation Speed** (line 76 in `js/main.js`):
```javascript
// Change 5000 to your preferred milliseconds
setInterval(() => { ... }, 5000); // 5 seconds
```

**Carousel Indicators:**
- Active indicator: Line 2485 in `style.css`
- Color: `background: var(--primary-blue);`

### 6. **Hero Image**

**Change Hero Background:**

**Static Site:**
```html
<!-- index.html, about.html, etc. -->
<section class="hero" style="background-image: url('images/hero/your-image.jpg');">
```

**WordPress:**
```php
<!-- front-page.php, page-about.php, etc. -->
<section class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero/your-image.jpg');">
```

**Image Requirements:**
- Format: JPG, PNG, WebP
- Size: 1920×1080px minimum (for desktop)
- Optimize: Use compression tools (TinyPNG, ImageOptim)

---

## Content Management

### 1. **Editing Team Members**

**File:** `data/content.json`

```json
{
  "id": 1,
  "name": "John Doe",
  "title": "Senior Partner",
  "specialty": "Corporate Law",
  "bio": "15+ years of experience...",
  "email": "john@example.com",
  "image": "images/team/john.jpg"
}
```

**Add New Member:**
1. Open `data/content.json`
2. Add new object to `"team"` array
3. Save file
4. Refresh page (JS reloads JSON)

### 2. **Editing Practice Areas**

**File:** `data/content.json` → `practices` array

```json
{
  "id": 1,
  "name": "Corporate Law",
  "description": "Expert guidance on business contracts...",
  "icon": "🏢",
  "faIcon": "fas fa-building",
  "image": "images/practices/corporate.jpg",
  "services": ["Contract Drafting", "M&A", ...]
}
```

### 3. **Editing Testimonials**

**File:** `data/content.json` → `testimonials` array

```json
{
  "id": 1,
  "client": "Jane Smith",
  "company": "ABC Corporation",
  "text": "Exceptional legal services...",
  "rating": 5,
  "avatar": "https://randomuser.me/api/portraits/women/1.jpg"
}
```

**Avatar Sources:**
- RandomUser API: `https://randomuser.me/api/portraits/{gender}/{number}.jpg`
- Local images: `images/testimonials/client-name.jpg`
- Gravatar: `https://gravatar.com/avatar/{email-hash}`

### 4. **Editing FAQs**

**File:** `data/content.json` → `faqs` array

```json
{
  "id": 1,
  "question": "How do I schedule a consultation?",
  "answer": "You can call us at +268 76 805 805 or fill out our contact form..."
}
```

### 5. **Firm Information**

**File:** `data/content.json` → `firm` object

```json
{
  "name": "SwaziLegal",
  "tagline": "Excellence in Legal Services",
  "phone": "+268 2687 8132527",
  "whatsapp": "26878132527",
  "email": "info@swazilegal.sz",
  "address": "Mbabane, Eswatini",
  "established": 2015
}
```

---

## JavaScript Functionality

### 1. **Main Script Structure** (`js/main.js`)

```javascript
// 1. Load JSON content
async function loadContent() { ... }

// 2. Render pages based on content
function renderPageContent() { ... }

// 3. Render specific pages
function renderHomePage() { ... }
function renderTeamPage() { ... }
function renderPracticesPage() { ... }
function renderServicesPage() { ... }

// 4. Initialize carousel
function initTestimonialCarousel() { ... }

// 5. Scroll animations
function initCardScrollAnimations() { ... }

// 6. Form handling
function setupForms() { ... }
```

### 2. **Testimonial Carousel** 

**Key Functions:**

```javascript
// Initialize carousel on page load
initTestimonialCarousel() {
  // Get slides and setup indicators
  // Update carousel on button clicks
  // Auto-rotate every 5 seconds
  // Pause on hover
}

// Update carousel position
function updateCarousel() {
  // Calculate items per view
  // Translate carousel track
  // Update active indicator
}

// Navigate carousel
function goToPrevious() { ... }
function goToNext() { ... }
```

### 3. **Scroll Animations**

**Intersection Observer Setup:**

```javascript
function initCardScrollAnimations() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        // Add staggered delay
        entry.target.style.animationDelay = `${index * 0.08}s`;
        entry.target.classList.add('animated');
        observer.unobserve(entry.target);
      }
    });
  });
  
  // Observe all cards
  document.querySelectorAll('.animate-on-scroll').forEach(card => {
    observer.observe(card);
  });
}
```

### 4. **JSON Content Loading**

**Fallback System:**

```javascript
async function loadContent() {
  // 1. Use hardcoded fallback data immediately
  contentData = { /* hardcoded data */ };
  renderPageContent();
  
  // 2. Try to fetch fresh JSON
  try {
    const response = await fetch('data/content.json');
    if (response.ok) {
      const freshData = await response.json();
      contentData = { ...contentData, ...freshData };
      renderPageContent(); // Re-render with fresh data
    }
  } catch (error) {
    console.warn('Using fallback content...');
  }
}
```

**Why This Matters:**
- Users see content immediately (no blank screen)
- Works offline with fallback data
- Updates dynamically when JSON loads
- No external dependencies required

---

## CSS & Styling

### 1. **CSS File Organization**

**Location:** `css/style.css` (54.7 KB)

**Sections:**
1. **CSS Variables** (lines 1-60) - Color, spacing, effects
2. **Reset & Base** (lines 60-150) - Global styles
3. **Typography** (lines 150-250) - Headings, text
4. **Buttons** (lines 255-330) - All button styles
5. **Header & Navigation** (lines 330-410) - Header styling
6. **Hero Section** (lines 418-550) - Hero styles, overlay
7. **Grid Layouts** (lines 650-750) - CSS Grid system
8. **Cards** (lines 750-1200) - Card components
9. **Testimonial Carousel** (lines 2400-2550) - Carousel styling
10. **Responsive** (lines 2550-2600) - Media queries

### 2. **Glassmorphism Effect**

**Base Glass Style:**
```css
.glass {
  background: rgba(255, 255, 255, 0.12);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.25);
  border-radius: 12px;
  box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
}
```

**Premium Glass** (used everywhere):
```css
.premium-glass {
  background: rgba(255, 255, 255, 0.4);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.8);
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
}

.premium-glass:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}
```

### 3. **Responsive Media Queries**

**Breakpoints:**

```css
/* Tablet and above */
@media (min-width: 768px) {
  /* 2-column layouts */
  /* Larger text */
  /* Enhanced spacing */
}

/* Large desktop */
@media (min-width: 1024px) {
  /* 3-column layouts */
  /* Full hero height */
  /* Max spacing */
}

/* Mobile phones */
@media (max-width: 768px) {
  /* 1-column layout */
  /* Smaller text */
  /* Reduced spacing */
}

/* Small phones */
@media (max-width: 480px) {
  /* Minimal spacing */
  /* Stack everything */
  /* Touch-friendly sizing */
}
```

### 4. **Animation Keyframes**

**Text Reveal:**
```css
@keyframes textReveal {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.text-reveal {
  animation: textReveal 0.8s ease-out forwards;
}
```

**Card Scale In:**
```css
@keyframes cardScaleIn {
  from {
    opacity: 0;
    transform: translateY(40px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

.masonry-item.animate-on-scroll {
  animation: cardScaleIn 0.6s forwards;
}
```

---

## Page Templates

### 1. **front-page.php** (Homepage)

**Key Sections:**
- Hero section with CTA buttons
- Overlapping feature cards
- Practice areas preview (3 cards)
- Testimonials carousel
- Services grid
- Final CTA section

**Page ID:** `#hero`
**Dynamic Elements:** Team preview, practices, testimonials, services

### 2. **page-about.php** (About Page)

**Sections:**
- Hero section
- Firm history with timeline
- Mission, vision, values (3-column)
- Team preview
- Contact CTA

**Content Source:** `content.json` → firm object

### 3. **page-practices.php** (Practice Areas)

**Sections:**
- Hero section
- Full practices list (grid)
- Detailed practice areas
- FAQs accordion
- Contact CTA

**Content Source:** `content.json` → practices array

### 4. **page-services.php** (Services)

**Sections:**
- Hero section
- Services grid (masonry)
- WhatsApp booking form
- Appointment status tracker

**Features:**
- Form validation
- WhatsApp integration
- Appointment tracking

### 5. **page-team.php** (Team)

**Sections:**
- Hero section
- Team member cards (masonry grid)
- Credentials section
- Team contact CTA

**Card Features:**
- Avatar images
- Hover animations
- Click to view details (modal)
- Social media links

### 6. **page-contact.php** (Contact)

**Sections:**
- Hero section
- Contact info + contact form (2-column)
- Map integration
- FAQ section
- Email signup

**Contact Methods:**
- Phone
- WhatsApp
- Email
- Contact form

### 7. **header.php**

**Contains:**
- DOCTYPE, meta tags, wp_head()
- Header container with logo
- Navigation menu (primary)
- Fallback menu (6 items, no icons)
- wp_body_open()

### 8. **footer.php**

**Contains:**
- Footer grid (company info, services, contact, legal)
- Copyright info
- Logo display
- Social media links
- Newsletter signup
- wp_footer()

### 9. **index.php** (Fallback)

**Used When:**
- No specific page template exists
- Blog posts, archives, etc.
- Error pages (404, etc.)

**Minimal Template:**
```php
<?php get_header(); ?>
<main id="primary" class="site-main">
  <!-- Post/Archive content -->
</main>
<?php get_footer(); ?>
```

---

## Troubleshooting

### Problem: JSON Content Not Loading

**Symptoms:** Page shows hardcoded fallback data instead of fresh content

**Solutions:**

1. **Check JSON Path:**
   ```php
   // In functions.php, verify:
   wp_localize_script( 'swazilegal-main-js', 'wpData', array(
       'jsonPath' => get_template_directory_uri() . '/data/content.json'
   ) );
   ```

2. **Verify File Location:**
   ```
   /wp-content/themes/swazilegal-theme/data/content.json
   ```

3. **Check JSON Syntax:**
   - Use JSONLint.com to validate JSON
   - Fix any syntax errors
   - Ensure proper UTF-8 encoding

4. **Browser Console:**
   - Open DevTools (F12)
   - Check Console tab for fetch errors
   - Check Network tab for 404 errors

5. **CORS Issues:**
   - If loading from different domain, enable CORS headers
   - Contact hosting provider for assistance

### Problem: Hero Overlay Too Dark/Light

**Solution:** Adjust opacity in `css/style.css`

```css
/* Line 447 */
.hero[style*="background-image"]::before {
  background: rgba(40, 40, 50, 0.55); /* Change 0.55 */
}

/* Lighter: 0.40 */
/* Darker: 0.70 */
```

### Problem: Carousel Not Rotating

**Symptoms:** Testimonials don't auto-rotate

**Solutions:**

1. **Check JavaScript Console:**
   - DevTools → Console
   - Look for errors in `main.js`

2. **Verify Carousel HTML:**
   ```html
   <!-- Must exist in page -->
   <div id="testimonials-carousel">
     <div class="carousel-track" id="carousel-track">
     <button id="carousel-prev">
     <button id="carousel-next">
     <div id="carousel-indicators">
   </div>
   ```

3. **Check Browser Support:**
   - Carousel requires modern browser (ES6+)
   - Test in Chrome, Firefox, Safari, Edge

4. **Verify Content:**
   - Check `content.json` has testimonials array
   - Ensure `testimonials` array is not empty

### Problem: Buttons Not Clickable

**Symptoms:** Hero buttons appear but don't respond to clicks

**Solutions:**

1. **Check Z-Index:**
   ```css
   /* Hero button styling should have: */
   .hero-cta {
     z-index: 3;      /* Higher than overlay */
     pointer-events: auto;
   }
   ```

2. **Clear Cache:**
   - WordPress: wp-admin → Settings → Cache → Clear
   - Browser: Ctrl+Shift+Delete → Clear Browser Cache

3. **Check Button HTML:**
   ```html
   <!-- Buttons must be proper links or form buttons -->
   <a href="..." class="btn btn-primary">Text</a>
   <!-- Not divs styled as buttons -->
   ```

### Problem: Images Not Loading

**Symptoms:** Images appear as broken image icons

**Solutions:**

1. **Check Image Path:**
   - Static site: `images/team/name.jpg` (relative path)
   - WordPress: Use `<?php echo get_template_directory_uri(); ?>` prefix

2. **Verify File Exists:**
   ```
   /wp-content/themes/swazilegal-theme/images/team/file.jpg
   ```

3. **Check Permissions:**
   - Images folder must be readable (755 permissions)
   - Contact hosting provider if needed

4. **Optimize Images:**
   - Use TinyPNG to compress
   - Preferred format: JPG (no transparency), WebP (modern)
   - Size: 1920×1080px minimum for hero

### Problem: Mobile Menu Unresponsive

**Symptoms:** Menu doesn't collapse or work on mobile

**Solutions:**

1. **Check Viewport Meta Tag:**
   ```html
   <!-- Must exist in header.php -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   ```

2. **Test Responsive Design:**
   - DevTools → Toggle device toolbar (F12)
   - Test on actual mobile device
   - Check network tab for blocking scripts

3. **Check Media Queries:**
   ```css
   /* Mobile styles at end of css/style.css */
   @media (max-width: 768px) {
     nav ul {
       flex-direction: column;
     }
   }
   ```

### Problem: Carousel Looks Bad on Mobile

**Symptoms:** Carousel overcrowded, buttons overlapping

**Solutions:**

1. **Check Responsive Slide Sizing:**
   ```css
   /* In css/style.css around line 2315 */
   .testimonial-slide {
     flex: 0 0 100%;  /* Mobile: 1 slide */
   }
   
   @media (min-width: 768px) {
     flex: 0 0 calc(50% - 1.25rem);  /* Tablet: 2 slides */
   }
   
   @media (min-width: 1024px) {
     flex: 0 0 calc(33.333% - 1.667rem);  /* Desktop: 3 slides */
   }
   ```

2. **Adjust Button Spacing:**
   ```css
   .carousel-btn {
     width: 50px;
     height: 50px;
   }
   
   /* Reduce on mobile if needed */
   @media (max-width: 480px) {
     .carousel-btn {
       width: 40px;
       height: 40px;
     }
   }
   ```

---

## Deployment Checklist

### Pre-Deployment

- [ ] Test all pages on desktop, tablet, mobile
- [ ] Validate HTML (W3C validator)
- [ ] Check CSS for errors (CSSLint)
- [ ] Test all interactive elements (buttons, forms, carousel)
- [ ] Verify all images load correctly
- [ ] Check JSON file is valid (JSONLint)
- [ ] Test on multiple browsers (Chrome, Firefox, Safari, Edge)
- [ ] Performance test (Google PageSpeed Insights)
- [ ] Test contact forms submission
- [ ] Verify all links work (internal & external)
- [ ] Check SEO (title tags, meta descriptions, structured data)

### During Deployment

1. **Backup Current Site:**
   ```bash
   # Backup WordPress database and files
   mysqldump -u user -p database > backup.sql
   ```

2. **Upload Theme:**
   ```bash
   # FTP/SFTP to: /wp-content/themes/swazilegal-theme/
   # OR upload via WordPress admin
   ```

3. **Activate Theme:**
   ```
   Dashboard → Appearance → Themes → SwaziLegal Premium → Activate
   ```

4. **Set Homepage:**
   ```
   Dashboard → Settings → Reading → Front Page → Select "Front Page"
   ```

5. **Verify Assets Load:**
   - Check CSS loads (page source)
   - Check JS loads (DevTools)
   - Check images display

### Post-Deployment

- [ ] Test all functionality again on live site
- [ ] Check performance metrics (PageSpeed, GTmetrix)
- [ ] Test forms send emails correctly
- [ ] Verify WhatsApp integration works
- [ ] Check mobile responsiveness
- [ ] Test backup/restore process
- [ ] Monitor error logs
- [ ] Update website monitoring (Uptime Robot, etc.)
- [ ] Announce site launch to team
- [ ] Set up regular backups (daily/weekly)
- [ ] Plan security updates (WordPress, plugins, theme)

### Performance Optimization

**Enable Caching:**
```
Dashboard → Settings → WP Super Cache → Enable Caching
```

**Optimize Images:**
- Use WebP format where possible
- Compress all images (<100KB each)
- Use CDN for asset delivery

**Minify CSS/JS:**
- Use WP Minify plugin
- Or minify manually and upload

**Defer JavaScript:**
```php
// In functions.php, add defer to script tags
wp_enqueue_script( 'swazilegal-main-js', ..., ['defer' => true] );
```

---

## Support & Maintenance

### Regular Maintenance Tasks

**Monthly:**
- Check WordPress updates
- Review error logs
- Test backup restoration
- Verify all forms working

**Quarterly:**
- Security audit
- Performance review
- Content audit
- Broken link check

**Annually:**
- Full security assessment
- Performance optimization review
- Design refresh evaluation
- Accessibility audit (WCAG 2.1)

### Update Procedures

**WordPress Core Update:**
```
Dashboard → Updates → WordPress → Update
```

**Theme Update:**
1. Backup site (database + files)
2. Upload new theme version to `/wp-content/themes/`
3. Test on staging first
4. Deploy to production

**CSS/JS Changes:**
1. Edit in `/css/style.css` or `/js/main.js`
2. Clear WordPress cache
3. Clear browser cache (Ctrl+Shift+Delete)
4. Test thoroughly

### Contact Information

**Theme Author:** Malumane Thembumenzi S  
**Support:** [Your Support Email]  
**Documentation:** This file  
**Repository:** [Your GitHub/Repo URL]  

---

## Credits & License

**Theme License:** GNU General Public License v2 or later

**Third-Party Resources:**
- **Font Awesome 6.4.0** - Icon library (CDN)
- **CSS Grid & Flexbox** - Modern CSS layouts
- **Intersection Observer API** - Scroll animations

**Fonts:**
- Georgia & Garamond (serif, system fonts)
- Segoe UI & Roboto (sans-serif, system fonts)

---

## Changelog

### Version 1.0.20 (April 20, 2026)

**Features Added:**
- ✅ Glassmorphism UI with premium cards
- ✅ Responsive carousel with auto-rotation
- ✅ Dark hero overlays (all pages)
- ✅ Smooth scroll animations
- ✅ Icon-free navigation
- ✅ JSON-driven dynamic content
- ✅ WhatsApp booking integration
- ✅ Appointment tracking system
- ✅ Full WordPress integration

**Bug Fixes:**
- ✅ Fixed hero button z-index
- ✅ Added pointer-events for interactive elements
- ✅ Removed navigation icons
- ✅ Optimized carousel performance

**Documentation:**
- ✅ Complete WordPress integration guide
- ✅ Customization instructions
- ✅ Troubleshooting guide
- ✅ Deployment checklist

---

## Final Notes

This WordPress theme is production-ready and fully documented. All files are synchronized between the static HTML version and the WordPress version. For questions or support, refer to the appropriate section of this documentation.

**Happy Deploying! 🚀**
