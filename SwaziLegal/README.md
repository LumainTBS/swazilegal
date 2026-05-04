# SwaziLegal - Interactive Law Firm Website

A professional, fully responsive law firm website built with modern web technologies and modern design patterns (Glassmorphism, Minimalism, and Claymorphism).

## Project Overview

SwaziLegal is an interactive website for a professional law firm based in Mbabane, Eswatini. The site features:

- **Professional Design**: Gradient backgrounds, glassmorphism effects, minimalist layouts, and clay-morphic elements
- **Responsive Layout**: Mobile-first design that works on all devices
- **Interactive Components**: Dynamic content loading, accordions, modals, and form validation
- **SEO-Optimized**: Proper meta tags, semantic HTML, and structured data
- **WordPress-Ready**: Clean code structure designed for easy migration to WordPress

## 📁 File Structure

```
SwaziLegal/
├── index.html                 # Home page
├── about.html                 # About Us page
├── practices.html             # Practice Areas
├── team.html                  # Team Members
├── contact.html               # Contact & Inquiry Form
├── privacy.html               # Privacy Policy & Terms
├── css/
│   └── style.css              # All CSS (gradients, effects, responsive)
├── js/
│   └── main.js                # Core JavaScript functionality
├── data/
│   └── content.json           # Dynamic content (team, practices, testimonials)
└── assets/
    ├── images/                # Images & avatars
    └── icons/                 # SVG icons
```

## 🎨 Design Features

### Color Scheme
- **Primary Dark**: #1a2332
- **Primary Light**: #2d3e52
- **Accent Blue**: #1e5a96
- **Accent Teal**: #2a9d8f
- **Accent Gold**: #d4af37

### Modern Design Effects

#### Glassmorphism
- Frosted glass appearance with backdrop blur
- Semi-transparent backgrounds
- Used for overlay cards and navigation

#### Claymorphism
- Soft, clay-like visual appearance
- Warm gradient backgrounds
- Inset shadows for depth

#### Minimalism
- Clean, uncluttered layouts
- Whitespace utilization
- Simple typography hierarchy
- Focus on content

### Responsive Behavior
- Breakpoints for tablets (768px) and mobile (480px)
- Flexible grid layouts
- Touch-friendly buttons and interactions

## 📄 Pages

### 1. Home (index.html)
- Hero section with call-to-action
- Featured practice areas preview
- Team member highlights
- "Why Choose Us" section
- Client testimonials
- Newsletter signup

### 2. About (about.html)
- Firm story and history
- Mission, vision, and values
- Key milestones
- Core values explanation

### 3. Practice Areas (practices.html)
- Complete practice area grid
- Detailed service descriptions for each practice
- FAQ accordion
- Contact CTA

### 4. Our Team (team.html)
- Team member cards with search/filter
- Interactive team modal with biography
- Credentials section
- Attorney contact information

### 5. Contact (contact.html)
- Contact form with validation
- Multiple contact methods
- Location information
- FAQ section
- Response time expectations

### 6. Privacy & Legal (privacy.html)
- Comprehensive privacy policy
- Terms of service
- Legal disclaimers

## 🔄 Content Management

All content is stored in `data/content.json` and dynamically loaded into the website. This makes it easy to:

- Update team members
- Add/modify practice areas
- Change testimonials
- Update contact information
- Manage FAQs

### JSON Structure

```json
{
  "firm": { ... },
  "team": [ ... ],
  "practices": [ ... ],
  "faqs": [ ... ],
  "testimonials": [ ... ]
}
```

## 💻 Technology Stack

- **HTML5** - Semantic markup
- **CSS3** - Gradients, animations, flexbox/grid
- **Vanilla JavaScript** - No framework dependencies
- **JSON** - Data storage

## 🚀 Getting Started

### Installation

1. **Clone/Download the project**
   ```bash
   cd SwaziLegal
   ```

2. **Open index.html in a browser**
   - Double-click `index.html` or
   - Use a local server:
     ```bash
     # Using Python
     python -m http.server 8000
     
     # Using Node.js
     npx http-server
     ```

