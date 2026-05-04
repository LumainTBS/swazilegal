# SwaziLegal - Image Support Guide

## Directory Structure

```
SwaziLegal/
├── images/
│   ├── hero/                    ← Hero section background images
│   │   └── courthouse-or-law-office.jpg  (Recommended: 1920x1080 or larger)
│   ├── team/                    ← Team member headshots
│   │   ├── attorney-name-1.jpg
│   │   ├── attorney-name-2.jpg
│   │   └── ...
│   ├── practices/               ← Practice area representative images
│   │   ├── corporate-law.jpg
│   │   ├── family-law.jpg
│   │   ├── criminal-law.jpg
│   │   └── ...
│   ├── testimonials/            ← Client/testimonial avatars
│   │   ├── client-1.jpg
│   │   ├── client-2.jpg
│   │   └── ...
│   └── about/                   ← Office photos, team gatherings
│       ├── office-interior.jpg
│       ├── law-library.jpg
│       ├── team-photo.jpg
│       └── ...
```

---

## Image Specifications

### Hero Background Image
- **Location**: `images/hero/`
- **Recommended Size**: 1920x1080px or larger
- **File Format**: JPG, PNG, or WebP
- **Aspect Ratio**: 16:9 widescreen
- **Purpose**: Full-screen background with text overlay
- **Example**: Courthouse building, law office, legal scales, professional office space

### Team Member Photos
- **Location**: `images/team/`
- **Recommended Size**: 400x400px (square, 1:1 ratio)
- **File Format**: JPG, PNG
- **Aspect Ratio**: 1:1 square
- **Purpose**: Headshots in team section preview and full team page
- **Style**: Professional headshots, business casual or formal attire
- **Requirements**: Clear, well-lit, face centered

### Practice Area Images
- **Location**: `images/practices/`
- **Recommended Size**: 400x300px or larger
- **File Format**: JPG, PNG
- **Aspect Ratio**: 4:3 or 16:9
- **Purpose**: Visual representation of practice areas
- **Examples**: 
  - Corporate Law: Meeting rooms, contracts, business documents
  - Family Law: Mediation rooms, home settings
  - Criminal Law: Courthouse, legal documentation
  - Real Estate: Property documents, buildings

### Testimonial Avatars
- **Location**: `images/testimonials/`
- **Recommended Size**: 120x120px
- **File Format**: JPG, PNG
- **Aspect Ratio**: 1:1 square
- **Purpose**: Small circular profile pictures in testimonials
- **Style**: Professional headshots or professional avatars

### About Page Images
- **Location**: `images/about/`
- **Recommended Size**: 800x600px or larger
- **File Format**: JPG, PNG
- **Aspect Ratio**: Vary (16:9 for wide, 4:3 for standard, 1:1 for portraits)
- **Purpose**: Office interior, team photos, office atmosphere
- **Examples**:
  - Office interior showing professional environment
  - Law library or research area
  - Team photo or gathering
  - Reception area
  - Conference room

---

## JSON Data Structure with Images

### Team Member Structure
```json
{
  "id": 1,
  "name": "John Doe",
  "title": "Senior Attorney",
  "specialty": "Corporate Law",
  "bio": "John brings 15+ years of corporate law experience...",
  "email": "john@swazilegal.sz",
  "phone": "+268 XXXX XXXX",
  "expertise": ["Corporate Law", "M&A"],
  "image": "images/team/john-doe.jpg"  ← Add this
}
```

### Practice Area Structure
```json
{
  "id": 1,
  "name": "Corporate Law",
  "icon": "💼",
  "faIcon": "fas fa-briefcase",         ← Font Awesome fallback
  "description": "Comprehensive corporate legal services...",
  "image": "images/practices/corporate-law.jpg",  ← Add this
  "services": ["Contract Review", "M&A", "Compliance"]
}
```

### Testimonial Structure
```json
{
  "id": 1,
  "client": "Jane Smith",
  "title": "CEO",
  "company": "Tech Solutions Ltd",
  "text": "Outstanding legal representation that...",
  "rating": 5,
  "avatar": "images/testimonials/jane-smith.jpg"  ← Add this
}
```

---

## Adding Images to Pages

### HTML Examples

#### Hero Background
```html
<section class="hero" id="hero" style="background-image: url('images/hero/courthouse.jpg');">
    <div class="hero-content">
        <!-- Hero content here -->
    </div>
</section>
```

#### Team Member Card
```html
<div class="team-member">
    <div class="team-member-image-wrapper">
        <img src="images/team/attorney-name.jpg" alt="Attorney Name" class="team-image" loading="lazy">
    </div>
    <div class="team-info">
        <!-- Team info here -->
    </div>
</div>
```

#### Practice Area Card
```html
<div class="practice-card">
    <img src="images/practices/corporate-law.jpg" alt="Corporate Law" class="practice-image" loading="lazy">
    <div class="practice-card-content">
        <!-- Practice content here -->
    </div>
</div>
```

#### Testimonial with Avatar
```html
<div class="testimonial-header">
    <img src="images/testimonials/client-name.jpg" alt="Client Name" class="testimonial-avatar" loading="lazy">
    <div class="testimonial-info">
        <p class="testimonial-name">Client Name</p>
        <p class="testimonial-title">Company Name</p>
    </div>
</div>
```

---

## CSS Classes for Images

