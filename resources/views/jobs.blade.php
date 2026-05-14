<x-layout>
    <x-slot:title>Bo'sh ish o'rinlari - Sevinch 475</x-slot:title>

    <x-slot:extra_head>
        <style>
            .job-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
            .job-card:hover { transform: translateY(-8px); shadow: 0 20px 40px rgba(0,0,0,0.08); }
            .benefit-icon { transition: all 0.3s ease; }
            .job-card:hover .benefit-icon { transform: scale(1.1) rotate(5deg); }
            .apply-btn { background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); }
            @keyframes bounce-short {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
            .animate-bounce-short { animation: bounce-short 0.5s ease-in-out 2; }
        </style>
    </x-slot:extra_head>

    <!-- Hero Section -->
    <section class="py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-unipix-dark text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-widest uppercase bg-blue-500/30 backdrop-blur-md rounded-full border border-blue-400/30">
                Karyera imkoniyatlari
            </span>
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-8 leading-tight">Bizning Jamoaga <br><span class="text-yellow-400">Qo'shiling</span></h1>
            <p class="text-blue-100 max-w-2xl mx-auto text-xl leading-relaxed font-light mb-12">
                Sevinch 475-sonli bog'chasi o'z ishining ustasi bo'lgan, bolalarni sevuvchi va innovatsion ta'limga qiziquvchi mutaxassislarni qidirmoqda.
            </p>
            <a href="#vacancies" class="inline-flex items-center px-8 py-4 bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold rounded-2xl transition-all shadow-lg shadow-yellow-400/20 group">
                Vakansiyalarni ko'rish
                <i class="fas fa-arrow-down ml-3 group-hover:translate-y-1 transition-transform"></i>
            </a>
        </div>
    </section>

    <!-- Why Work With Us -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold text-blue-900 mb-8">Nima uchun biz bilan ishlash kerak?</h2>
                    <div class="space-y-8">
                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center flex-shrink-0 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                                <i class="fas fa-chart-line text-2xl benefit-icon"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-blue-900 mb-2">Professional o'sish</h4>
                                <p class="text-gray-500 leading-relaxed">Doimiy treninglar, seminar va mahorat darslari orqali malakangizni oshirib borasiz.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center flex-shrink-0 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                                <i class="fas fa-heart text-2xl benefit-icon"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-blue-900 mb-2">Ahil jamoa</h4>
                                <p class="text-gray-500 leading-relaxed">Bizda o'zaro hurmat va qo'llab-quvvatlashga asoslangan samimiy muhit shakllangan.</p>
                            </div>
                        </div>
                        <div class="flex gap-6 group">
                            <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center flex-shrink-0 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                                <i class="fas fa-shield-alt text-2xl benefit-icon"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-blue-900 mb-2">Ijtimoiy himoya</h4>
                                <p class="text-gray-500 leading-relaxed">Raqobatbardosh ish haqi, mukofot pullari va to'liq ijtimoiy paket taqdim etiladi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl">
                        <img src="{{ asset('image/sevinch-logo.png') }}" alt="Working Environment" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-yellow-400 rounded-full -z-10 opacity-20 blur-2xl"></div>
                    <div class="absolute -top-10 -left-10 w-48 h-48 bg-blue-400 rounded-full -z-10 opacity-20 blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vacancies List -->
    <section id="vacancies" class="py-24 bg-slate-50" x-data="{ showModal: false, selectedJob: '' }">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-blue-900 mb-4">Bo'sh ish o'rinlari</h3>
                <p class="text-gray-500 max-w-xl mx-auto">Hozirda mavjud bo'lgan vakansiyalar bilan tanishing va o'z arizangizni qoldiring.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($jobs as $job)
                    <!-- Job Card -->
                    <div class="job-card bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm flex flex-col h-full">
                        <div class="flex justify-between items-start mb-6">
                            <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                                <i class="{{ $job->icon ?? 'fas fa-briefcase' }} text-2xl"></i>
                            </div>
                            <span class="px-4 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">{{ $job->type }}</span>
                        </div>
                        <h4 class="text-2xl font-bold text-blue-900 mb-3">{{ $job->title }}</h4>
                        <p class="text-gray-500 text-sm mb-6 flex-grow leading-relaxed">
                            {{ $job->description }}
                        </p>
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center text-sm text-slate-600">
                                <i class="fas fa-money-bill-wave w-6 text-blue-500"></i>
                                <span>Maosh: {{ $job->salary ?? 'Kelishilgan holda' }}</span>
                            </div>
                            <div class="flex items-center text-sm text-slate-600">
                                <i class="fas fa-map-marker-alt w-6 text-blue-500"></i>
                                <span>Manzil: {{ $job->location ?? 'Toshkent sh.' }}</span>
                            </div>
                        </div>
                        <button @click="showModal = true; selectedJob = '{{ e($job->title) }}'" class="w-full apply-btn text-white py-4 rounded-2xl font-bold transition-all shadow-lg shadow-blue-200 hover:shadow-blue-300">
                            Topshirish
                        </button>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-2xl text-slate-300"></i>
                        </div>
                        <h4 class="text-xl font-bold text-blue-900 mb-2">Hozircha bo'sh ish o'rinlari yo'q</h4>
                        <p class="text-gray-500">Iltimos, keyinroq qayta tekshirib ko'ring.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Apply Modal -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[3000] flex items-center justify-center bg-slate-900/80 backdrop-blur-sm p-4"
             @keydown.escape.window="showModal = false"
             style="display: none;">
            
            <div @click.away="showModal = false"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 class="bg-white w-full max-w-lg rounded-[2.5rem] p-10 relative shadow-2xl">
                
                <button @click="showModal = false" class="absolute top-6 right-6 text-gray-400 hover:text-red-500 transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
                
                <div class="mb-8">
                    <h3 class="text-3xl font-bold text-blue-900 mb-2">Ariza topshirish</h3>
                    <p class="text-gray-500 text-sm">Siz <span class="text-blue-600 font-bold" x-text="selectedJob"></span> lavozimiga ariza topshirmoqdasiz.</p>
                </div>

                @if(session('success'))
                    <div class="mb-8 p-6 bg-green-50 border border-green-100 text-green-700 rounded-[2rem] flex flex-col items-center text-center animate-bounce-short">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-check text-2xl"></i>
                        </div>
                        <span class="font-bold text-lg">{{ session('success') }}</span>
                    </div>
                @endif
                
                <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-blue-900 mb-2 uppercase tracking-widest">Ism va familiya</label>
                        <input type="text" name="name" required placeholder="Ismingizni kiriting" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-blue-900 mb-2 uppercase tracking-widest">Telefon raqamingiz</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400 font-medium">+998</span>
                            <input type="tel" name="phone" required placeholder="90 123 45 67" class="w-full pl-20 pr-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all">
                        </div>
                    </div>
                    <input type="hidden" name="job_title" :value="selectedJob">
                    
                    <button type="submit" class="w-full py-5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 flex items-center justify-center group">
                        <span>Arizani yuborish</span>
                        <i class="fas fa-paper-plane ml-3 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <x-slot:extra_scripts>
        <!-- Scripts moved to Alpine.js in x-data -->
    </x-slot:extra_scripts>
</x-layout>
