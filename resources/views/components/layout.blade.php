<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sevinch - 475-chi bolalar bog\'chasi' }}</title>
    
    <!-- Core Assets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="icon" href="/image/sevinch-logo.png" type="image/png">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'unipix-blue': '#161179',
                        'unipix-light': '#2a2a9e',
                        'unipix-dark': '#0c0950',
                        'turin-green': '#16A34A',
                        'turin-dark': '#003366',
                    },
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        'elegant': '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        .hero-text-shadow { text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); }
        .gradient-overlay { background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(22,17,121,0.7) 100%); }

        /* Modern Image Protection CSS */
        img {
            -webkit-user-drag: none;
            -khtml-user-drag: none;
            -moz-user-drag: none;
            -o-user-drag: none;
            user-drag: none;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: auto; /* Allow clicks but block context menu via JS */
        }

        /* Anti-Screenshot blur when focus is lost (optional but effective) */
        .screenshot-protected {
            transition: filter 0.3s ease;
        }
        .blur-content {
            filter: blur(20px) !important;
        }

        /* Print protection */
        @media print {
            body { display: none !important; }
        }
    </style>
    
    {{ $extra_head ?? '' }}
</head>
<body class="bg-gray-50 flex flex-col min-h-screen screenshot-protected" oncopy="return false" oncut="return false">

    <x-header />

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-footer />

    <!-- Anti-Copy & Anti-Screenshot Protection Scripts -->
    <script>
        // Disable Right Click with a message (optional)
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            // alert('Rasmlarni ko\'chirish taqiqlangan!'); // Optional alert
            return false;
        });

        // Disable Keyboard Shortcuts
        document.addEventListener('keydown', function(e) {
            // F12 (123), Ctrl+Shift+I (73), Ctrl+Shift+J (74), Ctrl+U (85), Ctrl+S (83), Ctrl+P (80), Ctrl+Shift+C (67)
            if (
                e.keyCode === 123 || 
                (e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74 || e.keyCode === 67)) ||
                (e.ctrlKey && (e.keyCode === 85 || e.keyCode === 83 || e.keyCode === 80)) ||
                (e.metaKey && e.altKey && e.keyCode === 73) // Mac Cmd+Opt+I
            ) {
                e.preventDefault();
                return false;
            }
        });

        // Disable Dragging Images
        document.addEventListener('dragstart', function(e) {
            if (e.target.nodeName === 'IMG') {
                e.preventDefault();
            }
        });

        // Anti-Screenshot: Blur screen when focus is lost
        // This makes it harder to use external screenshot tools that take focus
        window.addEventListener('blur', function() {
            document.body.classList.add('blur-content');
        });
        window.addEventListener('focus', function() {
            document.body.classList.remove('blur-content');
        });

        // Advanced: Prevent PrintScreen (Partially works on some browsers/OS)
        document.addEventListener('keyup', function(e) {
            if (e.keyCode == 44) { // PrintScreen key
                copyToClipboard();
                // alert('Screenshot olish taqiqlangan!');
            }
        });

        function copyToClipboard() {
            var aux = document.createElement("input");
            aux.setAttribute("value", "Screenshotlar taqiqlangan! - Sevinch 475");
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }

        // Detect DevTools opening (more robust check)
        (function() {
            var element = new Image();
            Object.defineProperty(element, 'id', {
                get: function() {
                    // DevTools is open
                    // window.location.reload(); 
                }
            });
            console.log(element);
        })();
    </script>

    {{ $extra_scripts ?? '' }}
</body>
</html>
