<div class="concierge-widget" style="position: fixed; bottom: 20px; right: 20px; z-index: 1001;">
    <button class="concierge-button" id="conciergeBtn" style="width: 60px; height: 60px; background: var(--primary-color); border: none; border-radius: 50%; color: white; font-size: 1.5rem; cursor: pointer; box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center;">
        <i class="fas fa-comments"></i>
    </button>
    
    <div class="concierge-chat" id="conciergeChat" style="position: absolute; bottom: 80px; right: 0; width: 320px; background: white; border-radius: 15px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); display: none; overflow: hidden;">
        <div class="chat-header" style="background: var(--primary-color); color: white; padding: 1rem; display: flex; align-items: center; gap: 0.75rem;">
            <div class="chat-avatar" style="width: 40px; height: 40px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-color); font-size: 1.2rem;">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="chat-info">
                <h4 style="margin: 0; font-size: 1rem;">MatFam Concierge</h4>
                <p style="margin: 0; font-size: 0.8rem; opacity: 0.9;">Online now</p>
            </div>
            <button class="chat-close" id="chatClose" style="margin-left: auto; background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer; padding: 0.25rem;">×</button>
        </div>
        
        <div class="chat-body" id="chatBody" style="padding: 1rem; max-height: 300px; overflow-y: auto;">
            <div class="chat-message" style="margin-bottom: 1rem; display: flex; align-items: flex-start; gap: 0.5rem;">
                <div class="message-avatar" style="width: 30px; height: 30px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem; flex-shrink: 0;">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="message-content" style="background: #f8f9fa; padding: 0.75rem; border-radius: 10px; font-size: 0.9rem; line-height: 1.4;">
                    Welcome to MatFam Resort! I'm here to assist you with reservations, amenities, and any questions you may have. How can I help you today?
                </div>
            </div>
            
            <div class="quick-actions" style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                <button class="quick-action" data-message="I'd like to make a reservation" style="background: #e3f2fd; color: var(--primary-color); border: none; padding: 0.5rem 0.75rem; border-radius: 15px; font-size: 0.8rem; cursor: pointer; transition: background 0.2s;">Make Reservation</button>
                <button class="quick-action" data-message="What amenities do you offer?" style="background: #e3f2fd; color: var(--primary-color); border: none; padding: 0.5rem 0.75rem; border-radius: 15px; font-size: 0.8rem; cursor: pointer; transition: background 0.2s;">View Amenities</button>
                <button class="quick-action" data-message="I need help with my booking" style="background: #e3f2fd; color: var(--primary-color); border: none; padding: 0.5rem 0.75rem; border-radius: 15px; font-size: 0.8rem; cursor: pointer; transition: background 0.2s;">Booking Help</button>
                <button class="quick-action" data-message="What are your room rates?" style="background: #e3f2fd; color: var(--primary-color); border: none; padding: 0.5rem 0.75rem; border-radius: 15px; font-size: 0.8rem; cursor: pointer; transition: background 0.2s;">Room Rates</button>
            </div>
        </div>
        
        <div class="chat-input" style="padding: 1rem; border-top: 1px solid #eee;">
            <div class="chat-input-group" style="display: flex; gap: 0.5rem;">
                <input type="text" id="chatInput" placeholder="Type your message..." style="flex: 1; padding: 0.75rem; border: 1px solid #ddd; border-radius: 20px; font-size: 0.9rem; outline: none;">
                <button class="chat-send" id="chatSend" style="background: var(--primary-color); color: white; border: none; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .concierge-button:hover {
        background: var(--primary-dark) !important;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
    }

    .concierge-chat.active {
        display: block !important;
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .quick-action:hover {
        background: #bbdefb !important;
    }

    .chat-input input:focus {
        border-color: var(--primary-color);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .concierge-widget {
            bottom: 15px !important;
            right: 15px !important;
        }
        
        .concierge-button {
            width: 55px !important;
            height: 55px !important;
            font-size: 1.3rem !important;
        }
        
        .concierge-chat {
            width: calc(100vw - 30px) !important;
            right: -10px !important;
            bottom: 75px !important;
        }
    }

    @media (max-width: 480px) {
        .concierge-chat {
            width: calc(100vw - 20px) !important;
            right: -5px !important;
        }
    }
</style>
