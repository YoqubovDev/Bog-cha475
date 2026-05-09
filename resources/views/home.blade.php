<x-layout>
    <x-slot:extra_head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <style>
            /* Hero Slider Section */
            .main-slider { position: relative; width: 100%; height: 100vh; overflow: hidden; }
            .main-slides { display: flex; width: 100%; height: 100%; transition: transform 0.5s ease-in-out; }
            .main-slide { flex: 0 0 100%; position: relative; }
        </style>
    </x-slot:extra_head>

    <!-- Hero Slider Section -->
    <section class="main-slider">
        <div class="main-slides">
            <!-- Slide 1 -->
            <div class="main-slide">
                <img src="/image/image.png" alt="Campus Building" class="w-full h-full object-cover">
                <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
                    <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
                        <span class="mr-2"><i class="fas fa-graduation-cap"></i></span>
                        bilim innovatsiyaga yo‘li
                    </p>
                    <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Sevinch - 475-chi sonli bolalar bog'chasi bilan</h3>
                    <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">Kelajagingni kashf et</h2>
                    <p class="text-lg max-w-2xl text-center mb-12 font-light">Zehinlilarni tarbiyalaymiz, yetakchilarni voyaga yetkazamiz. Bugunoq jonli va faol akademik hamjamiyatimizga qo‘shiling.</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="main-slide">
                <img src="/image/image copy.png" alt="Student Life" class="w-full h-full object-cover">
                <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
                    <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
                        <span class="mr-2"><i class="fas fa-users"></i></span>
                        Birlik va mukammallik
                    </p>
                    <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Biz bilan</h3>
                    <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">O‘z ishtiyoqingni angla</h2>
                    <p class="text-lg max-w-2xl text-center mb-12 font-light">Huradan tortib fanlargacha – bizning qo‘llab-quvvatlovchi muhitimizda o‘z yo‘lingizni toping.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="main-slide">
                <img src="/image/image copy 2.png" alt="Research Lab" class="w-full h-full object-cover">
                <div class="absolute inset-0 gradient-overlay flex flex-col items-center justify-center text-white">
                    <p class="text-white mb-4 flex items-center font-light tracking-widest uppercase text-sm">
                        <span class="mr-2"><i class="fas fa-microscope"></i></span>
                        Tadqiqot va innovatsiya
                    </p>
                    <h2 class="text-6xl md:text-7xl font-serif mb-4 text-center hero-text-shadow font-bold">Ertangi kuningni</h2>
                    <h3 class="text-5xl md:text-6xl font-serif mb-10 text-center hero-text-shadow">Bugun qur</h3>
                    <p class="text-lg max-w-2xl text-center mb-12 font-light">Zamonaviy jihozlangan infratuzilmamiz ilg‘or tadqiqotlar va innovatsiyalarni qo‘llab-quvvatlaydi.</p>
                </div>
            </div>
        </div>

        <!-- Navigation Dots -->
        <div class="absolute bottom-12 left-0 right-0 flex justify-center space-x-6">
            <div class="flex space-x-2 slide-dots">
                <span class="w-8 h-2 bg-white rounded-full bg-opacity-80 dot active" data-index="0"></span>
                <span class="w-2 h-2 bg-white rounded-full bg-opacity-50 dot" data-index="1"></span>
                <span class="w-2 h-2 bg-white rounded-full bg-opacity-50 dot" data-index="2"></span>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="slider-prev absolute left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-10 backdrop-blur-sm rounded-full border border-white text-white flex items-center justify-center focus:outline-none hover:bg-white hover:bg-opacity-20 transition-all duration-300">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-next absolute right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white bg-opacity-10 backdrop-blur-sm rounded-full border border-white text-white flex items-center justify-center focus:outline-none hover:bg-white hover:bg-opacity-20 transition-all duration-300">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>

    <!-- Images Section -->
    <section class="py-20 bg-gray-50" x-data="{ showModal: false, imageUrl: '' }">
        <div class="container mx-auto px-4">
            <h3 class="text-4xl font-extrabold text-blue-900 mb-12 text-center">Tadbir Rasmlari</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-10">
                @foreach($qabulrasmis as $rasm)
                    <div class="bg-white shadow-2xl rounded-3xl p-6 hover:shadow-3xl transition-shadow duration-300">
                        <div class="w-full aspect-[4/5] overflow-hidden rounded-2xl border-2 border-blue-200 cursor-pointer"
                             @click="showModal = true; imageUrl = '{{ asset('storage/' . $rasm->image) }}'">
                            <img src="{{ asset('storage/' . $rasm->image) }}"
                                 alt="Qabul rasmi"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 rounded-2xl">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal"
             class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[2000]"
             x-transition>
            <div class="relative max-w-4xl w-full px-4">
                <button @click="showModal = false"
                        class="absolute -top-12 right-4 text-white text-4xl font-bold hover:text-red-500">&times;</button>
                <img :src="imageUrl" class="w-full h-auto rounded-xl border-4 border-white shadow-2xl">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-white py-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold text-unipix-blue mb-8">Biz Haqimizda</h2>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Sevinch - 475-chi sonli bolalar bog'chasi ta'lim, innovatsiya va rivojlanish markazi. Bizning asosiy maqsadimiz nafaqat bolalarga bilim berish, balki ularni kelajakdagi muvaffaqiyatli hayotga tayyorlashdir.
                    </p>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-blue-900 mb-1">Professional tarbiyachilar</h4>
                                <p class="text-gray-500">Tajribali va yuqori malakali pedagoglar jamoasi.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-lightbulb text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-blue-900 mb-1">Innovatsion metodlar</h4>
                                <p class="text-gray-500">Zamonaviy interfaol ta'lim usullaridan foydalanish.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <img src="/image/orig.jpeg" alt="About Image" class="rounded-3xl shadow-2xl">
                    <div class="absolute -bottom-6 -left-6 bg-yellow-400 p-8 rounded-3xl shadow-xl hidden md:block">
                        <p class="text-blue-900 font-black text-3xl">2k+</p>
                        <p class="text-blue-900 font-bold uppercase tracking-widest text-xs">Bitiruvchilar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-4 block">Bizning jamoa</span>
                <h3 class="text-4xl md:text-5xl font-bold text-blue-900">Sevinch 475 Rahbariyati</h3>
            </div>

            @foreach($categories as $category)
                <div class="mb-20">
                    <div class="flex items-center gap-4 mb-10">
                        <h4 class="text-2xl font-bold text-blue-600 pr-4 whitespace-nowrap">{{ $category->category }}</h4>
                        <div class="h-0.5 bg-blue-100 w-full"></div>
                    </div>
                    
                    @if($category->teachers->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                            @foreach($category->teachers as $teacher)
                                <div class="staff-card relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-8 text-center cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl"
                                     data-name="{{ e($teacher->name) }}"
                                     data-role="{{ e($teacher->category->category) }}"
                                     data-bio="{{ e($teacher->bio) }}"
                                     data-image="{{ asset('storage/' . $teacher->image) }}">
                                    <div class="w-32 h-32 mx-auto mb-6 relative">
                                        <div class="absolute inset-0 border-2 border-blue-200 rounded-full scale-110"></div>
                                        <img src="{{ asset('storage/' . $teacher->image) }}"
                                             class="w-full h-full object-cover rounded-full"
                                             alt="{{ $teacher->name }}">
                                    </div>
                                    <h4 class="text-xl font-bold text-blue-900 mb-1">{{ $teacher->name }}</h4>
                                    <p class="text-blue-500 font-medium text-sm mb-4">{{ $teacher->category->category }}</p>
                                    <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">{{ $teacher->bio }}</p>
                                    <div class="mt-6 pt-6 border-t border-gray-100 flex justify-center">
                                        <span class="inline-flex items-center text-blue-600 text-xs font-bold uppercase tracking-widest transition-colors hover:text-blue-800">
                                            Batafsil
                                            <i class="fas fa-chevron-right ml-2 text-[10px]"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                            <i class="fas fa-user-slash text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-400 font-medium italic">Ushbu bo'limda hozircha xodimlar mavjud emas</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div id="staffModal" class="fixed inset-0 z-[2000] hidden items-center justify-center bg-slate-950/95 p-6 backdrop-blur-md">
            <div class="relative w-full max-w-5xl overflow-hidden rounded-[2.5rem] bg-white shadow-2xl">
                <button id="staffModalClose" class="absolute right-6 top-6 z-10 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white text-slate-600 shadow-xl transition hover:rotate-90 hover:bg-red-50 hover:text-red-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>

                <div class="md:flex h-full max-h-[90vh] overflow-y-auto custom-scrollbar">
                    <div class="md:w-1/3 bg-gradient-to-b from-blue-50 to-white p-10 text-center sticky top-0 md:relative">
                        <div class="relative mx-auto mb-8 h-64 w-64 md:h-72 md:w-72 overflow-hidden rounded-full border-8 border-white shadow-2xl">
                            <img id="staffModalImage" src="" alt="Staff" class="h-full w-full object-cover">
                        </div>
                        <h3 id="staffModalName" class="text-3xl font-black text-blue-900 leading-tight mb-3"></h3>
                        <p id="staffModalRole" class="mx-auto inline-flex rounded-full bg-blue-600 px-6 py-2 text-xs uppercase tracking-[0.2em] text-white shadow-lg font-bold"></p>
                    </div>

                    <div class="md:w-2/3 p-10 md:p-14 bg-white">
                        <div class="grid gap-4 sm:grid-cols-2 mb-10">
                            <div class="rounded-3xl border border-blue-100 bg-blue-50 p-6">
                                <p class="text-[10px] font-black uppercase tracking-widest text-blue-600 mb-2">Tajriba</p>
                                <p class="text-lg font-bold text-blue-900">10+ yillik malaka</p>
                            </div>
                            <div class="rounded-3xl border border-yellow-100 bg-yellow-50 p-6">
                                <p class="text-[10px] font-black uppercase tracking-widest text-yellow-600 mb-2">Tillar</p>
                                <p class="text-lg font-bold text-blue-900">O'zbek, Rus</p>
                            </div>
                        </div>

                        <h4 class="mb-6 text-xl font-black text-blue-900 uppercase tracking-widest">Biografiya</h4>
                        <p id="staffModalBio" class="text-gray-600 text-lg leading-relaxed whitespace-pre-line"></p>

                        <div class="mt-12 flex flex-wrap gap-3">
                            <span class="rounded-2xl bg-slate-100 px-6 py-3 text-sm font-bold text-slate-700">Oliy ma'lumotli</span>
                            <span class="rounded-2xl bg-slate-100 px-6 py-3 text-sm font-bold text-slate-700">Toifali mutaxassis</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot:extra_scripts>
        <script>
            // Hero Slider
            document.addEventListener('DOMContentLoaded', function() {
                const mainSlides = document.querySelector('.main-slides');
                const dots = document.querySelectorAll('.dot');
                const slides = document.querySelectorAll('.main-slide');
                const prev = document.querySelector('.slider-prev');
                const next = document.querySelector('.slider-next');
                let current = 0;

                function update() {
                    mainSlides.style.transform = `translateX(-${current * 100}%)`;
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === current);
                        dot.classList.toggle('w-8', index === current);
                        dot.classList.toggle('w-2', index !== current);
                    });
                }

                next.addEventListener('click', () => {
                    current = (current + 1) % slides.length;
                    update();
                });

                prev.addEventListener('click', () => {
                    current = (current - 1 + slides.length) % slides.length;
                    update();
                });

                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        current = parseInt(dot.dataset.index);
                        update();
                    });
                });

                setInterval(() => {
                    current = (current + 1) % slides.length;
                    update();
                }, 6000);

                // Staff Modal
                const staffCards = document.querySelectorAll('.staff-card');
                const modal = document.getElementById('staffModal');
                const close = document.getElementById('staffModalClose');

                staffCards.forEach(card => {
                    card.addEventListener('click', () => {
                        document.getElementById('staffModalImage').src = card.dataset.image;
                        document.getElementById('staffModalName').textContent = card.dataset.name;
                        document.getElementById('staffModalRole').textContent = card.dataset.role;
                        document.getElementById('staffModalBio').textContent = card.dataset.bio;
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    });
                });

                close.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.style.overflow = '';
                });

                modal.addEventListener('click', (e) => {
                    if (e.target === modal) close.click();
                });
            });
        </script>
    </x-slot:extra_scripts>
</x-layout>
