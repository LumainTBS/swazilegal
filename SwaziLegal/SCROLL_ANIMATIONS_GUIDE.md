# SwaziLegal - Scroll Animations Documentation

## Overview

The `js/scroll-animations.js` file provides a comprehensive animation system for the SwaziLegal website, enabling smooth, performance-optimized scroll interactions.

---

## Animation Types

### 1. Text Reveal Animation

**Purpose**: Animate text elements in from bottom-left on scroll/page load

**How It Works**:
- Targets all elements with `.text-reveal` class
- Triggers when element enters viewport (10% threshold)
- Uses CSS keyframe `textReveal` (0.8s ease-out)
- Applies staggered delays for sequential animation

**Usage in HTML**:
```html
<h1 class="text-reveal">Your Heading Here</h1>
<p class="text-reveal">Your subtitle here</p>
```

**CSS Keyframe**:
```css
@keyframes textReveal {
  0% { 
    opacity: 0; 
    transform: translateY(30px); 
  }
  100% { 
    opacity: 1; 
    transform: translateY(0); 
  }
}
```

**Performance Notes**:
- Uses Intersection Observer (efficient scroll detection)
- Unobserves elements after animation to free memory
- Supports fallback for older browsers

---

### 2. Parallax Scrolling

**Purpose**: Create subtle depth effect with background movement

**How It Works**:
- Targets `.hero` section background
- Moves background position on scroll
- Speed controlled by `parallaxSpeed` variable (0.5)
- Only applies when hero is visible (optimization)

**CSS Requirements**:
```css
.hero {
  background-attachment: fixed;  /* Required for parallax */
  background-position: center center;
}
```

**JavaScript Control**:
```javascript
const parallaxSpeed = 0.5; // Adjust for more/less effect
// Higher = more movement (1.0 = max)
// Lower = less movement (0.0 = none)
```

**Visual Effect**:
- At scroll speed 1.0x, background moves at 0.5x → creates depth
- Slower than viewport = appears to move backward
- Creates "flying over" effect

---

### 3. Sticky Section Banners

**Purpose**: Create persistent section headers that stick to top while scrolling

**How It Works**:
- Targets `.section-banner` elements
- Uses sticky positioning with Intersection Observer
- 80px top offset (adjust for header height)
- Opacity transitions (0.95 when sticky)

**Usage in HTML**:
```html
<section>
    <div class="section-banner">
        <h3><i class="fas fa-star"></i> Section Title</h3>
        <p>Brief description</p>
    </div>
    <!-- Section content below -->
</section>
```

**CSS**:
```css
.section-banner {
    position: relative;  /* Normal flow initially */
}

/* JavaScript applies: */
.section-banner {
    position: sticky;
    top: 80px;
    opacity: 0.95;
}
```

---

### 4. Counter Animation (Statistics)

**Purpose**: Animate numbers counting from 0 to target value

**How It Works**:
- Targets `.stat-number` elements
- Triggers when element scrolls into view (50% threshold)
- Counts incrementally over 1 second
- Runs only once per element (tracked with `.counted` class)

**Usage in HTML**:
```html
<div class="stat-item">
    <span class="stat-number">150</span>
    <span class="stat-label">Successful Cases</span>
</div>
```

**Output Format**:
- Replaces content with integer + "+"
- Example: "150+" displayed after animation

**Performance Notes**:
- 16ms intervals for 60fps
- Proper integer conversion
- Unobserves after completion

---

### 5. Button Hover Effects

**Purpose**: Add interactive elevation and shadow on hover

**How It Works**:
- Targets all `.btn` elements
- Applies on mouseenter/leave
- Smooth CSS transitions
- `translateY(-2px)` elevation

**Effects**:
```css
/* Normal state maintained in CSS */
.btn {
    transition: all 0.3s ease;
}

/* JavaScript applies on hover: */
transform: translateY(-2px);
box-shadow: 0 10px 25px rgba(13, 71, 161, 0.2);
```