### Image Class Reference
```css
.team-image              /* Team member photos in cards */
.practice-image         /* Practice area preview images */
.testimonial-avatar     /* Circular testimonial avatars */
.about-image           /* About page images */
.gallery-item          /* Gallery grid items */
.image-overlay         /* Images with hover overlay effect */
```

### CSS Properties Applied
- **Max-width**: 100% (responsive)
- **Border-radius**: Appropriate for each type
- **Object-fit**: cover (maintains aspect ratio while filling space)
- **Lazy Loading**: `loading="lazy"` attribute
- **Transitions**: Smooth hover effects

---

## Performance Optimization

### Image Best Practices

1. **File Sizes**
   - Hero background: 200-400KB
   - Team photos: 50-100KB each
   - Practice images: 30-80KB
   - Avatars: 10-20KB

2. **Image Optimization**
   - Use WebP format for modern browsers (with JPG fallback)
   - Compress images: Use TinyPNG, ImageOptim, or similar
   - Resize to appropriate dimensions before uploading
   - Consider responsive images with `srcset`

3. **Lazy Loading**
   - All images use `loading="lazy"` attribute
   - Images load only when needed
   - Improves page performance

4. **Responsive Images**
```html
<!-- Example with srcset for responsive sizes -->
<img 
    src="images/team/attorney.jpg"
    srcset="images/team/attorney-small.jpg 400w, 
            images/team/attorney.jpg 800w"
    sizes="(max-width: 600px) 100vw, 50vw"
    alt="Attorney Name"
    loading="lazy">
```

---

## Fallback Handling

### When Images Are Missing
- **Team Members**: Display user icon placeholder
- **Practice Areas**: Display Font Awesome icon
- **Testimonials**: Display user icon in circle
- **Hero**: Display SVG gradient background

All fallbacks use Font Awesome icons and professional styling.

---

## Image Styling Options

### Hover Effects Available

#### Image with Zoom Hover
```css
.practice-card:hover img {
    transform: scale(1.05);
}
```

#### Image with Overlay
```html
<div class="image-overlay">
    <img src="image.jpg" alt="Description">
</div>
```

#### Team Member Hover
```css
.team-member:hover .team-member-image-wrapper img {
    transform: scale(1.08);
}
```

---

## Content.json Template with Images

Update your `data/content.json` with this structure:

```json
{
  "team": [
    {
      "id": 1,
      "name": "Attorney Name",
      "title": "Senior Attorney",
      "specialty": "Practice Area",
      "bio": "Biography here...",
      "email": "email@swazilegal.sz",
      "phone": "+268 XXXX XXXX",
      "expertise": ["Practice1", "Practice2"],
      "image": "images/team/attorney-name.jpg"
    }
  ],
  "practices": [
    {
      "id": 1,
      "name": "Practice Name",
      "icon": "💼",
      "faIcon": "fas fa-briefcase",
      "description": "Description of practice area...",
      "image": "images/practices/practice-name.jpg",
      "services": ["Service1", "Service2", "Service3"]
    }
  ],
  "testimonials": [
    {
      "id": 1,
      "client": "Client Name",
      "title": "Position/Title",
      "company": "Company Name",
      "text": "Testimonial text here...",
      "rating": 5,
      "avatar": "images/testimonials/client-name.jpg"
    }
  ]
}
```

---

## Troubleshooting

### Image Not Displaying
1. **Check path**: Ensure file path is correct and relative to HTML
2. **Check filename**: Verify exact spelling and case sensitivity
3. **Check file exists**: Confirm image file is in the images folder
4. **Check format**: Ensure supported format (JPG, PNG, WebP)
5. **Browser cache**: Clear cache and refresh page

### Image Quality Issues
1. **Too pixelated**: Image resolution too low (use larger source)
2. **Distorted**: Aspect ratio doesn't match container
3. **Blurry**: Image was scaled up (use larger source file)
4. **Colors off**: Compression too aggressive (re-save with higher quality)

### Performance Issues
1. **Slow loading**: Images too large (compress and resize)
2. **Layout shift**: No dimensions specified (add width/height)
3. **Mobile slow**: High-res images for mobile (use responsive images)

---

## Next Steps

1. ✅ Create image folders in `images/`
2. ✅ Prepare images with proper dimensions
3. ✅ Update `data/content.json` with image paths
4. ✅ Test on desktop and mobile
5. ✅ Optimize file sizes
6. ✅ Deploy to production

---

## Image Resources

### Stock Photo Sites (FREE)
- Unsplash: https://unsplash.com (professional, law office, business)
- Pexels: https://www.pexels.com (office, business, professional)
- Pixabay: https://pixabay.com (law, courthouse, office)

### Paid Stock Photo Sites
- Shutterstock: https://www.shutterstock.com
- Getty Images: https://www.gettyimages.com
- iStock: https://www.istockphoto.com

### Image Optimization Tools
- TinyPNG: https://tinypng.com (compress PNG/JPG)
- ImageOptim: https://imageoptim.com (batch optimize)
- Squoosh: https://squoosh.app (web-based optimizer)

### Design Tools
- Canva: https://www.canva.com (create professional graphics)
- Figma: https://www.figma.com (design mockups)
- Adobe Express: https://www.adobe.com/express (quick designs)

---

**Version**: 1.0  
**Last Updated**: Current Session  
**Status**: Ready for image implementation
