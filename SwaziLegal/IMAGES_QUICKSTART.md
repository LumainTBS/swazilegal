# Quick Start - Adding Images to SwaziLegal

## 5-Minute Setup Guide

### Step 1: Understand Image Locations (1 min)
Images go in these folders:
- **Hero background**: `images/hero/` → `courthouse-or-law-office.jpg`
- **Team member photos**: `images/team/` → `attorney-name.jpg`
- **Practice areas**: `images/practices/` → `corporate-law.jpg`
- **Testimonial avatars**: `images/testimonials/` → `client-name.jpg`
- **About page**: `images/about/` → `office-photo.jpg`

### Step 2: Prepare Your Images (2 min)
For each image type, use these dimensions:

| Type | Dimensions | File Size Tips |
|------|-----------|-----------------|
| Hero | 1920x1080 | Keep under 300KB |
| Team | 400x400 | Keep under 100KB |
| Practice | 400x300 | Keep under 80KB |
| Testimonial | 120x120 | Keep under 20KB |

**Quick Optimization**: Use https://tinypng.com to compress your images

### Step 3: Add Image Paths to data/content.json (1 min)

#### For Team Members
Find this in `data/content.json`:
```json
{
  "id": 1,
  "name": "Malumane Thembumenzi S",
  ...
  "email": "malumane@swazilegal.sz",
  "image": "images/team/malumane.jpg"    ← Add this line
}
```

#### For Practices
Find this in `data/content.json`:
```json
{
  "id": 1,
  "name": "Corporate & Commercial Law",
  ...
  "faIcon": "fas fa-building",
  "image": "images/practices/corporate-law.jpg"    ← Add this line
}
```

#### For Testimonials
Find this in `data/content.json`:
```json
{
  "id": 1,
  "client": "John Dlamini",
  ...
  "rating": 5,
  "avatar": "images/testimonials/john-dlamini.jpg"    ← Add this line
}
```

### Step 4: Test (1 min)
1. Place your images in the correct folders
2. Update `data/content.json` with image paths
3. Open the website in your browser
4. Check that images appear
5. If not, images will show as icons (that's the fallback - it's OK!)

---

## Image Examples by Type

### Hero Background
Good examples:
- Courthouse building entrance (professional, authoritative)
- Modern law office interior (contemporary, trustworthy)
- Legal scales and gavel (professional, symbolic)
- Business architecture (corporate, established)

### Team Member Photos
Good examples:
- Professional headshot (business casual or formal)
- Well-lit face clearly visible
- Professional background (office or neutral)
- Consistent lighting and background for multiple team members

### Practice Area Images
Good examples:
- **Corporate**: Meeting rooms, contracts, handshakes
- **Family**: Mediation rooms, family-centered imagery
- **Criminal**: Courtroom, legal documentation
- **Labor**: Office environment, dispute resolution
- **Real Estate**: Buildings, property documents
- **IP**: Innovation symbols, protections

### Testimonial Avatars
Good examples:
- Professional headshot cropped to face
- Clear, well-lit photo
- Business casual or formal attire
- 1:1 square crop

---

## File Naming Convention

Use simple, lowercase filenames:
```
✅ Good:
  corporate-law.jpg
  attorney-john-doe.jpg
  client-testimonial-1.jpg

❌ Avoid:
  Corporate Law - Practice Area (2024).jpg
  Attorney_John_Doe_Headshot_v3_FINAL.jpg
  CLIENT TESTIMONIAL 1.JPG
```

---

## What Happens Without Images?

If you don't add images (or paths are wrong), the website still looks professional:
- **Hero**: Shows blue gradient background
- **Team**: Shows user icon placeholder
- **Practices**: Shows Font Awesome icons (briefcase, building, etc.)
- **Testimonials**: Shows user icon in circle

You can fill in images later - the website works great with icons!

---

## Troubleshooting

### Images not showing up?
1. **Check the path**: Make sure path matches exactly in JSON
2. **Check file exists**: Verify image file is in the correct folder
3. **Check filename**: Spelling must be exact (case-sensitive)
4. **Clear cache**: Ctrl+Shift+Del (or Cmd+Shift+Del on Mac)
5. **Reload**: Refresh the page (Ctrl+R)