**Usage Notes**:
- No HTML changes needed
- Auto-applies to all buttons
- Works with or without icons

---

### 6. Card Fade-in Animation

**Purpose**: Animate cards sliding up and fading in on scroll

**How It Works**:
- Targets `.glass`, `.practice-card`, `.card-glass` classes
- Triggers at 10% visibility
- Uses `fadeInUp` animation (0.6s ease-out)
- Staggered delays per card

**CSS Keyframe**:
```css
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
```

**Initial State**:
```javascript
// JavaScript sets initial opacity to 0
card.style.opacity = '0';
```

**Result**:
- Cards appear to slide up from below
- Creates engaging entrance effect
- Scales with grid (each row staggered)

---

### 7. Smooth Scroll

**Purpose**: Smooth scrolling for anchor links

**How It Works**:
- Targets `a[href^="#"]` elements
- Prevents default link behavior
- Uses `scrollIntoView({ behavior: 'smooth' })`
- Scrolls to block start

**Usage in HTML** (auto-enabled):
```html
<a href="#practices">Jump to Practices</a>
...
<section id="practices">...</section>
```

**Browser Compatibility**:
- Native support in modern browsers
- Graceful fallback for older browsers

---

## CSS Integration

### Required Animation Keyframes

These must be present in your CSS (or are auto-injected by JavaScript):

```css
@keyframes textReveal {
  0% { opacity: 0; transform: translateY(30px); }
  100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(40px); }
}
```

### CSS Classes Used

| Class | Purpose |
|-------|---------|
| `.text-reveal` | Triggers text reveal animation |
| `.section-banner` | Sticky section header |
| `.stat-number` | Counter animation target |
| `.btn` | Button hover effects |
| `.glass` | Card fade-in animation |
| `.practice-card` | Card fade-in animation |
| `.card-glass` | Card fade-in animation |

---

## Intersection Observer Configuration

### Text Reveal
```javascript
{
    threshold: 0.1,              // Trigger at 10% visible
    rootMargin: '0px 0px -100px 0px'  // Account for viewport bottom
}
```

### Sticky Banners
```javascript
{
    threshold: 0,               // Trigger at exact boundary
    rootMargin: '0px 0px 0px 0px'
}
```

### Counter Animation
```javascript
{
    threshold: 0.5  // Trigger at 50% visible (centered)
}
```

### Card Animation
```javascript
{
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
}
```

---

## Performance Optimization

### Memory Management
1. **Unobserve After Animation**: Elements are unobserved once animation triggers
2. **Reuse Observers**: Single observer handles multiple elements
3. **Conditional Application**: Parallax only runs when hero is visible

### Animation Performance
1. **60fps Target**: 16ms intervals for smooth animations
2. **CSS Transitions**: Hardware-accelerated via CSS
3. **Transform/Opacity Only**: No expensive repaints (position/width changes)

### Browser Compatibility
- Modern browsers: Full feature support
- Older browsers: Graceful fallbacks
- IE11: Limited support (no Intersection Observer)

---

## Configuration & Customization

### Adjust Parallax Speed

```javascript
const parallaxSpeed = 0.5;  // Change this value
// 0.3 = subtle parallax
// 0.5 = moderate parallax (current)
// 0.7 = strong parallax
// 1.0 = very strong parallax
```

### Adjust Animation Duration

```javascript
// Text reveal animation
entry.target.style.animation = 'textReveal 0.8s ease-out forwards';
//                                        ↑ Change duration here

// Counter animation
const duration = 1000;  // milliseconds
```

### Adjust Stagger Delay

```javascript
// Text reveal
entry.target.style.animationDelay = `${index * 0.1}s`;
//                                           ↑ Change multiplier

// Cards
entry.target.style.animationDelay = `${index * 0.1}s`;
```

### Adjust Sticky Banner Top Position

```javascript
banner.style.top = '80px';  // Change based on header height
```

---

## Debugging & Troubleshooting

