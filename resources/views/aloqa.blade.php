<x-layout>
    <x-slot:title>Bog'lanish - Sevinch 475</x-slot:title>
    
    <x-slot:extra_head>
        <style>
            .contact-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
            .contact-card:hover { transform: translateY(-10px); }
            .social-btn { transition: all 0.3s; }
            .social-btn:hover { transform: scale(1.1) rotate(5deg); }
        </style>
    </x-slot:extra_head>

    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-br from-unipix-dark to-blue-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-2xl"></div>
            <div class="absolute bottom-10 right-10 w-64 h-64 bg-blue-400 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="text-5xl font-serif font-bold mb-6">Biz Bilan Bog'laning</h2>
            <div class="w-24 h-1 bg-yellow-400 mx-auto mb-8"></div>
            <p class="text-blue-100 max-w-2xl mx-auto text-lg leading-relaxed font-light">Sevinch - 475-chi sonli bolalar bog'chasi jamoasi sizning har bir savolingizga javob berishga tayyor.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-20">
        @if(isset($contact) && $contact)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Information -->
                <div class="space-y-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Address Card -->
                        <div class="contact-card bg-white rounded-[2rem] p-8 shadow-[0_10px_30px_rgba(0,0,0,0.03)] border border-slate-50">
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-map-marker-alt text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900 mb-2">Manzil</h3>
                            <p class="text-gray-500 leading-relaxed">{{ $contact->address ?? 'Ma\'lumot kiritilmagan' }}</p>
                        </div>

                        <!-- Phone Card -->
                        <div class="contact-card bg-white rounded-[2rem] p-8 shadow-[0_10px_30px_rgba(0,0,0,0.03)] border border-slate-50">
                            <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-phone-alt text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900 mb-2">Telefon</h3>
                            @if($contact->phone)
                                <a href="tel:+998{{ $contact->phone }}" class="text-gray-500 hover:text-blue-600 font-medium transition italic">
                                    +998 {{ $contact->phone }}
                                </a>
                            @else
                                <p class="text-gray-500">Ma'lumot kiritilmagan</p>
                            @endif
                        </div>

                        <!-- Email Card -->
                        <div class="contact-card bg-white rounded-[2rem] p-8 shadow-[0_10px_30px_rgba(0,0,0,0.03)] border border-slate-50">
                            <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-envelope text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900 mb-2">Email</h3>
                            @if($contact->email)
                                <a href="mailto:{{ $contact->email }}" class="text-gray-500 hover:text-blue-600 font-medium transition break-all italic">
                                    {{ $contact->email }}
                                </a>
                            @else
                                <p class="text-gray-500">Ma'lumot kiritilmagan</p>
                            @endif
                        </div>

                        <!-- Work Time Card -->
                        <div class="contact-card bg-white rounded-[2rem] p-8 shadow-[0_10px_30px_rgba(0,0,0,0.03)] border border-slate-50">
                            <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fas fa-clock text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900 mb-2">Ish vaqti</h3>
                            <p class="text-gray-500 leading-relaxed">
                                Dushanba - Shanba<br>
                                <span class="text-blue-600 font-bold italic">{{ $contact->work_time ?? '08:00 - 18:00' }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold mb-2">Ijtimoiy tarmoqlar</h3>
                            <p class="text-slate-400 mb-8 font-light italic text-sm">Bizni kuzatib boring va yangiliklardan xabardor bo'ling</p>
                            <div class="flex flex-wrap gap-4">
                                @if($contact->telegram)
                                    <a href="https://t.me/{{ ltrim($contact->telegram, '@') }}" target="_blank" class="social-btn w-14 h-14 bg-blue-500 rounded-2xl flex items-center justify-center text-white shadow-lg"><i class="fab fa-telegram-plane text-2xl"></i></a>
                                @endif
                                @if($contact->instagram)
                                    <a href="https://instagram.com/{{ ltrim($contact->instagram, '@') }}" target="_blank" class="social-btn w-14 h-14 bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg"><i class="fab fa-instagram text-2xl"></i></a>
                                @endif
                                @if($contact->facebook)
                                    <a href="https://facebook.com/{{ $contact->facebook }}" target="_blank" class="social-btn w-14 h-14 bg-blue-700 rounded-2xl flex items-center justify-center text-white shadow-lg"><i class="fab fa-facebook-f text-2xl"></i></a>
                                @endif
                                @if($contact->youtube)
                                    <a href="https://youtube.com/@{{ $contact->youtube }}" target="_blank" class="social-btn w-14 h-14 bg-red-600 rounded-2xl flex items-center justify-center text-white shadow-lg"><i class="fab fa-youtube text-2xl"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="space-y-8">
                    <div class="bg-white rounded-[3rem] p-4 shadow-2xl border border-slate-100 overflow-hidden group">
                        <div class="rounded-[2.5rem] overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3019.8547891234567!2d67.8254626!3d40.1381056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b297e3416fc6a5%3A0x876569f4c99e9a88!2sYuksalish%20Jizzax!5e0!3m2!1suz!2s!4v1699000000000!5m2!1suz!2s"
                                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    
                    @if($contact->map_link)
                        <a href="{{ $contact->map_link }}" target="_blank" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-[2rem] font-bold text-lg flex items-center justify-center transition-all shadow-xl shadow-blue-100 group">
                            <i class="fas fa-map-marked-alt mr-3 group-hover:rotate-12 transition-transform"></i> 
                            Google Maps orqali ochish
                        </a>
                    @endif
                </div>
            </div>
        @else
            <div class="bg-white rounded-[3rem] p-20 text-center shadow-xl">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-info-circle text-4xl text-gray-300"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 mb-4">Ma'lumot topilmadi</h2>
                <p class="text-slate-400 font-medium max-w-md mx-auto">Hozircha bog'lanish ma'lumotlari kiritilmagan. Iltimos, keyinroq qayta urinib ko'ring.</p>
            </div>
        @endif
    </main>
</x-layout>