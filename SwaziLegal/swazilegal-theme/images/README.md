# Images Directory

This directory contains all image assets for the SwaziLegal website.

## Folder Structure

```
images/
├── hero/                    ← Hero section background images
├── team/                    ← Team member headshots
├── practices/               ← Practice area representative images
├── testimonials/            ← Client/testimonial avatars
└── about/                   ← Office photos and team gatherings
```

## How to Add Images

### 1. Hero Background Image
- Place your hero background image in `images/hero/`
- Recommended filename: `courthouse-or-law-office.jpg`
- The image is referenced in `index.html` with the style attribute:
  ```html
  <section class="hero" style="background-image: url('images/hero/Hero.jpeg');">
  ```

### 2. Team Member Photos
- Place team member headshots in `images/team/`
- Filenames should match the format used in `data/content.json`
- **Example filenames:**
  - `malumane.jpg`
  - `scabangile.jpg`
  - `nhlanhla.jpg`
  - `thandi.jpg`

### 3. Practice Area Images
- Place practice area images in `images/practices/`
- **Example filenames:**
  - `corporate-law.jpg`
  - `family-law.jpg`
  - `criminal-law.jpg`
  - `labor-law.jpg`
  - `real-estate.jpg`
  - `intellectual-property.jpg`

### 4. Testimonial Avatars
- Place client profile pictures in `images/testimonials/`
- Recommended size: 120x120px (square)
- **Example filenames:**
  - `john-dlamini.jpg`
  - `lindiwe-mabuza.jpg`
  - `themba-khanyi.jpg`

### 5. About Page Images
- Place office/team photos in `images/about/`
- **Example filenames:**
  - `office-interior.jpg`
  - `law-library.jpg`
  - `team-photo.jpg`
  - `reception-area.jpg`

## Image Specifications

| Type | Size | Format | Aspect Ratio |
|------|------|--------|--------------|
| Hero Background | 1920x1080+ | JPG/PNG/WebP | 16:9 |
| Team Photos | 400x400px | JPG/PNG | 1:1 (square) |
| Practice Images | 400x300+ | JPG/PNG | 4:3 or 16:9 |
| Testimonial Avatars | 120x120px | JPG/PNG | 1:1 (square) |
| About Images | 800x600+ | JPG/PNG | Variable |

## How to Update data/content.json

Open `data/content.json` and add image paths to:

### Team Members
```json
"image": "images/team/attorney-name.jpg"
```

### Practices
```json
"image": "images/practices/practice-name.jpg"
```

### Testimonials
```json
"avatar": "images/testimonials/client-name.jpg"
```

## File Size Optimization

Keep file sizes reasonable for web performance:
- Hero images: 200-400KB
- Team photos: 50-100KB each
- Practice images: 30-80KB
- Avatars: 10-20KB

**Tools to optimize images:**
- TinyPNG: https://tinypng.com
- ImageOptim: https://imageoptim.com
- Squoosh: https://squoosh.app

## Fallback Behavior

Images are optional. If an image is not found or the path is empty:
- **Team Members**: Display user icon placeholder
- **Practice Areas**: Display Font Awesome icon
- **Testimonials**: Display user icon in circle
- **Hero**: Display SVG gradient background

This ensures the website looks professional even before all images are added.

## Image Resources

### Stock Photos (Free)
- Unsplash: https://unsplash.com
- Pexels: https://www.pexels.com
- Pixabay: https://pixabay.com

### Stock Photos (Paid)
- Shutterstock: https://www.shutterstock.com
- Getty Images: https://www.gettyimages.com
- iStock: https://www.istockphoto.com

## Notes

- All image paths in JSON should be relative to the root directory
- Use forward slashes (/) in paths, not backslashes
- Image files should be placed in this directory before the website goes live
- For best performance, consider using WebP format with JPG fallbacks
- The website includes lazy loading for all images (`loading="lazy"` attribute)

## Getting Started

1. Create your image files with proper dimensions
2. Place them in the appropriate subdirectories within this folder
3. Update `data/content.json` with the image paths
4. Test on your local server
5. Deploy when ready

---

For detailed image specifications and implementation guide, see [IMAGE_GUIDE.md](../IMAGE_GUIDE.md)