### Animation Not Triggering
1. **Check Class Names**: Ensure elements have correct classes
2. **Check Viewport**: Element must be in viewport when scrolling
3. **Check Console**: Look for JavaScript errors
4. **Verify CSS**: Keyframe animations must exist

### Parallax Not Working
1. **Check Hero Style**: `.hero` must have `background-attachment: fixed`
2. **Check Background Image**: Hero must have background property set
3. **Check Scroll**: Only works on scroll events

### Performance Issues
1. **Reduce Animations**: Remove some `.text-reveal` classes
2. **Increase Threshold**: Use higher threshold values (0.5 vs 0.1)
3. **Disable Parallax**: Comment out `initParallaxEffect()` call
4. **Monitor Frame Rate**: Use browser DevTools Performance tab

### Browser Compatibility Issues
1. **IE11**: Most features won't work (no Intersection Observer)
2. **Mobile Safari**: Test parallax carefully (may affect performance)
3. **Older Android**: Disable parallax and heavy animations

---

## Integration with Main JavaScript

The scroll animations module loads alongside `main.js`:

```html
<script src="js/main.js"></script>
<script src="js/scroll-animations.js"></script>
```

### DOMContentLoaded Event
```javascript
document.addEventListener('DOMContentLoaded', function() {
    initScrollAnimations();
    initParallaxEffect();
    initStickyBanners();
});

window.addEventListener('load', () => {
    initCounterAnimation();
    initButtonAnimations();
    initCardAnimations();
    initSmoothScroll();
});
```

### Dynamic Content Support
If content is dynamically loaded:
```javascript
// Dispatch custom event
window.dispatchEvent(new Event('contentLoaded'));

// In scroll-animations.js:
window.addEventListener('contentLoaded', () => {
    initScrollAnimations();
    initCounterAnimation();
    initCardAnimations();
});
```

---

## Best Practices

1. **Use Appropriate Classes**
   - `.text-reveal` for headings/important text
   - `.glass` for card elements
   - `.btn` for all buttons

2. **Avoid Animation Overload**
   - Don't animate every element
   - Focus on key interactions
   - Maintain content readability

3. **Test Across Devices**
   - Desktop (test parallax)
   - Tablet (test responsive grid)
   - Mobile (test touch interactions)

4. **Respect User Preferences**
   - Consider adding `prefers-reduced-motion` check
   - Provide static fallback experience

5. **Monitor Performance**
   - Use browser DevTools
   - Check frame rates during animations
   - Optimize for slower devices

---

## Examples

### Full Text Reveal Section
```html
<section>
    <h2 class="text-reveal">Section Title</h2>
    <p class="text-reveal">Section subtitle</p>
    <div class="grid grid-3">
        <div class="glass" style="opacity: 0;">
            <h3>Card Title</h3>
            <p>Card content</p>
        </div>
    </div>
</section>
```

### Hero with Counter Animation
```html
<section class="hero">
    <h1 class="text-reveal">Hero Heading</h1>
    <div class="hero-stats text-reveal">
        <div class="stat-item">
            <span class="stat-number">150</span>
            <span class="stat-label">Cases</span>
        </div>
    </div>
</section>
```

### Sticky Banner Section
```html
<section>
    <div class="section-banner">
        <h3><i class="fas fa-star"></i> Why Choose Us</h3>
        <p>Description</p>
    </div>
    <div class="section-container">
        <!-- Content -->
    </div>
</section>
```

---

## Support & Maintenance

### Future Enhancements
- [ ] Add `prefers-reduced-motion` media query support
- [ ] Implement lazy loading for images
- [ ] Add page transition animations
- [ ] Create custom animation builder

### Browser Testing Checklist
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (desktop & mobile)
- [ ] Edge (latest)
- [ ] Mobile Chrome
- [ ] Mobile Safari

---

**Document Version**: 1.0  
**Last Updated**: Current Session  
**Maintained By**: SwaziLegal Development Team
