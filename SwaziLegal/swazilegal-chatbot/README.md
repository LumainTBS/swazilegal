# SwaziLegal Chatbot Plugin

A WordPress plugin that adds an AI-powered chatbot to your SwaziLegal website.

## Features

- ✅ Multiple chatbot options (Drift, Botpress, Intercom, or Custom)
- ✅ Easy setup - just add your API ID
- ✅ Works on all pages automatically
- ✅ Mobile responsive
- ✅ Customizable FAQ database
- ✅ Professional appearance with SwaziLegal branding
- ✅ Built-in custom chatbot option
- ✅ No coding required

## Installation

### Method 1: Upload Plugin Files

1. Connect to your WordPress server via FTP
2. Upload the `swazilegal-chatbot` folder to `/wp-content/plugins/`
3. Go to WordPress Admin → Plugins
4. Find "SwaziLegal Chatbot" and click "Activate"

### Method 2: Upload ZIP File

1. Go to WordPress Admin → Plugins → Add New
2. Click "Upload Plugin"
3. Upload the `swazilegal-chatbot.zip` file
4. Click "Install Now"
5. Click "Activate Plugin"

## Setup Instructions

### Choose Your Chatbot Type

#### Option 1: Drift (Recommended - Easiest)

1. Go to [drift.com](https://drift.com)
2. Click "Start for Free"
3. Create an account with your business email
4. Copy your **Drift ID** from the dashboard
5. In WordPress Admin, go to **Chatbot → Settings**
6. Select "Drift" as chatbot type
7. Paste your Drift ID in the "Drift ID" field
8. Check "Enable Chatbot"
9. Click "Save Changes"
10. ✅ Your chatbot is now live!

#### Option 2: Botpress

1. Go to [botpress.com](https://botpress.com)
2. Create a free account
3. Create a new bot
4. Copy your **Bot ID** and **Client ID**
5. In WordPress Admin, go to **Chatbot → Settings**
6. Select "Botpress" as chatbot type
7. Paste your Bot ID in the "Botpress Bot ID" field
8. Check "Enable Chatbot"
9. Click "Save Changes"

#### Option 3: Intercom

1. Go to [intercom.com](https://intercom.com)
2. Create a free account
3. Copy your **App ID** from settings
4. In WordPress Admin, go to **Chatbot → Settings**
5. Select "Intercom" as chatbot type
6. Paste your App ID in the "Intercom App ID" field
7. Check "Enable Chatbot"
8. Click "Save Changes"

#### Option 4: Built-in Custom Chatbot

1. In WordPress Admin, go to **Chatbot → Settings**
2. Check "Use built-in custom chatbot"
3. Check "Enable Chatbot"
4. Click "Save Changes"
5. The custom chatbot appears on all pages with built-in FAQ data

## Customizing the FAQ Database

To customize the FAQ responses for the custom chatbot:

1. Edit the file: `js/chatbot.js`
2. Find the `faqData` object
3. Add or modify entries:

```javascript
const faqData = {
    "keyword": "Your response here",
    "practice areas": "We offer services in...",
    "contact": "Call us at +268 76 805 805"
};
```

## Customizing Appearance

The chatbot styling is defined in `css/chatbot.css`. You can customize:

- Colors
- Position (bottom-right, bottom-left, etc.)
- Size
- Font styles
- Mobile responsiveness

### Change Chatbot Position

In `css/chatbot.css`, modify:

```css
.chatbot-widget {
    bottom: 20px;   /* Distance from bottom */
    right: 20px;    /* Distance from right */
}
```

### Change Colors

Find the gradient definition:

```css
background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
```

Replace the hex colors with your preferred colors.

## File Structure

```
swazilegal-chatbot/
├── swazilegal-chatbot.php       # Main plugin file
├── css/
│   └── chatbot.css              # Chatbot styles
├── js/
│   └── chatbot.js               # Chatbot logic
├── README.md                    # This file
└── readme.txt                   # WordPress readme
```

## Settings

Go to **WordPress Admin → Chatbot → Settings** to configure:

- **Chatbot Type**: Choose between Drift, Botpress, Intercom, or Custom
- **Enable Chatbot**: Check to display on all pages
- **API Credentials**: Enter your Drift ID, Botpress Bot ID, or Intercom App ID

## Troubleshooting

### Chatbot Not Showing

1. Check that "Enable Chatbot" is checked
2. Clear WordPress cache if using a caching plugin
3. Hard refresh browser (Ctrl+Shift+Delete)
4. Check browser console (F12) for JavaScript errors

### API Not Working

1. Verify you copied the correct API ID
2. Check that the API ID matches the selected chatbot type
3. Ensure your API account is active
4. Contact the chatbot service provider's support

### Styling Issues

1. Check for CSS conflicts with your theme
2. Increase the z-index in `css/chatbot.css` if hidden behind other elements
3. Clear cache and refresh

### Custom Chatbot Not Responding

1. Check `js/chatbot.js` for syntax errors
2. Verify the FAQ data is properly formatted
3. Check browser console for JavaScript errors

## Getting Help

- [SwaziLegal Website](https://swazilegal.sz)
- [Drift Support](https://drift.com/support)
- [Botpress Documentation](https://botpress.com/docs)
- [Intercom Help](https://www.intercom.com/help)

## Frequently Asked Questions

**Q: Which chatbot option should I choose?**
A: Drift is recommended for most users - it's easiest to set up and has a free tier with live chat.

**Q: Can I switch chatbot types later?**
A: Yes, go to settings and select a different type. Previous settings are saved.

**Q: Does the custom chatbot require training?**
A: No, it comes with built-in SwaziLegal FAQ data. You can customize it by editing `js/chatbot.js`.

**Q: Can I use multiple chatbots at once?**
A: No, only one chatbot type is active at a time.

**Q: Is the chatbot mobile-friendly?**
A: Yes, all options are fully responsive on mobile devices.

**Q: Do I need to pay for the chatbot?**
A: All options have free tiers. Premium features are available with paid plans.

**Q: Can I customize the chatbot colors and appearance?**
A: Yes, edit `css/chatbot.css` to customize colors, size, and position.

## Support

For issues or questions:
1. Check the troubleshooting section above
2. Review the chatbot service provider's documentation
3. Contact SwaziLegal support

## License

This plugin is released under the GPL v2 or later license.

---

**Version**: 1.0.0  
**Author**: SwaziLegal  
**Website**: https://swazilegal.sz  
**Last Updated**: 2024
