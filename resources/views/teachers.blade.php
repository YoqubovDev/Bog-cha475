<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sevinch - 475-chi sonli bolalar bog`chasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .gradient-overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(22,17,121,0.7) 100%);
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px rgba(22, 17, 121, 0.6);
        }
        .nav-indicator::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: #161179;
            transition: width 0.3s ease;
        }
        .nav-indicator:hover::after {
            width: 70%;
        }
        .active-nav::after {
            width: 70%;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="font-sans bg-gray-50" x-data="{ 
    showModal: false, 
    selectedTeacher: null, 
    zoomImage: false,
    showGroup: false,
    zoomedImageSrc: ''
}">
    <x-header></x-header>

    <section class="py-16 bg-gradient-to-br from-unipix-dark via-blue-900 to-unipix-blue relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-unipix-light rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-5xl md:text-6xl font-serif font-bold text-white mb-6 uppercase tracking-widest drop-shadow-lg">Bizning Ustozlarimiz</h2>
                <div class="w-40 h-1.5 bg-yellow-400 mx-auto mb-8 rounded-full shadow-lg"></div>
                <p class="text-blue-100 max-w-2xl mx-auto text-xl leading-relaxed font-light">Sevinch 475 bolalar bog'chasining tajribali va mehribon pedagoglari bilan tanishing. Har bir ustoz bolalarning individual rivojlanishiga e'tibor beradi.</p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($teachers as $teacher)
                    <div class="bg-white border border-gray-100 shadow-xl rounded-3xl p-10 text-center transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl cursor-pointer group relative overflow-hidden"
                         @click="selectedTeacher = {{ json_encode($teacher) }}; showModal = true; showGroup = false">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-16 -mt-16 group-hover:bg-blue-100 transition-colors duration-500"></div>
                        <div class="w-48 h-48 mx-auto mb-8 relative group/img-container">
                            <div class="absolute inset-0 bg-blue-600 rounded-full scale-110 opacity-0 group-hover:opacity-20 transition-all duration-500 blur-md"></div>
                            <img src="{{ asset('storage/' . ($teacher->image ?? 'groups/default.png')) }}"
                                 class="w-full h-full object-cover rounded-full border-8 border-white shadow-2xl relative z-10 transition-transform duration-500 group-hover:scale-105"
                                 alt="{{ $teacher->name }}">
                            <div class="absolute inset-0 z-20 flex items-center justify-center opacity-0 group-hover/img-container:opacity-100 transition-all duration-300">
                                <div @click.stop="zoomedImageSrc = '{{ asset('storage/' . ($teacher->image ?? 'groups/default.png')) }}'; zoomImage = true" 
                                     class="p-4 bg-white/90 text-blue-900 rounded-full shadow-2xl hover:scale-110 transition-transform cursor-zoom-in">
                                    <i class="fas fa-search-plus text-2xl"></i>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-3xl font-bold text-blue-900 mb-3 group-hover:text-unipix-light transition-colors">{{ $teacher->name }}</h4>
                        <div class="inline-block px-6 py-1.5 bg-blue-50 text-blue-700 rounded-full text-xs font-black mb-6 uppercase tracking-widest border border-blue-100">{{ $teacher->subject }}</div>
                        <p class="text-gray-500 text-base line-clamp-2 leading-relaxed mb-8 px-4">{{ $teacher->bio }}</p>
                        <div class="pt-6 border-t border-gray-100 flex justify-center items-center">
                            <div class="inline-flex items-center px-8 py-3 bg-blue-50 text-blue-700 rounded-full text-sm font-black uppercase tracking-widest group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-lg">
                                Batafsil ma'lumot
                                <i class="fas fa-arrow-right ml-3 text-xs transition-transform duration-300 group-hover:translate-x-2"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div x-show="showModal" 
         class="fixed inset-0 z-[100] overflow-y-auto"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="flex items-center justify-center min-h-screen px-4 py-12 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-blue-900/90 backdrop-blur-md" @click="showModal = false"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-[2rem] shadow-2xl sm:my-8 sm:align-middle sm:max-w-5xl sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-8 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100">
                <div class="absolute top-6 right-6 z-30">
                    <button @click="showModal = false" class="p-3 text-gray-400 bg-white hover:text-red-500 hover:bg-red-50 rounded-2xl shadow-xl transition-all duration-300">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                <div class="bg-white min-h-[500px]">
                    <div class="md:flex h-full">
                        <div class="md:w-1/3 p-10 bg-gradient-to-b from-blue-50 to-white flex flex-col items-center">
                            <div class="relative w-full aspect-square mb-8 group overflow-hidden rounded-3xl shadow-2xl">
                                <img :src="selectedTeacher?.image ? '{{ asset('storage') }}/' + selectedTeacher.image : ''" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 cursor-zoom-in" 
                                     @click="zoomedImageSrc = selectedTeacher?.image ? '{{ asset('storage') }}/' + selectedTeacher.image : ''; zoomImage = true"
                                     alt="Profile">
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                    <i class="fas fa-search-plus text-white text-4xl"></i>
                                </div>
                            </div>
                            <h3 class="text-3xl font-bold text-blue-900 text-center leading-tight mb-2" x-text="selectedTeacher?.name"></h3>
                            <div class="px-4 py-1.5 bg-blue-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg mb-8" x-text="selectedTeacher?.subject"></div>
                            <template x-if="selectedTeacher?.group">
                                <button @click="showGroup = !showGroup" 
                                        class="flex items-center justify-center w-full px-8 py-4 bg-yellow-400 text-blue-900 rounded-2xl font-black uppercase tracking-widest shadow-xl hover:bg-yellow-500 hover:-translate-y-1 transition-all duration-300">
                                    <i class="fas fa-users mr-3 text-xl"></i>
                                    <span x-text="showGroup ? 'Guruh haqidagi ma'lumotga qaytish' : 'Guruhni ko‘rish'"></span>
                                </button>
                            </template>
                        </div>
                        <div class="md:w-2/3 p-10 md:p-14 overflow-hidden">
                            <div x-show="!showGroup" x-transition:enter="transition opacity duration-300" class="h-full flex flex-col">
                                <div class="mb-10">
                                    <div class="flex items-center mb-6">
                                        <div class="w-12 h-1.5 bg-yellow-400 rounded-full mr-4"></div>
                                        <h4 class="text-2xl font-black text-blue-900 uppercase tracking-widest">Ma'lumotlar</h4>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                                        <div class="bg-blue-50/50 p-6 rounded-3xl border border-blue-100 flex items-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm mr-4 group-hover:scale-110 transition-transform">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                            <div>
                                                <p class="text-[10px] font-black uppercase text-blue-400 tracking-widest">Tajriba</p>
                                                <p class="text-lg font-bold text-blue-900" x-text="selectedTeacher?.experience || '10+ yillik malaka'"></p>
                                            </div>
                                        </div>
                                        <div class="bg-yellow-50/50 p-6 rounded-3xl border border-yellow-100 flex items-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-yellow-600 shadow-sm mr-4 group-hover:scale-110 transition-transform">
                                                <i class="fas fa-language"></i>
                                            </div>
                                            <div>
                                                <p class="text-[10px] font-black uppercase text-yellow-600 tracking-widest">Tillar</p>
                                                <p class="text-lg font-bold text-blue-900" x-text="selectedTeacher?.languages || 'O\'zbek, Rus'"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center mb-6">
                                        <div class="w-12 h-1.5 bg-blue-600 rounded-full mr-4"></div>
                                        <h4 class="text-2xl font-black text-blue-900 uppercase tracking-widest">Biografiya</h4>
                                    </div>
                                    <div class="relative">
                                        <i class="fas fa-quote-left absolute -top-4 -left-4 text-4xl text-blue-100 -z-10"></i>
                                        <p class="text-gray-600 text-xl leading-relaxed italic font-serif relative z-10" x-text="selectedTeacher?.bio || 'Ko‘p yillik tajribaga ega pedagog, kichik yoshdagi bolalar bilan ishlash bo‘yicha mutaxassis.'"></p>
                                    </div>
                                </div>
                                <div class="mt-auto pt-8 border-t border-gray-100">
                                    <div class="flex flex-wrap gap-4">
                                        <div class="flex items-center bg-white px-6 py-3 rounded-2xl border border-gray-100 shadow-sm text-gray-700 font-bold text-sm">
                                            <i class="fas fa-graduation-cap mr-3 text-blue-600 text-lg"></i> <span x-text="selectedTeacher?.education || 'Oliy ma\'lumotli'"></span>
                                        </div>
                                        <div class="flex items-center bg-white px-6 py-3 rounded-2xl border border-gray-100 shadow-sm text-gray-700 font-bold text-sm">
                                            <i class="fas fa-award mr-3 text-yellow-500 text-lg"></i> <span x-text="selectedTeacher?.award || 'Toifali mutaxassis'"></span>
                                        </div>
                                        <template x-if="selectedTeacher?.phone">
                                            <a :href="'tel:' + selectedTeacher.phone" class="flex items-center bg-blue-600 text-white px-6 py-3 rounded-2xl shadow-lg shadow-blue-200 hover:-translate-y-1 transition-all duration-300 font-bold text-sm">
                                                <i class="fas fa-phone-alt mr-3"></i> Bog‘lanish
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div x-show="showGroup" x-transition:enter="transition opacity duration-300" class="h-full">
                                <template x-if="selectedTeacher?.group">
                                    <div class="space-y-10">
                                        <div class="flex items-center justify-between">
                                            <h4 class="text-2xl font-black text-blue-900 uppercase tracking-widest">
                                                <i class="fas fa-shapes text-yellow-400 mr-3"></i>
                                                <span x-text="selectedTeacher.group.name"></span>
                                            </h4>
                                        </div>
                                        <div class="bg-blue-50 p-6 rounded-3xl border border-blue-100 flex items-center">
                                            <div class="w-20 h-20 rounded-2xl overflow-hidden shadow-xl mr-6 border-2 border-white">
                                                <img :src="selectedTeacher.group.assistant?.image ? '{{ asset('storage') }}/' + selectedTeacher.group.assistant.image : 'https://ui-avatars.com/api/?name=Assistant'" 
                                                     class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="text-[10px] font-black uppercase text-blue-400 tracking-widest mb-1">Yordamchi</p>
                                                <p class="text-xl font-bold text-blue-900" x-text="selectedTeacher.group.assistant?.name || 'Mavjud emas'"></p>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-black text-gray-400 uppercase tracking-widest mb-6 flex items-center">
                                                <span class="w-8 h-[2px] bg-gray-200 mr-3"></span>
                                                Tarbiyalanuvchilar (Bolalar)
                                            </h5>
                                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 max-h-[300px] overflow-y-auto pr-4 custom-scrollbar">
                                                <template x-for="student in selectedTeacher.group.students" :key="student.id">
                                                    <div class="group/child cursor-pointer" @click="zoomedImageSrc = student.image ? '{{ asset('storage') }}/' + student.image : 'https://ui-avatars.com/api/?name=' + student.name; zoomImage = true">
                                                        <div class="relative aspect-square rounded-2xl overflow-hidden shadow-lg border-4 border-white transition-all group-hover/child:-translate-y-1">
                                                            <img :src="student.image ? '{{ asset('storage') }}/' + student.image : 'https://ui-avatars.com/api/?name=' + student.name" 
                                                                 class="w-full h-full object-cover">
                                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/child:opacity-100 transition-opacity flex items-center justify-center">
                                                                <i class="fas fa-search-plus text-white"></i>
                                                            </div>
                                                        </div>
                                                        <p class="text-[10px] font-bold text-center mt-3 text-gray-600 truncate" x-text="student.name"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div x-show="zoomImage" 
         class="fixed inset-0 z-[120] bg-black/95 flex items-center justify-center p-6"
         x-transition:enter="transition opacity duration-300"
         @click="zoomImage = false"
         x-cloak>
        <div class="absolute top-8 right-8 text-white text-4xl cursor-pointer hover:text-red-500 transition-colors">
            <i class="fas fa-times"></i>
        </div>
        <img :src="zoomedImageSrc" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl">
    </div>

    <section class="py-24 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
                <div class="bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all border border-gray-100 text-center">
                    <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-user-tie text-3xl"></i>
                    </div>
                    <div class="text-5xl font-black text-blue-900 mb-2">{{ $stats->asosiy ?? 0 }}+</div>
                    <div class="text-gray-400 font-black uppercase tracking-widest text-[10px]">Asosiy O‘qituvchi</div>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all border border-gray-100 text-center">
                    <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <div class="text-5xl font-black text-blue-900 mb-2">{{ $stats->ilmiy ?? 0 }}+</div>
                    <div class="text-gray-400 font-black uppercase tracking-widest text-[10px]">Ilmiy darajasi bor o‘qituvchilar</div>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all border border-gray-100 text-center">
                    <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-chalkboard-teacher text-3xl"></i>
                    </div>
                    <div class="text-5xl font-black text-blue-900 mb-2">{{ $stats->kutator ?? 0 }}+</div>
                    <div class="text-gray-400 font-black uppercase tracking-widest text-[10px]">Kurator o‘qituvchi</div>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all border border-gray-100 text-center">
                    <div class="w-20 h-20 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-globe text-3xl"></i>
                    </div>
                    <div class="text-5xl font-black text-blue-900 mb-2">{{ $stats->tashqi ?? 0 }}</div>
                    <div class="text-gray-400 font-black uppercase tracking-widest text-[10px]">Tashqi o‘rindosh o‘qituvchilar</div>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</body>
</html>
