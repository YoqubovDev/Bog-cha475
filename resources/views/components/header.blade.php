<!-- Header Component -->
<header class="bg-[#0b2b4e] sticky top-0 z-[1000] shadow-xl">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center py-3 md:py-4">
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 md:gap-4 group">
                <div class="w-12 h-12 md:w-16 md:h-16 bg-white rounded-full flex items-center justify-center p-1.5 shadow-lg group-hover:scale-105 transition-transform duration-300">
                    <img src="/image/sevinch-logo.png" alt="Sevinch Logo" class="w-full h-full object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-lg md:text-2xl leading-none mb-1">Sevinch</span>
                    <span class="text-blue-200 text-[9px] md:text-xs tracking-[0.1em] uppercase font-semibold">475-chi bolalar bog'chasi</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex gap-6 xl:gap-10">
                    <li><a href="{{ route('home') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Bosh sahifa</a></li>
                    <li><a href="{{ route('news') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Yangiliklar</a></li>
                    <li><a href="{{ route('teachers') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Tarbiyachilar</a></li>
                    <li><a href="{{ route('subject') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Guruhlar</a></li>
                    <li><a href="{{ route('achievements') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Yutuqlar</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white hover:text-yellow-400 font-semibold transition-all relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-400 hover:after:w-full after:transition-all">Bog'lanish</a></li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden text-white focus:outline-none p-2 hover:bg-white/10 rounded-xl transition-all" aria-label="Menu">
                <svg id="menuIcon" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="closeIcon" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Overlay -->
    <div id="mobileNav" class="lg:hidden fixed inset-0 top-[70px] md:top-[88px] bg-[#0b2b4e]/98 backdrop-blur-lg z-[999] transform translate-x-full transition-transform duration-500 ease-in-out">
        <nav class="p-6 h-full flex flex-col justify-center">
            <ul class="flex flex-col gap-4">
                <li><a href="{{ route('home') }}" class="mobile-nav-link">Bosh sahifa</a></li>
                <li><a href="{{ route('news') }}" class="mobile-nav-link">Yangiliklar</a></li>
                <li><a href="{{ route('teachers') }}" class="mobile-nav-link">Tarbiyachilar</a></li>
                <li><a href="{{ route('subject') }}" class="mobile-nav-link">Guruhlar</a></li>
                <li><a href="{{ route('achievements') }}" class="mobile-nav-link">Yutuqlar</a></li>
                <li><a href="{{ route('contact') }}" class="mobile-nav-link">Bog'lanish</a></li>
            </ul>
            <div class="mt-12 pt-8 border-t border-white/10 text-center">
                <p class="text-blue-200 text-sm mb-4 italic">Biz bilan bog'lanish:</p>
                <a href="tel:+998910040785" class="text-white text-xl font-bold hover:text-yellow-400 transition-colors">+998 91 004 07 85</a>
            </div>
        </nav>
    </div>
</header>

<style>
    .mobile-nav-link {
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
        display: block;
        padding: 0.75rem 1rem;
        border-radius: 0.75rem;
        transition: all 0.3s;
    }
    .mobile-nav-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #facc15;
        padding-left: 1.5rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileNav = document.getElementById('mobileNav');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');
        let isMenuOpen = false;

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                mobileNav.classList.remove('translate-x-full');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                mobileNav.classList.add('translate-x-full');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleMenu);
        }

        // Close menu when clicking on links
        const mobileLinks = mobileNav.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (isMenuOpen) toggleMenu();
            });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && isMenuOpen) {
                toggleMenu();
            }
        });
    });
</script>
