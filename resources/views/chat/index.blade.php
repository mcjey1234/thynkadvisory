@extends('layouts.public')

@section('title', 'Chat with AI - Sofel Labs')
@section('body_class', 'page-chat')

@section('content')

<!-- ============================================ -->
<!-- CHAT HERO -->
<!-- ============================================ -->
<section class="sf-chat-hero" style="background-image: url('{{ asset('wp-content/uploads/images/chat-bg.jpg') }}');">
    <div class="sf-chat-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-chat-hero-content">
            <span class="sf-chat-hero-badge">AI Assistant</span>
            <h1 class="sf-chat-hero-title">How Can I <span class="sf-text-teal">Help You</span> Today?</h1>
            <p class="sf-chat-hero-subtitle">Ask me anything about instructional design, gamification, or learning solutions. I'm here to help!</p>
            <div class="sf-chat-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CHAT SECTION -->
<!-- ============================================ -->
<section class="sf-chat-section">
    <div class="sf-container">
        <div class="sf-chat-container">
            <!-- Chat Messages -->
            <div class="sf-chat-messages" id="chatMessages">
                <div class="sf-chat-welcome">
                    <div class="sf-chat-avatar">
                        <span>🤖</span>
                    </div>
                    <div class="sf-chat-bubble sf-chat-bubble--bot">
                        <p>👋 Hello! I'm the Sofel Labs AI Assistant.</p>
                        <p>I'm here to help you with any questions about instructional design, gamification, learning strategy, or our services.</p>
                        <p>Feel free to ask me anything, or tell me about your training challenges!</p>
                        <div class="sf-chat-suggestions">
                            <button class="sf-chat-suggestion" onclick="sendSuggestion('What services do you offer?')">What services do you offer?</button>
                            <button class="sf-chat-suggestion" onclick="sendSuggestion('How can you help with compliance training?')">How can you help with compliance training?</button>
                            <button class="sf-chat-suggestion" onclick="sendSuggestion('Tell me about gamification')">Tell me about gamification</button>
                            <button class="sf-chat-suggestion" onclick="sendSuggestion('I need help with instructional design')">I need help with instructional design</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="sf-chat-input-area">
                <form id="chatForm" class="sf-chat-form">
                    <input type="hidden" id="contactId" value="">
                    <input type="hidden" id="sessionId" value="{{ session()->getId() }}">
                    <input type="text" id="chatInput" class="sf-chat-input" placeholder="Type your message here..." autocomplete="off">
                    <button type="submit" class="sf-chat-send-btn" id="sendBtn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div class="sf-chat-typing" id="typingIndicator" style="display: none;">
                    <span class="sf-typing-dot"></span>
                    <span class="sf-typing-dot"></span>
                    <span class="sf-typing-dot"></span>
                    <span style="margin-left: 8px; color: #6B7C93; font-size: 13px;">AI is thinking...</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Chat Page -->
