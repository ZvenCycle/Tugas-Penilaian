<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chat Assistant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-purple-600 to-purple-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-xl">FoodMarket</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-300 hover:bg-purple-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="/ai" class="text-white bg-purple-700 px-3 py-2 rounded-md text-sm font-medium">AI Assistant</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-4 bg-purple-600 text-white">
                <h1 class="text-2xl font-bold">AI Chat Assistant</h1>
            </div>
            
            <div id="chat-messages" class="p-4 h-96 overflow-y-auto space-y-4">
                <!-- Chat messages will appear here -->
            </div>

            <div class="p-4 border-t">
                <form id="chat-form" class="flex space-x-2">
                    <input type="text" id="user-input" 
                           class="flex-1 p-2 border rounded-lg focus:outline-none focus:border-purple-500" 
                           placeholder="Ketik pertanyaan Anda di sini...">
                    <button type="submit" 
                            class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const input = document.getElementById('user-input');
        const message = input.value.trim();
        
        if (message) {
            // Add user message
            addMessage('user', message);
            input.value = '';
            
            // Simulate AI response (replace with actual AI integration)
            setTimeout(() => {
                const response = getAIResponse(message);
                addMessage('ai', response);
            }, 1000);
        }
    });

    function addMessage(type, text) {
        const messages = document.getElementById('chat-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${type === 'user' ? 'justify-end' : 'justify-start'}`;
        
        const bubble = document.createElement('div');
        bubble.className = `max-w-xs p-3 rounded-lg ${
            type === 'user' ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-800'
        }`;
        bubble.textContent = text;
        
        messageDiv.appendChild(bubble);
        messages.appendChild(messageDiv);
        messages.scrollTop = messages.scrollHeight;
    }

    function getAIResponse(message) {
        // Replace this with actual AI integration
        const responses = {
            'halo': 'Hai! Ada yang bisa saya bantu?',
            'menu': 'Kami memiliki berbagai menu makanan dan minuman. Anda bisa melihatnya di halaman utama.',
            'lokasi': 'Kami berlokasi di [Alamat Restoran]. Silakan kunjungi kami!',
            'jam buka': 'Kami buka setiap hari dari jam 10:00 - 22:00 WIB.',
            'reservasi': 'Untuk reservasi, silakan hubungi nomor kami di [Nomor Telepon].',
        };

        const defaultResponse = 'Maaf, saya tidak mengerti pertanyaan Anda. Bisa tolong diulangi dengan cara yang berbeda?';
        
        // Simple keyword matching
        for (const [key, value] of Object.entries(responses)) {
            if (message.toLowerCase().includes(key)) {
                return value;
            }
        }
        
        return defaultResponse;
    }
    </script>
</body>
</html>