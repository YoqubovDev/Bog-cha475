<footer class="bg-[#0b2b4e] text-white pt-20 pb-10 mt-auto border-t border-white/5">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center p-2 shadow-xl">
                        <img src="/image/sevinch-logo.png" alt="Sevinch Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Sevinch</h3>
                        <p class="text-blue-200 text-xs uppercase tracking-widest font-semibold">475-chi bolalar bog'chasi</p>
                    </div>
                </div>
                <p class="text-blue-100/70 leading-relaxed font-light italic">
                    Kelajak avlodni tarbiyalashda innovatsion yondashuv va mehribon ustozlar bilan birgamiz.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-blue-900 transition-all duration-300"><i class="fab fa-telegram-plane"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-blue-900 transition-all duration-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-blue-900 transition-all duration-300"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <span class="w-2 h-6 bg-yellow-400 rounded-full"></span>
                    Tezkor havolalar
                </h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-blue-100/70 hover:text-yellow-400 transition-colors flex items-center gap-2 group"><i class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> Bosh sahifa</a></li>
                    <li><a href="{{ route('news') }}" class="text-blue-100/70 hover:text-yellow-400 transition-colors flex items-center gap-2 group"><i class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> Yangiliklar</a></li>
                    <li><a href="{{ route('teachers') }}" class="text-blue-100/70 hover:text-yellow-400 transition-colors flex items-center gap-2 group"><i class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> Tarbiyachilar</a></li>
                    <li><a href="{{ route('contact') }}" class="text-blue-100/70 hover:text-yellow-400 transition-colors flex items-center gap-2 group"><i class="fas fa-chevron-right text-[10px] opacity-0 group-hover:opacity-100 transition-all"></i> Bog'lanish</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-2">
                <h4 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <span class="w-2 h-6 bg-yellow-400 rounded-full"></span>
                    Biz bilan bog'lanish
                </h4>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:border-yellow-400/30 transition-colors">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-10 h-10 bg-yellow-400 text-blue-900 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-400/20">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <span class="text-sm font-bold uppercase tracking-widest text-blue-200">Telefon</span>
                        </div>
                        <a href="tel:+998910040785" class="text-xl font-bold hover:text-yellow-400 transition-colors">+998 91 004 07 85</a>
                    </div>
                    <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:border-yellow-400/30 transition-colors">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-10 h-10 bg-white text-blue-900 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="text-sm font-bold uppercase tracking-widest text-blue-200">Email Manzil</span>
                        </div>
                        <a href="mailto:info@sevinch475.uz" class="text-lg font-bold hover:text-yellow-400 transition-colors break-all">info@sevinch475.uz</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-blue-100/40 text-sm font-medium">
                © {{ date('Y') }} Sevinch 475. Barcha huquqlar himoyalangan.
            </p>
            <div class="flex gap-8 text-blue-100/40 text-xs font-bold uppercase tracking-[0.2em]">
                <a href="#" class="hover:text-yellow-400 transition-colors">Siyosat</a>
                <a href="#" class="hover:text-yellow-400 transition-colors">Foydalanish</a>
                <a href="#" class="hover:text-yellow-400 transition-colors">Xarita</a>
            </div>
        </div>
    </div>
</footer>