### File is too large?
1. Use TinyPNG.com to compress
2. Resize image to specifications before uploading
3. Consider using WebP format (better compression)

### Not sure about dimensions?
Use this quick reference:
- **Square images**: 400x400 or 120x120
- **Wide images**: 1920x1080 or 400x300
- Aspect ratio is more important than exact size

---

## Stock Photo Resources (Completely FREE)

Need images? Try these free sites:
- **Unsplash** (https://unsplash.com) - Professional, high quality
- **Pexels** (https://www.pexels.com) - Search "law office", "business"
- **Pixabay** (https://pixabay.com) - Try "courthouse", "attorney"

Search terms to try:
- "Professional office"
- "Lawyer headshot"
- "Courthouse building"
- "Business meeting"
- "Legal documents"

---

## JSON Path Examples

### Correct Format ✅
```json
"image": "images/team/john.jpg"
"avatar": "images/testimonials/client1.jpg"
```

### Wrong Formats ❌
```json
"image": "C:\Users\PC\Desktop\SwaziLegal\images\team\john.jpg"    // Full path - NO!
"image": "..\..\images\team\john.jpg"                            // Backslashes - NO!
"image": "/images/team/john.jpg"                                 // Leading slash - NO!
```

---

## Expected Results

### Before Images
- Professional blue and gold design
- All text-based content
- Font Awesome icons throughout
- Fully functional layout

### After Images
- Same professional design
- All images appear on their respective sections
- Hero has background image
- Team section shows photos
- Testimonials have avatars
- Everything animations still work perfectly

---

## One-Command Test

Want to check if everything is set up right? Open DevTools (F12) and check:

1. **Network tab**: Do images load? (any red X's?)
2. **Console tab**: Any errors? (should be clean)
3. **Visual**: Do images appear where expected?

If you see red X's in Network tab, check your file paths.

---

## Common File Paths (Copy/Paste Ready)

### Team Photos
```
images/team/malumane.jpg
images/team/scabangile.jpg
images/team/nhlanhla.jpg
images/team/thandi.jpg
```

### Practice Areas  
```
images/practices/corporate-law.jpg
images/practices/family-law.jpg
images/practices/criminal-law.jpg
images/practices/labor-law.jpg
images/practices/real-estate.jpg
images/practices/intellectual-property.jpg
```

### Testimonials
```
images/testimonials/john-dlamini.jpg
images/testimonials/lindiwe-mabuza.jpg
images/testimonials/themba-khanyi.jpg
```

---

## Save Time: Template Copy-Paste

### For Team Members in JSON
```json
{
  "id": 1,
  "name": "Attorney Name",
  "title": "Position Title",
  "specialty": "Practice Areas",
  "bio": "Biography text here",
  "avatar": "👨‍⚖️",
  "email": "email@swazilegal.sz",
  "image": "images/team/attorney-name.jpg"
}
```

### For Practices in JSON
```json
{
  "id": 1,
  "name": "Practice Name",
  "description": "Description of practice area",
  "icon": "📋",
  "faIcon": "fas fa-briefcase",
  "image": "images/practices/practice-name.jpg",
  "services": ["Service 1", "Service 2", "Service 3"]
}
```

### For Testimonials in JSON
```json
{
  "id": 1,
  "client": "Client Name",
  "company": "Company Name",
  "text": "Testimonial text here",
  "rating": 5,
  "avatar": "images/testimonials/client-name.jpg"
}
```

---

## Final Checklist

Before going live:
- [ ] All images saved in correct directories
- [ ] All image paths added to data/content.json
- [ ] Image file sizes optimized (hero <300KB, others <100KB)
- [ ] Tested on desktop browser
- [ ] Tested on tablet
- [ ] Tested on mobile phone
- [ ] All images display correctly
- [ ] No console errors (check F12)
- [ ] Hover effects work smoothly
- [ ] Fallback icons still visible if needed

---

## Still Have Questions?

- **Detailed Guide**: See `IMAGE_GUIDE.md`
- **CSS Classes**: See `DEVELOPER_GUIDE.md`
- **Image Folder**: See `images/README.md`
- **Full Summary**: See `IMAGE_SUPPORT_SUMMARY.md`

---

**Ready to add images? Start with Step 1 above!** 🚀
