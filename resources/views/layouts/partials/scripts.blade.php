<script>
// Common JavaScript for MatFam Resort
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');

    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            
            // Update icon
            const icon = this.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenuBtn.contains(e.target) && !navLinks.contains(e.target)) {
                navLinks.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Header scroll effect
    const header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'var(--bg-primary)';
                header.style.backdropFilter = 'none';
            }
        });
    }

    // Concierge Chat Functionality
    const conciergeBtn = document.getElementById('conciergeBtn');
    const conciergeChat = document.getElementById('conciergeChat');
    const chatClose = document.getElementById('chatClose');
    const chatInput = document.getElementById('chatInput');
    const chatSend = document.getElementById('chatSend');
    const chatBody = document.getElementById('chatBody');

    if (conciergeBtn && conciergeChat) {
        // Toggle chat visibility
        conciergeBtn.addEventListener('click', function() {
            conciergeChat.classList.toggle('active');
            if (conciergeChat.classList.contains('active')) {
                chatInput && chatInput.focus();
            }
        });

        // Close chat
        if (chatClose) {
            chatClose.addEventListener('click', function() {
                conciergeChat.classList.remove('active');
            });
        }

        // Send message function
        function sendMessage(message) {
            if (!message.trim()) return;
            
            // Add user message
            const userMessage = document.createElement('div');
            userMessage.className = 'chat-message';
            userMessage.style.cssText = 'margin-bottom: 1rem; display: flex; align-items: flex-start; gap: 0.5rem;';
            userMessage.innerHTML = `
                <div style="background: var(--primary-color); color: white; margin-left: auto; padding: 0.75rem; border-radius: 10px; font-size: 0.9rem; line-height: 1.4; max-width: 70%;">
                    ${message}
                </div>
            `;
            chatBody.appendChild(userMessage);
            
            // Simulate concierge response
            setTimeout(() => {
                const responses = [
                    "Thank you for your inquiry! I'll be happy to help you with that. Let me get the information for you.",
                    "Excellent choice! Our team will assist you with your request. Is there anything specific you'd like to know?",
                    "I'd be delighted to help you with that. Our luxury amenities are designed to exceed your expectations.",
                    "Perfect! I'll connect you with our reservations team right away. They'll take care of everything for you.",
                    "Great question! Our rates vary by season and room type. I'll send you our current availability and pricing."
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                
                const conciergeMessage = document.createElement('div');
                conciergeMessage.className = 'chat-message';
                conciergeMessage.style.cssText = 'margin-bottom: 1rem; display: flex; align-items: flex-start; gap: 0.5rem;';
                conciergeMessage.innerHTML = `
                    <div style="width: 30px; height: 30px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem; flex-shrink: 0;">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div style="background: #f8f9fa; padding: 0.75rem; border-radius: 10px; font-size: 0.9rem; line-height: 1.4;">
                        ${randomResponse}
                    </div>
                `;
                chatBody.appendChild(conciergeMessage);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 1000);
            
            chatBody.scrollTop = chatBody.scrollHeight;
            if (chatInput) chatInput.value = '';
        }

        // Send message on button click
        if (chatSend) {
            chatSend.addEventListener('click', function() {
                sendMessage(chatInput.value);
            });
        }

        // Send message on Enter key
        if (chatInput) {
            chatInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage(chatInput.value);
                }
            });
        }

        // Quick action buttons
        document.querySelectorAll('.quick-action').forEach(button => {
            button.addEventListener('click', function() {
                const message = this.getAttribute('data-message');
                sendMessage(message);
            });
        });

        // Close chat when clicking outside
        document.addEventListener('click', function(e) {
            if (!conciergeChat.contains(e.target) && !conciergeBtn.contains(e.target)) {
                conciergeChat.classList.remove('active');
            }
        });
    }

    // Form enhancements
    document.querySelectorAll('.form-group input, .form-group select').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else if (this.value) {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });

    // Button ripple effect
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                background: rgba(255,255,255,0.6);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add ripple animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .btn {
        position: relative;
        overflow: hidden;
    }
    
    .form-group.focused label {
        color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .is-valid {
        border-color: #28a745 !important;
    }
    
    .is-invalid {
        border-color: #dc3545 !important;
    }
`;
document.head.appendChild(style);

// Global utility functions
window.MatFam = {
    // Show notification
    notify: function(message, type = 'info') {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: ${type === 'success' ? '#28a745' : type === 'error' ? '#dc3545' : 'var(--primary-color)'};
            color: white;
            border-radius: var(--border-radius);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
        `;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    },
    
    // Format currency
    formatCurrency: function(amount, currency = 'KES') {
        return new Intl.NumberFormat('en-KE', {
            style: 'currency',
            currency: currency
        }).format(amount);
    },
    
    // Format date
    formatDate: function(date, options = {}) {
        return new Intl.DateFormat('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            ...options
        }).format(new Date(date));
    }
};

// Add notification animations
const notificationStyle = document.createElement('style');
notificationStyle.textContent = `
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }
`;
document.head.appendChild(notificationStyle);
</script>
