/**
 * SwaziLegal Chatbot Widget JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // FAQ Knowledge Base
    const faqData = {
        "practice areas": "We provide expert legal services in Corporate & Commercial Law, Family Law, Criminal Defense, Labor & Employment Law, Property & Conveyancing, Estate Administration, Civil Litigation, and Notarial Services.",
        
        "corporate law": "Our Corporate & Commercial Law services include business formation, contract drafting, mergers & acquisitions, and corporate compliance.",
        
        "family law": "We handle family law matters including divorce, child custody, adoption, inheritance, and family disputes.",
        
        "criminal defense": "Our criminal defense team represents clients in all types of criminal cases with experienced legal representation.",
        
        "litigation": "We provide comprehensive civil litigation services for disputes and legal conflicts.",
        
        "consultation": "You can schedule a free consultation by calling +268 76 805 805, WhatsApp +268 78132527, or visiting our contact page.",
        
        "schedule": "To book an appointment:\n1. Call: +268 76 805 805\n2. WhatsApp: +268 78132527\n3. Visit: swazilegal.sz/contact",
        
        "contact": "📞 Phone: +268 2687 8132527\n💬 WhatsApp: +268 78132527\n📧 Email: info@swazilegal.sz\n📍 Mbabane, Eswatini",
        
        "team": "Our experienced team consists of qualified attorneys specializing in various practice areas. Visit our team page to meet our attorneys.",
        
        "services": "Visit our services page to learn about all available legal services including consultation, representation, and specialized legal work.",
        
        "appointment": "To check your appointment status or reschedule, please provide your phone number or contact +268 78132527.",
        
        "whatsapp": "Book via WhatsApp: https://wa.me/26878132527\nSend your details (name, date, service type) and our team will confirm.",
        
        "pricing": "Contact us for a consultation and we'll discuss fees based on your specific legal matter and requirements.",
        
        "hours": "Contact us at +268 78132527 to inquire about our business hours and availability.",
        
        "location": "We're located in Mbabane, Eswatini. Contact us for our exact address and directions.",
        
        "experienced": "Our team has extensive experience in multiple practice areas with proven track record of successful cases.",
        
        "emergency": "For urgent legal matters, call +268 78132527 and our team will assist you immediately.",
        
        "testimonials": "Visit our website to read testimonials from satisfied clients about their experience with SwaziLegal.",
        
        "guarantee": "We're committed to providing quality legal services with your best interests in mind."
    };
    
    // Initialize chatbot
    const chatWidget = document.getElementById('swazilegal-chatbot');
    if (!chatWidget) return;
    
    const messagesContainer = document.getElementById('chatbot-messages');
    const userInput = document.getElementById('chatbot-user-input');
    const sendBtn = document.getElementById('chatbot-send-btn');
    const closeBtn = document.getElementById('close-chatbot');
    
    // Show initial greeting after brief delay
    setTimeout(() => {
        addMessage('👋 Hello! I\'m SwaziLegal\'s AI Assistant. How can I help you today?', 'bot');
    }, 500);
    
    // Event listeners
    sendBtn.addEventListener('click', sendMessage);
    closeBtn.addEventListener('click', toggleChatbot);
    userInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
    
    /**
     * Send user message
     */
    function sendMessage() {
        const message = userInput.value.trim();
        if (!message) return;
        
        addMessage(message, 'user');
        userInput.value = '';
        userInput.focus();
        
        // Show typing indicator
        addTypingIndicator();
        
        // Simulate API call delay
        setTimeout(() => {
            removeTypingIndicator();
            const answer = findAnswer(message);
            addMessage(answer, 'bot');
        }, 500 + Math.random() * 500);
    }
    
    /**
     * Find answer from FAQ database
     */
    function findAnswer(question) {
        const lower = question.toLowerCase();
        
        // Direct keyword matching
        for (let [key, answer] of Object.entries(faqData)) {
            if (lower.includes(key)) {
                return answer;
            }
        }
        
        // Partial matching
        for (let [key, answer] of Object.entries(faqData)) {
            if (lower.includes(key.substring(0, 3))) {
                return answer;
            }
        }
        
        // Default response
        const suggestions = [
            "I didn't quite understand that. ",
            "Could you rephrase that? ",
            "Sorry, I'm not sure about that. "
        ];
        
        const defaultResponse = suggestions[Math.floor(Math.random() * suggestions.length)];
        
        return defaultResponse + 'Try asking about:\n• Practice areas\n• Consultation & booking\n• Contact information\n• Our team\n• Services offered';
    }
    
    /**
     * Add message to chat
     */
    function addMessage(text, sender) {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'message ' + sender;
        
        const p = document.createElement('p');
        p.textContent = text;
        msgDiv.appendChild(p);
        
        messagesContainer.appendChild(msgDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        // Add read more functionality for long messages
        if (text.length > 150) {
            p.style.cursor = 'pointer';
            p.title = 'Click for more details or contact us';
        }
    }
    
    /**
     * Add typing indicator
     */
    function addTypingIndicator() {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'message bot typing-indicator';
        msgDiv.id = 'typing-indicator';
        
        const p = document.createElement('p');
        p.innerHTML = '<span></span><span></span><span></span>';
        p.style.padding = '0.5rem 1rem';
        msgDiv.appendChild(p);
        
        messagesContainer.appendChild(msgDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
    
    /**
     * Remove typing indicator
     */
    function removeTypingIndicator() {
        const indicator = document.getElementById('typing-indicator');
        if (indicator) {
            indicator.remove();
        }
    }
    
    /**
     * Toggle chatbot visibility
     */
    function toggleChatbot() {
        chatWidget.classList.toggle('minimized');
    }
    
    /**
     * Add some animation styles for typing indicator
     */
    const style = document.createElement('style');
    style.textContent = `
        .typing-indicator p span {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #999;
            margin: 0 2px;
            animation: typing 1.4s infinite;
        }
        
        .typing-indicator p span:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-indicator p span:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
                opacity: 0.5;
            }
            30% {
                transform: translateY(-10px);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
});
