# Quick Reference Guide - SwaziLegal Chatbot

## ⚡ 2-Minute Setup

### For WordPress Sites

**Step 1:** Activate Plugin
- Go to WordPress Admin → Plugins
- Find "SwaziLegal Chatbot" and click "Activate"

**Step 2:** Choose Chatbot
- Admin → Chatbot → Settings
- Select your preferred chatbot type

**Step 3:** Add Credentials
- Copy API ID from your chatbot service
- Paste into the corresponding field
- Check "Enable Chatbot"

**Step 4:** Save
- Click "Save Changes"
- ✅ Chatbot appears on all pages!

---

## 🔐 Getting API Credentials

### Drift ID
1. Visit [drift.com](https://drift.com)
2. Sign up (free tier available)
3. Dashboard → Settings → Install
4. Copy the script, find your ID in the format: `t.load("XXXX-XXXX-XXXX")`

### Botpress Bot ID
1. Visit [botpress.com](https://botpress.com)
2. Create bot
3. Dashboard → Deploy
4. Copy Bot ID from the embed code

### Intercom App ID
1. Visit [intercom.com](https://intercom.com)
2. Settings → Installation → Web
3. Copy App ID from the code snippet

---

## 🎨 Customization

### Change Chatbot Colors

Edit: `swazilegal-chatbot/css/chatbot.css`

Find:
```css
background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
```

Replace colors with your preference:
- `#0d47a1` = Dark blue
- `#1565c0` = Light blue
- Use any hex color code

### Change Chatbot Position

In `chatbot.css`, adjust:
```css
.chatbot-widget {
    bottom: 20px;   /* Change this */
    right: 20px;    /* Or change this */
}
```

Options:
- `right: 20px;` = Bottom right (default)
- `left: 20px;` = Bottom left
- `bottom: 20px;` = Distance from bottom
- `bottom: 80px;` = Higher up on page

### Change Chatbot Size

```css
.chatbot-widget {
    width: 400px;        /* Chat width */
    max-height: 600px;   /* Chat height */
}
```

---

## 💬 Customize FAQ Responses

Edit: `swazilegal-chatbot/js/chatbot.js`

Find the `faqData` object and add/edit entries:

```javascript
const faqData = {
    "keyword": "Your response here",
    "consultation": "How to book a consultation",
    "practice areas": "What areas we serve",
    "contact": "Phone number and email"
};
```

**How it works:**
- User types message containing the keyword
- Bot returns the corresponding response
- Case-insensitive matching

**Examples:**
```javascript
"hours": "We're open 9 AM - 5 PM Monday-Friday",
"fees": "Contact us for a consultation to discuss pricing",
"emergency": "For urgent matters, call +268 78132527"
```

---

## 🧪 Testing

### Test Locally
1. WordPress Admin → Chatbot → Settings
2. Enable chatbot
3. Visit your website
4. Chatbot appears in bottom right corner
5. Click and test with queries

### Test on Mobile
1. Open site on mobile device
2. Verify chatbot adapts to screen size
3. Test typing and sending messages

### Common Test Queries
- "What practice areas do you offer?"
- "How do I schedule a consultation?"
- "What's your contact number?"
- "Tell me about your team"
- "What services do you provide?"

---

## 📋 Decision Matrix

Choose your chatbot:

```
Need fastest setup?
  → Drift (2 minutes) ✅

Need most customization?
  → Custom Chatbot (built-in)

Need professional features?
  → Intercom (CRM integration)

Need visual bot builder?
  → Botpress (flow editor)
```

---

## 🚀 Deployment Checklist

- [ ] Plugin uploaded and activated
- [ ] Chatbot type selected
- [ ] API credentials entered
- [ ] Chatbot enabled on settings
- [ ] Tested on desktop
- [ ] Tested on mobile
- [ ] FAQ data customized (if using custom chatbot)
- [ ] Colors/branding customized
- [ ] Deployment confirmed working

---

## 🔧 Common Tasks

### Disable Chatbot Temporarily
1. Admin → Chatbot → Settings
2. Uncheck "Enable Chatbot"
3. Save Changes

### Switch to Different Chatbot
1. Admin → Chatbot → Settings
2. Change "Chatbot Type" dropdown
3. Enter new API credentials
4. Save Changes

### Reset to Default Settings
1. Delete `wp-content/plugins/swazilegal-chatbot` folder
2. Reinstall plugin
3. Reconfigure settings

### Enable Only on Specific Pages
Edit `swazilegal-chatbot.php`, find `render_chatbot()` function, add:
```php
if ( ! is_page( array( 'about', 'services' ) ) ) {
    return;
}
```

---

## 📞 Contact Information for Users

After setup, users can contact SwaziLegal via:

- **Phone:** +268 2687 8132527
- **WhatsApp:** +268 78132527
- **Email:** info@swazilegal.sz
- **Website:** https://swazilegal.sz
- **Location:** Mbabane, Eswatini

---

## 📱 Chatbot Response Examples

### "What practice areas do you serve?"
✅ Response includes: Corporate Law, Family Law, Criminal Defense, Labor & Employment, Property, Estate Administration, Civil Litigation, Notarial Services

### "How do I schedule a consultation?"
✅ Response includes: Phone number, WhatsApp link, website contact page

### "What's your contact information?"
✅ Response includes: Phone, WhatsApp, Email, Location

### "Tell me about your services"
✅ Response includes: Link to services page with full details

---

## 🔒 Security Notes

- Never expose API keys in frontend code
- Use HTTPS for all communications
- Don't store sensitive user data in chat logs
- Comply with GDPR/privacy regulations
- Regularly update plugin

---

## 📊 Analytics

To track chatbot usage:

**Drift Analytics:**
- Dashboard → Analytics → Conversations

**Botpress Analytics:**
- Dashboard → Metrics → Conversations

**Intercom Analytics:**
- Inbox → Conversations history

**Custom Chatbot:**
- Check browser console logs
- Add Google Analytics tracking

---

## Version Info

- **Plugin Version:** 1.0.0
- **WordPress Compatibility:** 5.0+
- **PHP Requirement:** 7.4+
- **Last Updated:** 2024

---

## Quick Links

- [Full Integration Guide](CHATBOT_INTEGRATION.md)
- [Interactive Demo](chatbot-integration.html)
- [Plugin Settings](wp-admin/admin.php?page=swazilegal-chatbot)
- [Plugin README](swazilegal-chatbot/README.md)