<!-- ============================================ -->
<style>
    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }
    .sf-text-teal {
        color: #47C89F !important;
    }

    /* ---- Hero ---- */
    .sf-chat-hero {
        position: relative !important;
        padding: 80px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 300px !important;
        display: flex !important;
        align-items: center !important;
    }
    .sf-chat-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }
    .sf-chat-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }
    .sf-chat-hero-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        color: #47C89F !important;
        background: rgba(71, 200, 159, 0.08) !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 18px !important;
    }
    .sf-chat-hero-title {
        font-size: 48px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }
    .sf-chat-hero-subtitle {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
    }
    .sf-chat-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #47C89F !important;
        border-radius: 4px !important;
        margin-top: 8px !important;
    }

    /* ---- Chat Container ---- */
    .sf-chat-section {
        padding: 40px 0 80px 0 !important;
        background: #FFFFFF !important;
    }
    .sf-chat-container {
        max-width: 800px !important;
        margin: 0 auto !important;
        background: #F8FAFB !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        overflow: hidden !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.02) !important;
    }

    /* ---- Messages ---- */
    .sf-chat-messages {
        height: 500px !important;
        overflow-y: auto !important;
        padding: 24px 28px !important;
        background: #FFFFFF !important;
    }
    .sf-chat-messages::-webkit-scrollbar {
        width: 6px !important;
    }
    .sf-chat-messages::-webkit-scrollbar-thumb {
        background: #D0D8E4 !important;
        border-radius: 10px !important;
    }
    .sf-chat-messages::-webkit-scrollbar-track {
        background: transparent !important;
    }

    /* ---- Welcome Message ---- */
    .sf-chat-welcome {
        display: flex !important;
        gap: 14px !important;
        margin-bottom: 24px !important;
    }
    .sf-chat-avatar {
        width: 40px !important;
        height: 40px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        color: #FFFFFF !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 20px !important;
        flex-shrink: 0 !important;
    }
    .sf-chat-bubble {
        max-width: 80% !important;
        padding: 14px 18px !important;
        border-radius: 12px !important;
        font-size: 15px !important;
        line-height: 1.6 !important;
        background: #F0F4F6 !important;
        color: #1A1A2E !important;
    }
    .sf-chat-bubble p {
        margin: 0 0 8px 0 !important;
    }
    .sf-chat-bubble p:last-child {
        margin-bottom: 0 !important;
    }
    .sf-chat-bubble--bot {
        background: #F0F4F6 !important;
        border-radius: 0 12px 12px 12px !important;
    }
    .sf-chat-bubble--user {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-radius: 12px 0 12px 12px !important;
        margin-left: auto !important;
    }

    /* ---- Suggestions ---- */
    .sf-chat-suggestions {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 8px !important;
        margin-top: 12px !important;
    }
    .sf-chat-suggestion {
        padding: 6px 14px !important;
        border: 1px solid rgba(71, 200, 159, 0.15) !important;
        border-radius: 20px !important;
        background: transparent !important;
        color: #47C89F !important;
        font-size: 13px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }
    .sf-chat-suggestion:hover {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-color: #47C89F !important;
        transform: translateY(-2px) !important;
    }

    /* ---- Input Area ---- */
    .sf-chat-input-area {
        padding: 16px 24px !important;
        background: #FFFFFF !important;
        border-top: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-chat-form {
        display: flex !important;
        gap: 12px !important;
    }
    .sf-chat-input {
        flex: 1 !important;
        padding: 12px 18px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        border-radius: 8px !important;
        font-size: 15px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        outline: none !important;
        transition: all 0.3s ease !important;
        background: #F8FAFB !important;
        color: #0E2A47 !important;
    }
    .sf-chat-input:focus {
        border-color: #47C89F !important;
        box-shadow: 0 0 0 3px rgba(71, 200, 159, 0.04) !important;
    }
    .sf-chat-send-btn {
        padding: 12px 24px !important;
        background: #47C89F !important;
        color: #FFFFFF !important;
        border: none !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }
    .sf-chat-send-btn:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 16px rgba(71, 200, 159, 0.12) !important;
    }
    .sf-chat-send-btn:disabled {
        opacity: 0.5 !important;
        cursor: not-allowed !important;
        transform: none !important;
    }

    /* ---- Typing Indicator ---- */
    .sf-chat-typing {
        padding: 8px 0 4px 0 !important;
        display: flex !important;
        align-items: center !important;
        gap: 4px !important;
    }
    .sf-typing-dot {
        display: inline-block !important;
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        animation: sfTypingBounce 1.4s ease-in-out infinite !important;
    }
    .sf-typing-dot:nth-child(1) { animation-delay: 0s !important; }
    .sf-typing-dot:nth-child(2) { animation-delay: 0.2s !important; }
    .sf-typing-dot:nth-child(3) { animation-delay: 0.4s !important; }

    @keyframes sfTypingBounce {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.3; }
        30% { transform: translateY(-6px); opacity: 0.8; }
    }

    /* ---- Responsive ---- */
    @media (max-width: 768px) {
        .sf-chat-hero-title {
            font-size: 32px !important;
        }
        .sf-chat-messages {
            height: 400px !important;
            padding: 16px 18px !important;
        }
        .sf-chat-bubble {
            max-width: 90% !important;
            font-size: 14px !important;
        }
        .sf-chat-input-area {
            padding: 12px 16px !important;
        }
        .sf-chat-suggestions {
            flex-direction: column !important;
        }
        .sf-chat-suggestion {
            text-align: center !important;
        }
    }
    @media (max-width: 480px) {
        .sf-chat-hero-title {
            font-size: 26px !important;
        }
        .sf-chat-messages {
            height: 350px !important;
            padding: 12px 14px !important;
        }
        .sf-chat-bubble {
            max-width: 95% !important;
            font-size: 13px !important;
            padding: 10px 14px !important;
        }
        .sf-chat-input {
            font-size: 14px !important;
            padding: 10px 14px !important;
        }
        .sf-chat-send-btn {
            padding: 10px 18px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCRIPTS — Chat Functionality -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatForm = document.getElementById('chatForm');
        const chatInput = document.getElementById('chatInput');
        const chatMessages = document.getElementById('chatMessages');
        const sendBtn = document.getElementById('sendBtn');
        const typingIndicator = document.getElementById('typingIndicator');
        const contactIdInput = document.getElementById('contactId');
        const sessionIdInput = document.getElementById('sessionId');

        let isProcessing = false;

        // Focus input on load
        chatInput.focus();

        // Handle form submission
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = chatInput.value.trim();
            if (!message || isProcessing) return;
            sendMessage(message);
        });

        // Handle Enter key
        chatInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        // Send message function
        function sendMessage(message) {
            // Add user message to chat
            addMessage(message, 'user');
            chatInput.value = '';
            isProcessing = true;
            sendBtn.disabled = true;
            typingIndicator.style.display = 'flex';

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Get CSRF token
            const token = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = token ? token.getAttribute('content') : '';

            // Send to server
            fetch('/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    message: message,
                    contact_id: contactIdInput.value || null,
                    session_id: sessionIdInput.value
                })
            })
            .then(response => response.json())
            .then(data => {
                typingIndicator.style.display = 'none';
                isProcessing = false;
                sendBtn.disabled = false;

                if (data.success) {
                    // Update contact ID if not set
                    if (!contactIdInput.value && data.contact_id) {
                        contactIdInput.value = data.contact_id;
                    }
                    // Add AI response
                    addMessage(data.message, 'bot');
                } else {
                    addMessage('Sorry, I encountered an error. Please try again.', 'bot');
                    console.error('Chat error:', data.error);
                }
                chatInput.focus();
            })
            .catch(error => {
                typingIndicator.style.display = 'none';
                isProcessing = false;
                sendBtn.disabled = false;
                addMessage('Sorry, I encountered an error. Please try again.', 'bot');
                console.error('Fetch error:', error);
                chatInput.focus();
            });
        }

        // Add message to chat
        function addMessage(text, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'sf-chat-welcome';
            
            if (sender === 'user') {
                messageDiv.style.justifyContent = 'flex-end';
                const bubble = document.createElement('div');
                bubble.className = 'sf-chat-bubble sf-chat-bubble--user';
                bubble.textContent = text;
                messageDiv.appendChild(bubble);
            } else {
                const avatar = document.createElement('div');
                avatar.className = 'sf-chat-avatar';
                avatar.innerHTML = '🤖';
                messageDiv.appendChild(avatar);
                
                const bubble = document.createElement('div');
                bubble.className = 'sf-chat-bubble sf-chat-bubble--bot';
                // Support multiple paragraphs
                const lines = text.split('\n');
                lines.forEach(line => {
                    if (line.trim()) {
                        const p = document.createElement('p');
                        p.textContent = line.trim();
                        bubble.appendChild(p);
                    }
                });
                messageDiv.appendChild(bubble);
            }
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Suggestion click handler
        window.sendSuggestion = function(text) {
            chatInput.value = text;
            chatForm.dispatchEvent(new Event('submit'));
        };
    });
</script>

@endsection