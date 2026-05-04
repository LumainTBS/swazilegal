# SwaziLegal - Developer Quick Reference

## Project Structure
```
SwaziLegal/
├── index.html                    ← HOME PAGE (Redesigned)
├── about.html
├── practices.html
├── team.html
├── contact.html
├── privacy.html
├── css/
│   └── style.css                ← Main styles (updated)
├── js/
│   ├── main.js                  ← Core functionality
│   └── scroll-animations.js      ← NEW: Scroll animations
├── data/
│   └── content.json             ← Team, practices, testimonials
├── REDESIGN_SUMMARY.md          ← Session summary
├── SCROLL_ANIMATIONS_GUIDE.md   ← Animation documentation
├── PROJECT_PLAN.md              ← Original requirements
├── README.md
├── WORDPRESS_INTEGRATION.md
└── QUICK_START.md
```

---

## Color Variables (CSS)
```css
--primary-blue: #0d47a1
--secondary-blue: #1565c0
--accent-gold: #d4af37
--white: #ffffff
--white-off: #f8f9fa
--text-dark: #333333
--text-light: #666666
```

---

## Animation Classes to Use

Add these classes to HTML elements to trigger animations:

| Class | Effect | Element |
|-------|--------|---------|
| `.text-reveal` | Text fades in from bottom on scroll | h1, h2, p, span |
| `.section-banner` | Sticky header on scroll | div wrapper |
| `.stat-number` | Counter animation 0→target | span numbers |
| `.glass` | Fade-in-up on scroll | div cards |
| `.practice-card` | Fade-in-up on scroll | div cards |
| `.card-glass` | Fade-in-up on scroll | div cards |

---

## Icon Classes (Font Awesome 6.4.0)

### Commonly Used
```html
<i class="fas fa-gavel"></i>             <!-- Logo -->
<i class="fas fa-calendar-alt"></i>      <!-- Scheduling -->
<i class="fas fa-phone"></i>             <!-- Phone -->
<i class="fas fa-envelope"></i>          <!-- Email -->
<i class="fab fa-whatsapp"></i>          <!-- WhatsApp -->
<i class="fas fa-arrow-right"></i>       <!-- Next/More -->
<i class="fas fa-star"></i>              <!-- Featured -->
<i class="fas fa-users"></i>             <!-- Team -->
```

### Feature Icons (Why Choose Us)
```html
<i class="fas fa-book"></i>              <!-- Experience -->
<i class="fas fa-target"></i>            <!-- Focus -->
<i class="fas fa-certificate"></i>       <!-- Standards -->
<i class="fas fa-bolt"></i>              <!-- Speed -->
<i class="fas fa-lock"></i>              <!-- Security -->
<i class="fas fa-dollar-sign"></i>       <!-- Budget -->
```

### Case Icons (Notable Results)
```html
<i class="fas fa-briefcase"></i>         <!-- Corporate -->
<i class="fas fa-heart"></i>             <!-- Family -->
<i class="fas fa-shield-alt"></i>        <!-- Criminal -->
<i class="fas fa-building"></i>          <!-- Real Estate -->
<i class="fas fa-check-circle"></i>      <!-- Success -->
```

### CDN Link
```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
```

---

## Button Styles

### Primary Button
```html
<a href="#" class="btn btn-primary">
    <i class="fas fa-icon"></i> Button Text
</a>
```

### Secondary Button
```html
<a href="#" class="btn btn-secondary">
    <i class="fas fa-icon"></i> Button Text
</a>
```

### Outlined Button
```html
<a href="#" class="btn btn-outlined">
    <i class="fas fa-icon"></i> Button Text
</a>
```

---

## Common HTML Patterns

### Text Reveal Heading
```html
<h2 class="text-reveal">Your Heading</h2>
<p class="section-subtitle text-reveal">Your subtitle</p>
```

### Statistics Dashboard
```html
<div class="hero-stats text-reveal">
    <div class="stat-item">
        <span class="stat-number">150</span>
        <span class="stat-label">Successful Cases</span>
    </div>
</div>
```

### Feature Card
```html
<div class="glass" style="padding: 2rem;">
    <div style="font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 1rem;">
        <i class="fas fa-icon"></i>
    </div>
    <h4>Card Title</h4>
    <p>Card description</p>
</div>
```

### Sticky Banner Section
```html
<section>
    <div class="section-banner">
        <h3><i class="fas fa-star"></i> Section Title</h3>
        <p>Brief description</p>
    </div>
    <div class="section-container">
        <!-- Content -->
    </div>
</section>
```

### Practice Area Card
```html
<div class="practice-card glass">
    <div class="practice-icon">
        <i class="fas fa-icon"></i>
    </div>
    <div class="practice-header">
        <h3>Practice Area</h3>
    </div>
    <p>Description</p>
    <ul class="services-list">
        <li>Service 1</li>
        <li>Service 2</li>
    </ul>
</div>
```

---

## JavaScript Integration

### Initialize Animations (Auto-runs)
```javascript
// In scroll-animations.js - runs on DOMContentLoaded
initScrollAnimations();
initParallaxEffect();
initStickyBanners();
initCounterAnimation();
initButtonAnimations();
initCardAnimations();
initSmoothScroll();
```

### Dynamic Content
If adding content dynamically, trigger re-initialization:
```javascript
window.dispatchEvent(new Event('contentLoaded'));
```

### Manual Animation Trigger
```javascript
// On a specific element
const element = document.querySelector('.text-reveal');
element.style.animation = 'textReveal 0.8s ease-out forwards';
```

---

## CSS Classes Reference

