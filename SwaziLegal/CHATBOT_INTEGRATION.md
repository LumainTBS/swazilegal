# SwaziLegal Chatbot Integration Guide

## Overview

This guide covers chatbot integration options for the SwaziLegal website, including cloud-based solutions and custom implementations.

## Quick Start (2 Minutes)

### Option 1: Drift (Recommended)

**Best for:** Quick setup, free tier, professional appearance

1. Go to [drift.com](https://drift.com)
2. Click "Start for Free"
3. Create account with business email
4. Get your **Drift ID** from dashboard
5. Copy this code and paste into your WordPress theme header:

```html
<script>
  !function() {
    var t = window.driftt = window.drift = window.drift || [], e = !1;
    if (!t.identify)
      return void (t.addLoad = function(n) {
        var a = document.createElement("script");
        a.async = !0, a.src = n, document.head.appendChild(a);
      });
    t.load("YOUR_DRIFT_ID_HERE");
  }();
</script>
```

6. Replace `YOUR_DRIFT_ID_HERE` with your actual Drift ID
7. Add script to `wp-content/themes/swazilegal-theme/header.php` before `</head>`
8. Configure bot responses in Drift dashboard
9. ✅ Done! Chatbot appears on all pages

### Option 2: Intercom (2 Minutes)

**Best for:** Professional messaging, lead capture, team collaboration

1. Visit [intercom.com](https://intercom.com)
2. Sign up for free
3. Get your **App ID**
4. Add to WordPress header:

```html
<script>
  window.intercomSettings = {
    api_base: "https://api-iam.intercom.io",
    app_id: "YOUR_APP_ID_HERE"
  };
</script>
<script async>
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');return;}var d=document;var i=function(){i.c(arguments)};i._.push=i;i._.loaded_apps=[];i.deferredLoadedApps=[];i.c=function(args){i._.push(args)};w.Intercom=i;function l(){if(!d.getElementById('IntercomAppShim')){var s=d.createElement('script');s.async=true;s.src='https://widget.intercom.io/widget/YOUR_APP_ID_HERE';s.id='IntercomAppShim';d.body.appendChild(s);}}if(document.readyState==='loading'){d.addEventListener('DOMContentLoaded',l);}else{l();}})()
</script>
```

### Option 3: Botpress Cloud (3 Minutes)

**Best for:** Customizable flows, more control, free tier

1. Go to [botpress.com](https://botpress.com)
2. Create free account
3. Create new bot
4. Get **Bot ID** and **Client ID**
5. Add to WordPress:

```html
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script>
  window.botpressWebChat.init({
    botId: "YOUR_BOT_ID",
    hostUrl: "https://cdn.botpress.cloud/webchat",
    messagingUrl: "https://messaging.botpress.cloud",
    clientId: "YOUR_CLIENT_ID"
  });
</script>
```

---

## Detailed Integration Methods

### Method 1: Functions.php Integration (Recommended for WordPress)

Edit `wp-content/themes/swazilegal-theme/functions.php`:

```php
<?php

// Add Drift Chatbot to footer
add_action('wp_footer', 'swazilegal_add_drift_chatbot');
function swazilegal_add_drift_chatbot() {
    ?>
    <script>
      !function() {
        var t = window.driftt = window.drift = window.drift || [], e = !1;
        if (!t.identify)
          return void (t.addLoad = function(n) {
            var a = document.createElement("script");
            a.async = !0, a.src = n, document.head.appendChild(a);
          });
        t.load("YOUR_DRIFT_ID_HERE");
      }();
    </script>
    <?php
}

// Alternative: Add Botpress chatbot
add_action('wp_footer', 'swazilegal_add_botpress_chatbot');
function swazilegal_add_botpress_chatbot() {
    ?>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script>
      window.botpressWebChat.init({
        botId: "YOUR_BOT_ID",
        hostUrl: "https://cdn.botpress.cloud/webchat",
        messagingUrl: "https://messaging.botpress.cloud",
        clientId: "YOUR_CLIENT_ID"
      });
    </script>
    <?php
}

?>
```

**To enable/disable:**
- Comment out the `add_action()` line to disable
- Keep uncommented to enable on all pages

### Method 2: Direct Header.php Integration

Edit `wp-content/themes/swazilegal-theme/header.php`:

Find the line with `</head>` and add before it:

```php
<!-- Chatbot Integration -->
<script>
  !function() {
    var t = window.driftt = window.drift = window.drift || [], e = !1;
    if (!t.identify)
      return void (t.addLoad = function(n) {
        var a = document.createElement("script");
        a.async = !0, a.src = n, document.head.appendChild(a);
      });
    t.load("YOUR_DRIFT_ID_HERE");
  }();
</script>
```

### Method 3: Code Snippets Plugin (No Coding Required)

1. Install **Code Snippets** plugin from WordPress admin
2. Go to **Snippets → Add New**
3. Paste chatbot script
4. Name it (e.g., "Drift Chatbot")
5. Click **Save Snippet and Activate**
6. Script automatically added to all pages

### Method 4: Custom Chatbot Widget

Create a new file: `wp-content/themes/swazilegal-theme/template-parts/chatbot.php`

```php
<?php
/**
 * Custom SwaziLegal Chatbot Widget
 * Template Part for Chatbot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div id="swazilegal-chatbot" class="chatbot-widget">
    <div class="chatbot-header">
        <h3>💬 SwaziLegal Assistant</h3>
        <button id="close-chatbot" class="close-btn">×</button>
    </div>
    <div id="chatbot-messages" class="chatbot-messages"></div>
    <div class="chatbot-input-area">
        <input type="text" id="chatbot-user-input" placeholder="Ask about our services..." />
        <button id="chatbot-send-btn" class="send-btn">Send</button>
    </div>
</div>

<style>
    .chatbot-widget {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 400px;
        max-height: 600px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        z-index: 9999;
        font-family: 'Segoe UI', Roboto, sans-serif;
    }

    .chatbot-header {
        background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
        color: white;
        padding: 1rem;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chatbot-header h3 {
        margin: 0;
        font-size: 1rem;
    }

    .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .chatbot-messages {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
        background: #f9f9f9;
        max-height: 400px;
    }

    .message {
        margin-bottom: 1rem;
        display: flex;
    }

    .message.user {
        justify-content: flex-end;
    }

    .message p {
        padding: 0.8rem;
        border-radius: 12px;
        max-width: 70%;
        margin: 0;
    }

    .message.user p {
        background: #0d47a1;
        color: white;
    }

    .message.bot p {
        background: #e0e0e0;
        color: #333;
    }

    .chatbot-input-area {
        display: flex;
        gap: 0.5rem;
        padding: 1rem;
        border-top: 1px solid #e0e0e0;
    }

    .chatbot-input-area input {
        flex: 1;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
    }

    .send-btn {
        padding: 0.8rem 1.5rem;
        background: #0d47a1;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
    }

    .send-btn:hover {
        background: #1565c0;
    }

    @media (max-width: 600px) {
        .chatbot-widget {
            width: calc(100% - 20px);
            right: 10px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqData = {
        "practice areas": "We offer services in Corporate Law, Family Law, Criminal Defense, Labor & Employment Law, Property & Conveyancing, Estate Administration, Civil Litigation, and Notarial Services.",
        "consultation": "You can schedule a free consultation by calling +268 76 805 805, WhatsApp +268 78132527, or visiting our contact page.",
        "contact": "📞 Phone: +268 2687 8132527 | 💬 WhatsApp: +268 78132527 | 📧 Email: info@swazilegal.sz",
        "team": "Our experienced team specializes in various practice areas. Visit our team page to meet our attorneys.",
        "services": "Visit our services page to learn about all available legal services.",
        "appointment": "To check your appointment status, please provide your phone number or contact us at +268 78132527",
        "whatsapp": "Click here to book via WhatsApp: https://wa.me/26878132527",
        "pricing": "Contact us for a consultation and we'll discuss fees based on your specific legal matter."
    };

    function findAnswer(question) {
        const lower = question.toLowerCase();
        for (let [key, answer] of Object.entries(faqData)) {
            if (lower.includes(key)) return answer;
        }
        return "I didn't understand that. Try asking about: practice areas, consultation, contact, team, services, appointment, or WhatsApp booking.";
    }

    function addMessage(text, sender) {
        const container = document.getElementById('chatbot-messages');
        const msgDiv = document.createElement('div');
        msgDiv.className = 'message ' + sender;
        
        const p = document.createElement('p');
        p.textContent = text;
        msgDiv.appendChild(p);
        container.appendChild(msgDiv);
        container.scrollTop = container.scrollHeight;
    }

    document.getElementById('chatbot-send-btn').addEventListener('click', sendMessage);
    document.getElementById('chatbot-user-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') sendMessage();
    });

    function sendMessage() {
        const input = document.getElementById('chatbot-user-input');
        const message = input.value.trim();
        if (!message) return;
        
        addMessage(message, 'user');
        input.value = '';
        
        setTimeout(() => {
            const answer = findAnswer(message);
            addMessage(answer, 'bot');
        }, 500);
    }

    document.getElementById('close-chatbot').addEventListener('click', function() {
        document.getElementById('swazilegal-chatbot').style.display = 'none';
    });

    // Show initial greeting
    addMessage('👋 Hello! I\'m SwaziLegal\'s AI Assistant. How can I help you today?', 'bot');
});
</script>
```

Then add to `wp-content/themes/swazilegal-theme/footer.php` before `</body>`:

```php
<?php get_template_part('template-parts/chatbot'); ?>
```

---

## Chatbot Comparison

| Feature | Drift | Botpress | Intercom | Zendesk | Custom |
|---------|-------|----------|----------|---------|---------|
| **Setup Time** | 2 min | 5 min | 3 min | 10 min | 30 min |
| **Free Tier** | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Customization** | Medium | High | Medium | Medium | Very High |
| **Live Chat** | ✅ | ✅ | ✅ | ✅ | ❌ |
| **Coding Required** | ❌ | ❌ | ❌ | ❌ | ✅ |
| **AI Quality** | Good | Good | Very Good | Excellent | Depends |
| **Cost Scale** | $$ | $$ | $$$ | $$$$ | $ |

---

## Training Data for Chatbot

Use this template to train your chatbot with SwaziLegal-specific information:

### Practice Areas Intent
- Q: What practice areas do you serve?
- A: We provide expert legal services in Corporate & Commercial Law, Family Law, Criminal Defense, Labor & Employment Law, Property & Conveyancing, Estate Administration, Civil Litigation, and Notarial Services.

### Consultation Intent
- Q: How do I schedule a consultation?
- A: You can schedule a free consultation in three ways:
  1. Call +268 76 805 805
  2. WhatsApp +268 78132527
  3. Visit our contact page

### Contact Intent
- Q: What's your contact info?
- A: 📞 +268 2687 8132527 | 💬 WhatsApp +268 78132527 | 📧 info@swazilegal.sz | 📍 Mbabane, Eswatini

### Services Intent
- Q: What services do you offer?
- A: Legal consultation & advice, Contract drafting & review, Litigation representation, Estate planning, Corporate formation, and more!

### Team Intent
- Q: Tell me about your team
- A: Our team consists of experienced attorneys specializing in various practice areas. Visit our team page to meet our attorneys.

### Appointment Intent
- Q: What's my appointment status?
- A: To check your appointment status, please provide your phone number or contact +268 78132527

---

## Troubleshooting

### Chatbot Not Showing
1. Check browser console (F12) for JavaScript errors
2. Verify API ID/Bot ID is correct
3. Clear browser cache (Ctrl+Shift+Delete)
4. Check if script is in correct location
5. Try in incognito/private mode

### Chatbot Not Responding
1. Check internet connection
2. Verify API credentials
3. Check if chatbot service is online
4. Review chatbot training/FAQ data
5. Check browser console for errors

### Styling Issues
1. Check for CSS conflicts with theme
2. Adjust z-index if chatbot hidden behind other elements
3. Check viewport/responsive design
4. Clear WordPress cache if using caching plugin

---

## Performance Tips

1. **Lazy Load**: Load chatbot script after page content loads
2. **Minify**: Minify custom JavaScript
3. **Cache**: Enable browser caching for chatbot resources
4. **Optimize**: Compress images in chatbot responses
5. **Monitor**: Use Google Analytics to track chatbot usage

---

## Security Considerations

1. **API Keys**: Never expose API keys in frontend code (consider backend proxy)
2. **Validation**: Validate user input on backend
3. **Rate Limiting**: Implement rate limiting for API calls
4. **HTTPS**: Always use HTTPS for secure communication
5. **Privacy**: Comply with GDPR/privacy regulations for chat logs

---

## Next Steps

1. Choose your chatbot solution from the options above
2. Sign up for free account
3. Get API ID/Bot ID
4. Implement using one of the methods above
5. Train chatbot with FAQ data
6. Test across devices
7. Monitor analytics and improve

---

## Resources

- [Drift Documentation](https://docs.drift.com)
- [Botpress Documentation](https://botpress.com/docs)
- [Intercom Help](https://www.intercom.com/help)
- [Zendesk Guide](https://zendesk.com)
- [WordPress Plugin: Code Snippets](https://wordpress.org/plugins/code-snippets/)

---

## Support

For questions or issues:
- Contact SwaziLegal support
- Check chatbot provider documentation
- Review chatbot integration guide (chatbot-integration.html)