3. **Access the website**
   - Navigate to `http://localhost:8000` (or your chosen port)

### Customization

#### Update Firm Information
Edit `data/content.json`:
```json
"firm": {
  "name": "SwaziLegal",
  "phone": "+268 2687 8132527",
  "email": "info@swazilegal.sz",
  "address": "Mbabane, Eswatini"
}
```

#### Add Team Members
Add new object to `data/content.json` → `team` array:
```json
{
  "id": 5,
  "name": "Attorney Name",
  "title": "Position",
  "specialty": "Practice Area",
  "bio": "Biography...",
  "avatar": "👨‍⚖️",
  "email": "email@swazilegal.sz"
}
```

#### Add Practice Areas
Add new object to `data/content.json` → `practices` array:
```json
{
  "id": 7,
  "name": "Practice Area Name",
  "description": "Description",
  "icon": "📋",
  "services": ["Service 1", "Service 2"]
}
```

## 🔧 Features

### Interactive Components

#### Accordion
- Click on headers to expand/collapse
- Smooth animations
- Only one section open at a time

#### Search & Filter
- Search team members by name
- Filter by specialty
- Real-time filtering

#### Form Validation
- Email format validation
- Phone number validation
- Required field checking
- Success/error messages

#### Modal
- Team member detail view
- Click outside to close
- X button to dismiss

## 📱 Responsive Design

- **Desktop**: Full-width layouts, multi-column grids
- **Tablet (< 768px)**: 2-column grids, optimized spacing
- **Mobile (< 480px)**: 1-column layout, touch-friendly buttons

## 🔒 Security Considerations

- Form data validation on client-side
- HTML sanitization for user inputs
- No sensitive data stored in localStorage by default
- HTTPS recommended for production
- Privacy policy and terms included

## 🔄 WordPress Integration (Future)

The website is designed for easy WordPress migration:

### Preparation for WordPress

1. **Custom Post Types to Create**
   - `Attorney` → Team members
   - `Practice` → Practice areas
   - `Testimonial` → Client reviews
   - `FAQ` → Frequently asked questions

2. **Custom Fields Mapping**
   - Team: Name, Title, Bio, Specialty, Email, Avatar
   - Practice: Title, Description, Services, Icon
   - Testimonial: Quote, Client Name, Company, Rating

3. **Recommended Plugins**
   - Advanced Custom Fields (ACF) for custom fields
   - Contact Form 7 for contact forms
   - Yoast SEO for optimization
   - WP Super Cache for performance

4. **Migration Steps**
   - Import JSON data into custom posts
   - Create custom post type templates
   - Set up custom fields with ACF
   - Configure plugin settings
   - Test all functionality

### Converting to WordPress Theme

```php
# Example WordPress template structure
get_header();
?>
<div class="hero">
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
</div>
<?php
get_footer();
```

## 📊 Performance

- **Page Load**: < 2 seconds target
- **Lighthouse Score**: 85+ (Performance, Accessibility, SEO, Best Practices)
- **Optimizations**:
  - Minified CSS and JavaScript
  - Lazy loading for images
  - Efficient animations (GPU accelerated)
  - Mobile-first CSS

## 📞 Contact Information

**SwaziLegal**
- 📍 **Address**: Mbabane, Eswatini
- 📞 **Phone**: +268 2687 8132527
- 💬 **WhatsApp**: 26878132527
- 📧 **Email**: info@swazilegal.sz

## 👥 Team

- **Malumane Thembumenzi S** - Senior Partner & Head of Corporate Law
- **Mabuza S'cabangile** - Partner & Head of Family Law
- **Nhlanhla Masango** - Senior Associate, Criminal Law
- **Thandi Khubone** - Associate, Labor & Employment Law

## 📄 License

This website is proprietary to SwaziLegal. All rights reserved.

## 🤝 Support

For technical support or customization requests, contact the development team.

---

**Last Updated**: April 19, 2024  
**Version**: 1.0.0  
**Status**: Production Ready