### Layout
- `.section-container` - Max-width wrapper
- `.grid` - CSS grid container
- `.grid-2`, `.grid-3`, `.grid-4` - 2-4 column grids
- `.section-light` - Light background
- `.section-title` - Title+subtitle wrapper

### Cards & Components
- `.glass` - Glassmorphism card
- `.glass-strong` - Stronger glassmorphism
- `.glass-dark` - Dark glassmorphism
- `.practice-card` - Practice area card
- `.card-glass` - Alternative card class
- `.card-body` - Card content wrapper

### Typography
- `h1`-`h6` - Heading styles
- `.section-title` - Section heading wrapper
- `.section-subtitle` - Subtitle text
- `.text-reveal` - Text animation trigger

### Utilities
- `white-space`, `gap`, `margin`, `padding` - Spacing
- `display: flex`, `display: grid` - Layout
- `background` styles - Colors

---

## Content Data Structure

### content.json
```json
{
  "team": [
    {
      "id": 1,
      "name": "Name",
      "title": "Position",
      "bio": "Biography",
      "email": "email@domain.com",
      "phone": "+268...",
      "expertise": ["Practice1", "Practice2"],
      "icon": "emoji"
    }
  ],
  "practices": [
    {
      "id": 1,
      "name": "Practice Name",
      "icon": "emoji",
      "description": "Description",
      "services": ["Service1", "Service2"]
    }
  ],
  "testimonials": [
    {
      "id": 1,
      "name": "Client Name",
      "title": "Position",
      "text": "Testimonial text",
      "rating": 5
    }
  ]
}
```

---

## Animation Customization

### Parallax Speed
```javascript
// In scroll-animations.js, adjust:
const parallaxSpeed = 0.5;  // 0.3 subtle, 0.7 strong
```

### Animation Duration
```css
@keyframes textReveal {
  /* Duration: change from 0.8s to desired */
  animation: textReveal 0.8s ease-out forwards;
}
```

### Stagger Delay
```javascript
// Multiplier for delay between elements
animationDelay = `${index * 0.1}s`;  // 0.1s between each
```

### Sticky Banner Top
```javascript
banner.style.top = '80px';  // Adjust for header height
```

---

## Performance Tips

1. **Minimize Text Reveal**: Don't add to every element
2. **Lazy Load Images**: For large hero backgrounds
3. **Disable Parallax Mobile**: Optional on touch devices
4. **Monitor FPS**: Use Chrome DevTools Performance tab
5. **Test on Real Devices**: Especially older/slower devices

---

## Debugging

### Check Animation Not Working
1. Verify element has correct class (`.text-reveal`, `.glass`, etc.)
2. Check browser console for errors
3. Verify keyframe animations exist in CSS
4. Check viewport/scroll position

### Check Parallax Not Working
1. Ensure `.hero` has `background-attachment: fixed`
2. Verify `.hero` has `background-image` set
3. Check console for errors
4. Test scroll events with DevTools

### Check Button Hover Not Working
1. Verify element has `.btn` class
2. Check CSS transitions not disabled
3. Test with mouse (not touch) device

---

## Browser Compatibility

| Feature | Chrome | Firefox | Safari | Edge | Mobile |
|---------|--------|---------|--------|------|--------|
| Text Reveal | ✅ | ✅ | ✅ | ✅ | ✅ |
| Parallax | ✅ | ✅ | ⚠️ | ✅ | ⚠️ |
| Sticky | ✅ | ✅ | ✅ | ✅ | ✅ |
| Counter | ✅ | ✅ | ✅ | ✅ | ✅ |
| All Latest | ✅ | ✅ | ✅ | ✅ | ✅ |

---

## Useful Commands

### Live Server (Testing)
```bash
# If using VS Code Live Server extension
Right-click index.html > Open with Live Server

# Or use Python
python -m http.server 8000
# Visit: http://localhost:8000
```

### Check for Errors
```javascript
// Open browser console (F12)
// Look for red errors in console
console.log('Debug message');
```

### Performance Profile
1. Open DevTools (F12)
2. Go to Performance tab
3. Click Record
4. Scroll the page
5. Click Stop, analyze

---

## Quick Modifications

### Change Primary Color
```css
--primary-blue: #new-color;  /* Updates all primary-blue refs */
```

### Disable Animation
```javascript
// In scroll-animations.js, comment out:
// initScrollAnimations();
// initParallaxEffect();
// etc.
```

### Change Hero Background
```css
.hero {
    background: url('path/to/image.jpg') center/cover;
    background-attachment: fixed;
}
```

### Adjust Font Size
```css
h1 {
    font-size: 3.5rem;  /* Currently 4.2rem */
}
```

---

## Files to Modify

When making changes:

| Change | File |
|--------|------|
| Layout changes | `index.html` |
| Color/styles | `css/style.css` |
| Animation behavior | `js/scroll-animations.js` |
| Core functionality | `js/main.js` |
| Team/content data | `data/content.json` |

---

## Testing Checklist

Before deploying:
- [ ] All animations smooth (no jank)
- [ ] Colors have proper contrast
- [ ] Buttons work (hover/click)
- [ ] Forms submit properly
- [ ] Layout responsive (mobile, tablet, desktop)
- [ ] All links work
- [ ] No console errors
- [ ] Load time acceptable

---

## External Resources

- **Font Awesome Icons**: https://fontawesome.com/icons
- **CSS Tricks Grid**: https://css-tricks.com/snippets/css/complete-guide-grid/
- **MDN Animation Guide**: https://developer.mozilla.org/en-US/docs/Web/CSS/animation
- **Intersection Observer API**: https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API

---

**Last Updated**: Current Session  
**Version**: 1.0  
**Status**: ✅ Production Ready
